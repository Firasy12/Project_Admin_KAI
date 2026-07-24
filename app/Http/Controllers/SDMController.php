<?php

namespace App\Http\Controllers;

use App\Services\BackendApiService;
use Illuminate\Http\Request;

class SDMController extends Controller
{
    public function __construct(protected BackendApiService $backend)
    {
    }

    public function dashboard()
    {
        $all = $this->backend->getEnrichedPengajuan();

        // CATATAN: enum status di backend cuma:
        // draft, menunggu_verifikasi, perlu_perbaikan, disposisi, diterima, ditolak
        // Mapping di bawah ini asumsi sementara, sesuaikan lagi kalau makna aslinya beda.
        $countMasuk = $all->where('status_raw', 'menunggu_verifikasi')->count();
        $countReview = $all->whereIn('status_raw', ['perlu_perbaikan', 'disposisi'])->count();
        $countDiterima = $all->where('status_raw', 'diterima')->count();
        $countDitolak = $all->where('status_raw', 'ditolak')->count();
        $countSelesai = $all->where('status_raw', 'diterima')
            ->filter(fn($p) => $p->tanggal_selesai && \Carbon\Carbon::parse($p->tanggal_selesai)->isPast())
            ->count();

        $pengajuan = $all->sortByDesc('created_at')->values();
        $aktivitasTerbaru = $pengajuan->take(5);

        // Persentase utilisasi kuota: total kuota aktif dari semua unit
        // dibandingkan jumlah mahasiswa yang sudah diterima (status diterima).
        $kuotaResp = $this->backend->getKuota();
        $kuotaList = $kuotaResp->successful() ? collect($kuotaResp->json()) : collect();
        $totalKuota = $kuotaList->where('is_active', true)->sum('jumlah_kuota');
        $kuotaTerisi = $countDiterima;
        $persentaseKuota = $totalKuota > 0 ? min(100, round(($kuotaTerisi / $totalKuota) * 100)) : 0;

        // Log histori aktivitas: turunkan dari aktivitas terbaru yang sama
        // (dibuat/diupdate paling akhir), bukan lagi teks statis.
        $logAktivitas = $all->sortByDesc('updated_at')->take(4)->values();

        return view('sdm.dashboard', compact(
            'countMasuk',
            'countReview',
            'countDiterima',
            'countDitolak',
            'countSelesai',
            'pengajuan',
            'aktivitasTerbaru',
            'persentaseKuota',
            'totalKuota',
            'kuotaTerisi',
            'logAktivitas'
        ));
    }

    public function show($id)
    {
        $response = $this->backend->getPengajuanDetail((int) $id);

        if (!$response->successful()) {
            abort(404);
        }

        $p = $response->json();

        $mhsResponse = $this->backend->getMahasiswa($p['mahasiswa_id']);
        $mhs = $mhsResponse->successful() ? $mhsResponse->json() : [];

        $unitResp = $this->backend->getUnits();
        $unitById = collect($unitResp->successful() ? $unitResp->json() : [])->keyBy('id');
        $unit = $p['unit_id'] ? $unitById->get($p['unit_id']) : null;

        $pengajuan = (object) [
            'id' => $p['id'],
            'nama' => $mhs['nama'] ?? '-',
            'nim' => $mhs['nim'] ?? '-',
            'email' => $mhs['email'] ?? '-',
            'no_hp' => $mhs['no_hp'] ?? '-',
            'universitas' => $mhs['universitas'] ?? '-',
            'jurusan' => $mhs['prodi'] ?? '-',
            'unit_tujuan' => $unit['nama_unit'] ?? 'Belum Ditentukan',
            'tanggal_pengajuan' => \Carbon\Carbon::parse($p['created_at'])->translatedFormat('d M Y'),
            'status' => $this->backend->toLegacyStatus($p['status']),
            'status_raw' => $p['status'],
            'catatan_sdm' => $p['catatan_sdm'] ?? null,
            'motivasi' => $p['motivasi'] ?? null,
            'harapan' => $p['harapan'] ?? null,
        ];

        $berkas = $this->backend->getBerkasDetail((int) $id);

        return view('sdm.pengajuan.show', compact('pengajuan', 'berkas'));
    }

    // Tombol Teruskan ke Unit / Minta Revisi / Tolak di halaman detail pengajuan.
    // CATATAN: SDM idak menentukan diterima/ditolak akhir -- itu keputusan Unit
    // (lihat UnitController::seleksiUnit). SDM cuma mengecek kelengkapan berkas.
    public function aksiCepat(Request $request, $id, $aksi)
    {
        $status = match ($aksi) {
            'terima' => 'disposisi', // berkas lengkap -> diteruskan ke Unit
            'revisi' => 'perlu_perbaikan',
            'tolak' => 'ditolak',
            default => null,
        };

        if (!$status) {
            return back()->with('error', 'Aksi tidak dikenali.');
        }

        $response = $this->backend->updateStatusPengajuan(
            (int) $id,
            $status,
            $request->catatan
        );

        if (!$response->successful()) {
            return back()->with('error', 'Gagal memperbarui status di server (' . $response->status() . '): ' . $response->body());
        }

        return redirect()->route('sdm.pengajuan.show', $id)->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    // Tombol aksi cepat di tabel Pengajuan Masuk: SDM cuma mengecek kelengkapan
    // berkas lalu meneruskan ke Unit, atau menolak. Penerimaan akhir tetap
    // keputusan Unit (lihat UnitController::seleksiUnit).

    public function aksiCepatLegacy(Request $request, $id)
    {
        // Tombol di view (show.blade.php & review.blade.php) mengirim
        // enum asli backend langsung lewat data-status ("disposisi",
        // "perlu_perbaikan", "ditolak"), BUKAN label berkapital
        // ("Teruskan"/"Revisi"/"Ditolak"). Sebelumnya match() di sini
        // mengecek label berkapital itu -- tidak pernah cocok, jadi
        // $status selalu null dan request selalu ditolak sebelum sempat
        // memanggil backend sama sekali (makanya email tidak pernah
        // terkirim, untuk SEMUA aksi, bukan cuma revisi).
        $status = match ($request->input('status')) {
            'disposisi', 'perlu_perbaikan', 'ditolak' => $request->input('status'),
            default => null,
        };

        if (!$status) {
            return back()->with('error', 'Aksi tidak dikenali: ' . $request->input('status'));
        }

        try {
            $response = $this->backend->updateStatusPengajuan(
                (int) $id,
                $status,
                $request->catatan
            );
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghubungi server backend: ' . $e->getMessage());
        }

        if (!$response->successful()) {
            return back()->with('error', 'Gagal memperbarui status di server (' . $response->status() . '): ' . $response->body());
        }

        return back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    public function edit($id)
    {
        $response = $this->backend->getPengajuanDetail((int) $id);

        if (!$response->successful()) {
            abort(404);
        }

        $p = $response->json();

        $mhsResponse = $this->backend->getMahasiswa($p['mahasiswa_id']);
        $mhs = $mhsResponse->successful() ? $mhsResponse->json() : [];

        // View lama (magang/edit.blade.php) masih pakai nama field & status
        // versi lama, jadi kita mapping di sini biar form-nya tetap kepakai.
        $pendaftar = (object) [
            'id' => $p['id'],
            'nama_mahasiswa' => $mhs['nama'] ?? '-',
            'nim' => $mhs['nim'] ?? '-',
            'email' => $mhs['email'] ?? '-',
            'no_hp' => $mhs['no_hp'] ?? '-',
            'universitas' => $mhs['universitas'] ?? '-',
            'jurusan' => $mhs['prodi'] ?? '-',
            'status' => $this->backend->toLegacyStatus($p['status']),
            'status_magang' => null, // backend belum punya field terpisah untuk ini
        ];

        return view('magang.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        // Form edit masih kirim string lama (Menunggu/Diterima/Ditolak),
        // backend butuh enum-nya sendiri (menunggu_verifikasi/diterima/ditolak).
        $status = $this->backend->toBackendStatus($request->status_penerimaan);

        $response = $this->backend->updateStatusPengajuan((int) $id, $status, $request->catatan);

        if (!$response->successful()) {
            return back()->with('error', 'Gagal memperbarui data di server (' . $response->status() . '): ' . $response->body());
        }

        // CATATAN: backend saat ini cuma punya endpoint untuk ubah status+catatan
        // pengajuan. Field biodata (nama, NIM, universitas, dst) dan upload ulang
        // proposal di form ini BELUM bisa disimpan karena belum ada endpoint
        // update-mahasiswa / ganti-berkas di backend. Perlu ditambahkan dulu
        // kalau memang mau dipakai dari sini.

        return redirect('/sdm/dashboard')->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Backend belum menyediakan endpoint DELETE untuk pengajuan.
        // Kalau perlu fitur hapus, tambahkan dulu endpoint-nya di FastAPI.
        return back()->with('error', 'Fitur hapus pengajuan belum didukung oleh backend.');
    }

    public function store(Request $request)
    {
        // Pembuatan pengajuan dilakukan lewat alur pendaftaran mahasiswa
        // (POST /api/v1/pendaftaran/step1, dst), bukan dari sisi SDM.
        return back()->with('error', 'Pengajuan dibuat lewat form pendaftaran mahasiswa, bukan dari sini.');
    }

    public function exportPdf()
    {
        $data = $this->backend->getFullPendaftarData(request('status'));
        $data = $this->backend->filterBySearch($data, request('search'));

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.pendaftar-export', [
            'data' => $data,
            'judul' => 'Data Lengkap Pendaftar Magang',
            'dicetak_oleh' => 'Admin SDM',
        ])->setPaper('a4', 'landscape');

        return $pdf->download('data-pendaftar-magang-' . now()->format('Y-m-d') . '.pdf');
    }

    public function exportExcel()
    {
        $data = $this->backend->getFullPendaftarData(request('status'));
        $data = $this->backend->filterBySearch($data, request('search'));

        return response()
            ->view('exports.pendaftar-excel', ['data' => $data])
            ->header('Content-Type', 'application/vnd.ms-excel; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="data-pendaftar-magang-' . now()->format('Y-m-d') . '.xls"');
    }

    public function pengajuanMasuk()
    {
        $all = $this->backend->getEnrichedPengajuan();

        $countMasuk = $all->where('status_raw', 'menunggu_verifikasi')->count();
        $countReview = $all->whereIn('status_raw', ['perlu_perbaikan', 'disposisi'])->count();
        $countDiterima = $all->where('status_raw', 'diterima')->count();
        $countDitolak = $all->where('status_raw', 'ditolak')->count();

        // Tabel "Pengajuan Masuk" cuma nampilin yang baru masuk & belum
        // diproses sama sekali. Yang udah diteruskan ke Unit atau ditolak
        // ada di halaman "Riwayat Review" (riwayatReview()).
        $baru = $all->where('status_raw', 'menunggu_verifikasi');
        $baru = $this->backend->filterBySearch($baru, request('search'))->sortByDesc('created_at');

        $pengajuan = $this->backend->paginate($baru, 10, (int) request('page', 1));

        return view('sdm.pengajuan.index', compact(
            'pengajuan',
            'countMasuk',
            'countReview',
            'countDiterima',
            'countDitolak'
        ));
    }

    public function riwayatReview()
    {
        $all = $this->backend->getEnrichedPengajuan()
            ->whereIn('status_raw', ['diterima', 'ditolak']);

        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('updated_at');

        $riwayat = $this->backend->paginate($all, 10, (int) request('page', 1));

        return view('sdm.riwayat', compact('riwayat'));
    }

    public function monitoring()
    {
        $all = $this->backend->getEnrichedPengajuan();
        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        // View sdm.monitoring merender berdasarkan variabel `$monitoring_data`
        // (bukan `$monitoring`), jadi disamakan di sini supaya data asli dari
        // backend benar-benar tampil, bukan selalu jatuh ke baris mockup.
        $monitoring_data = $this->backend->paginate($all, 10, (int) request('page', 1));

        foreach ($monitoring_data as $item) {
            $item->updated_diff = $item->updated_at?->diffForHumans();
        }

        return view('sdm.monitoring', compact('monitoring_data'));
    }

    public function notifikasi()
    {
        $all = $this->backend->getEnrichedPengajuan();

        // Dipakai buat titik merah di ikon lonceng: hanya nyala kalau memang
        // ada pengajuan baru yang belum diproses SDM sama sekali. Sebelumnya
        // titik merah ini di-hardcode selalu tampil di view, jadi tidak
        // sinkron dengan data (tetap merah walau semua sudah diproses).
        $jumlahBaru = $all->where('status_raw', 'menunggu_verifikasi')->count();

        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        $notifikasi = $this->backend->paginate($all, 10, (int) request('page', 1));

        return view('sdm.notifikasi', compact('notifikasi', 'jumlahBaru'));
    }

    public function dokumen()
    {
        $all = $this->backend->getEnrichedPengajuan();
        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        $dokumen = $this->backend->paginate($all, 10, (int) request('page', 1));

        // Cuma ambil detail berkas buat baris yang lagi tampil di halaman ini
        // (biar idak nge-hit backend ratusan kali buat semua data).
        foreach ($dokumen as $item) {
            $berkas = $this->backend->getBerkasDetail($item->id);
            $proposal = $berkas->first(fn($b) => str_contains(strtolower($b->nama_berkas), 'proposal'));

            $item->proposal_url = $proposal->download_url ?? null;
            $item->proposal_status = $proposal->status ?? 'belum_upload';
        }

        return view('sdm.dokumen', compact('dokumen'));
    }

    // Detail semua jenis berkas (6 jenis) untuk satu pengajuan
    public function dokumenShow($id)
    {
        $response = $this->backend->getPengajuanDetail((int) $id);

        if (!$response->successful()) {
            abort(404);
        }

        $p = $response->json();

        $mhsResponse = $this->backend->getMahasiswa($p['mahasiswa_id']);
        $mhs = $mhsResponse->successful() ? $mhsResponse->json() : [];

        $berkas = $this->backend->getBerkasDetail((int) $id);

        return view('sdm.dokumen-detail', [
            'pengajuanId' => $p['id'],
            'nama' => $mhs['nama'] ?? '-',
            'nim' => $mhs['nim'] ?? '-',
            'universitas' => $mhs['universitas'] ?? '-',
            'berkas' => $berkas,
        ]);
    }

    // Unduh semua berkas yang sudah diupload untuk satu pengajuan, digabung jadi 1 file zip
    public function dokumenUnduhSemua($id)
    {
        $berkas = $this->backend->getBerkasDetail((int) $id)->filter(fn($b) => $b->download_url);

        if ($berkas->isEmpty()) {
            return back()->with('error', 'Belum ada berkas yang diunggah untuk pengajuan ini.');
        }

        if (!class_exists(\ZipArchive::class)) {
            return back()->with('error', 'Fitur unduh semua butuh ekstensi PHP "zip" yang belum aktif di server. Aktifkan dulu ext-zip di php.ini.');
        }

        $zipPath = storage_path('app/berkas-pengajuan-' . $id . '-' . time() . '.zip');

        $zip = new \ZipArchive();
        $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $adaFileBerhasil = false;

        foreach ($berkas as $b) {
            try {
                $response = \Illuminate\Support\Facades\Http::withHeaders(['ngrok-skip-browser-warning' => 'true'])
                    ->timeout(30)
                    ->get($b->download_url);

                if ($response->successful()) {
                    $ext = pathinfo(parse_url($b->file_path, PHP_URL_PATH) ?? '', PATHINFO_EXTENSION) ?: 'pdf';
                    $filename = \Illuminate\Support\Str::slug($b->nama_berkas) . '.' . $ext;
                    $zip->addFromString($filename, $response->body());
                    $adaFileBerhasil = true;
                }
            } catch (\Throwable $e) {
                // Lewati file yang gagal diambil, lanjut ke file berikutnya.
                continue;
            }
        }

        $zip->close();

        if (!$adaFileBerhasil) {
            @unlink($zipPath);

            return back()->with('error', 'Gagal mengambil berkas dari server backend.');
        }

        return response()->download($zipPath, 'berkas-pengajuan-' . $id . '.zip')->deleteFileAfterSend(true);
    }

    public function profil()
    {
        return view('sdm.profil');
    }

    // Halaman "Review Pengajuan" SDM. Sebelumnya query ke \App\Models\Pengajuan
    // (tabel lokal Laravel, kosong/tidak sinkron) -- disamakan sekarang dengan
    // semua halaman SDM lain: ambil lewat BackendApiService ke FastAPI.
    public function reviewPengajuan()
    {
        // Yang perlu direview SDM = belum diteruskan/diputuskan sama sekali
        // (menunggu_verifikasi) atau baru direvisi mahasiswa (perlu_perbaikan).
        $all = $this->backend->getEnrichedPengajuan()
            ->whereIn('status_raw', ['menunggu_verifikasi', 'perlu_perbaikan']);

        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        $pengajuan = $this->backend->paginate($all, 10, (int) request('page', 1));

        // Cek kelengkapan berkas wajib per baris untuk badge "Lengkap/Tidak Lengkap".
        foreach ($pengajuan as $item) {
            $berkas = $this->backend->getBerkasDetail($item->id);
            $item->is_berkas_lengkap = $berkas->where('is_required', true)
                ->every(fn($b) => $b->status === 'uploaded');
        }

        return view('sdm.review', compact('pengajuan'));
    }


}