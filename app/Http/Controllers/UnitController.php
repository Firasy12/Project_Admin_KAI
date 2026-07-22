<?php

namespace App\Http\Controllers;

use App\Services\BackendApiService;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class UnitController extends Controller
{
    public function __construct(protected BackendApiService $backend)
    {
    }

    protected function scopedToUnit($collection)
    {
        return $collection->when(
            session('unit_id'),
            fn($c) => $c->where('unit_id', session('unit_id'))
        );
    }

    public function dashboard()
    {
        // Ambil semua pengajuan milik unit ini sekali saja, lalu turunkan semua
        // angka statistik dari situ -- sama seperti pola di SDMController::dashboard(),
        // supaya kartu Diterima/Ditolak/Selesai di dashboard Unit tidak lagi hardcode 0.
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());

        // "Tugas Masuk" / "Perlu Review" = pengajuan yang baru diteruskan SDM
        // (status disposisi) dan belum diputuskan Unit. Sebelumnya salah
        // filter ke status 'diterima' (yang sudah final, bukan yang baru masuk).
        $pengajuan_baru = $all->where('status_raw', 'disposisi')
            ->sortByDesc('created_at')->values();

        $jumlah_masuk = $pengajuan_baru->count();

        $countDiterima = $all->where('status_raw', 'diterima')->count();
        $countDitolak = $all->where('status_raw', 'ditolak')->count();
        $countSelesai = $all->where('status_raw', 'diterima')
            ->filter(fn($p) => $p->tanggal_selesai && \Carbon\Carbon::parse($p->tanggal_selesai)->isPast())
            ->count();

        return view('unit.dashboard', compact(
            'pengajuan_baru',
            'jumlah_masuk',
            'countDiterima',
            'countDitolak',
            'countSelesai'
        ));
    }

    public function pengajuanMasuk()
    {
        // Daftar pengajuan yang baru diteruskan SDM ke unit ini, belum
        // diproses sama sekali. Keputusan (Lulus/Tolak) diambil di halaman
        // "Review Pengajuan" (reviewPengajuan()), jadi di sini cuma list.
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan('disposisi'));
        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        $pengajuan = $this->backend->paginate($all, 10, (int) request('page', 1));

        return view('unit.pengajuan.index', compact('pengajuan'));
    }

    public function reviewPengajuan()
    {
        // "Review" di sisi Unit = pengajuan yang sudah diteruskan SDM
        // (disposisi/perlu_perbaikan) dan menunggu keputusan Unit.
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan())
            ->whereIn('status_raw', ['disposisi', 'perlu_perbaikan', 'diterima', 'ditolak']); //

        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at'); //[cite: 1]

        $pengajuan = $this->backend->paginate($all, 10, (int) request('page', 1)); //[cite: 1]

        // Kolom "Dokumen" sebelumnya selalu tampil badge statis "Lengkap"
        // walau berkas belum lengkap. Sekarang dicek beneran ke backend.
        foreach ($pengajuan as $item) {
            $berkas = $this->backend->getBerkasDetail($item->id);
            $item->is_berkas_lengkap = $berkas->where('is_required', true)
                ->every(fn($b) => $b->status === 'uploaded');
        }

        return view('unit.review', compact('pengajuan')); //[cite: 1]
    }

    public function riwayatReview()
    {
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan())
            ->whereIn('status_raw', ['diterima', 'ditolak']);

        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('updated_at');

        $pengajuan = $this->backend->paginate($all, 10, (int) request('page', 1));

        return view('unit.riwayat', compact('pengajuan'));
    }

    public function monitoring()
    {
        // Monitoring harus menampilkan seluruh alur pengajuan milik unit,
        // bukan hanya yang sudah final diterima. Ini mengikuti pola halaman
        // monitoring di SDM agar status progres tetap terlihat sinkron.
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());
        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        $pengajuan = $this->backend->paginate($all, 10, (int) request('page', 1));

        return view('unit.monitoring', compact('pengajuan'));
    }

    public function notifikasi()
    {
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());

        // Badge alert harus mengikuti pengajuan yang benar-benar menunggu
        // tindakan Unit, sama seperti angka "Tugas Masuk" di dashboard.
        $jumlah_masuk = $all->where('status_raw', 'disposisi')->count();

        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');
        $notifikasi = $this->backend->paginate($all, 10, (int) request('page', 1));

        return view('unit.notifikasi', compact('notifikasi', 'jumlah_masuk'));
    }

    public function dokumen()
    {
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());
        $all = $this->backend->filterBySearch($all, request('search'))->sortByDesc('created_at');

        $dokumen = $this->backend->paginate($all, 10, (int) request('page', 1));

        foreach ($dokumen as $item) {
            $berkas = $this->backend->getBerkasDetail($item->id);
            $proposal = $berkas->first(fn($b) => str_contains(strtolower($b->nama_berkas), 'proposal'));

            $item->proposal_url = $proposal->download_url ?? null;
            $item->proposal_status = $proposal->status ?? 'belum_upload';
        }

        return view('unit.dokumen', compact('dokumen'));
    }

    public function dokumenShow($id)
    {
        $response = $this->backend->getPengajuanDetail((int) $id);

        if (!$response->successful()) {
            abort(404);
        }

        $p = $response->json();

        // Beberapa token/unit akun tidak membawa `unit_id` di session.
        // Jangan langsung forbidden kalau session-nya kosong, hanya tolak
        // kalau unit_id memang ada dan jelas bukan milik unit ini.
        if (session()->has('unit_id') && (string) ($p['unit_id'] ?? '') !== (string) session('unit_id')) {
            abort(403);
        }

        $mhsResponse = $this->backend->getMahasiswa($p['mahasiswa_id']);
        $mhs = $mhsResponse->successful() ? $mhsResponse->json() : [];

        $berkas = $this->backend->getBerkasDetail((int) $id);

        return view('unit.dokumen-detail', [
            'pengajuanId' => $p['id'],
            'nama' => $mhs['nama'] ?? '-',
            'nim' => $mhs['nim'] ?? '-',
            'universitas' => $mhs['universitas'] ?? '-',
            'berkas' => $berkas,
        ]);
    }

    public function dokumenUnduhSemua($id)
    {
        $response = $this->backend->getPengajuanDetail((int) $id);

        if (!$response->successful()) {
            abort(404);
        }

        $p = $response->json();

        if (session()->has('unit_id') && (string) ($p['unit_id'] ?? '') !== (string) session('unit_id')) {
            abort(403);
        }

        $berkas = $this->backend->getBerkasDetail((int) $id)->filter(fn($b) => $b->download_url);

        if ($berkas->isEmpty()) {
            return back()->with('error', 'Belum ada berkas yang diunggah untuk pengajuan ini.');
        }

        if (!class_exists(\ZipArchive::class)) {
            return back()->with('error', 'Fitur unduh semua butuh ekstensi PHP "zip" yang belum aktif di server. Aktifkan dulu ext-zip di php.ini.');
        }

        $zipPath = storage_path('app/berkas-pengajuan-unit-' . $id . '-' . time() . '.zip');

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

    public function exportPdf()
    {
        $data = $this->backend->getFullPendaftarData(request('status'), session('unit_id'));
        $data = $this->backend->filterBySearch($data, request('search'));

        $pdf = Pdf::loadView('pdf.pendaftar-export', [
            'data' => $data,
            'judul' => 'Data Lengkap Pendaftar Magang - Unit',
            'dicetak_oleh' => 'Admin Unit',
        ])->setPaper('a4', 'landscape');

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="data-pendaftar-unit.pdf"');
    }

    public function exportExcel()
    {
        $data = $this->backend->getFullPendaftarData(request('status'), session('unit_id'));
        $data = $this->backend->filterBySearch($data, request('search'));

        return response()
            ->view('exports.pendaftar-excel', ['data' => $data])
            ->header('Content-Type', 'application/vnd.ms-excel; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="data-pendaftar-unit-' . now()->format('Y-m-d') . '.xls"');
    }

    public function profil()
    {
        return view('unit.profil');
    }

    // Tombol Terima/Tolak dari halaman Review (form action ke /unit/pengajuan/{id}/seleksi/{keputusan})
    public function seleksiUnit($id, $keputusan)
    {
        $status = match (strtolower($keputusan)) {
            'lolos', 'lulus', 'diterima' => 'diterima',
            'tolak', 'ditolak' => 'ditolak',
            default => null,
        };

        if (!$status) {
            return back()->with('error', 'Keputusan tidak dikenali.');
        }

        $pesan = $status === 'diterima'
            ? 'Mahasiswa berhasil diterima untuk magang di Unit Anda.'
            : 'Anda telah menolak pengajuan magang mahasiswa ini.';

        $response = $this->backend->updateStatusPengajuan((int) $id, $status);

        if (!$response->successful()) {
            return back()->with('error', 'Gagal memperbarui status di server: ' . $response->status());
        }
        $this->kirimEmailHasilSeleksi($id, $status);

        return redirect()->back()->with('success', $pesan);
    }

    // Tombol quick-status di daftar "Pengajuan Masuk" & dashboard Unit
    // (form action ke /unit/pengajuan/update/{id}, field 'status' = Diterima_Unit / Ditolak)
    public function updateStatus(Request $request, $id)
    {
        $status = match ($request->input('status')) {
            'Diterima_Unit', 'Diterima' => 'diterima',
            'Ditolak' => 'ditolak',
            default => null,
        };

        if (!$status) {
            return back()->with('error', 'Status tidak dikenali: ' . $request->input('status'));
        }

        $response = $this->backend->updateStatusPengajuan((int) $id, $status);

        if (!$response->successful()) {
            return back()->with('error', 'Gagal memperbarui status di server: ' . $response->status());
        }
        $this->kirimEmailHasilSeleksi($id, $status);

        return back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    // Fungsi untuk Menyelesaikan Magang
    public function selesaikanMagang($id)
    {
        return back()->with('error', 'Backend belum mendukung status "selesai magang". Perlu ditambahkan dulu.');
    }

    // 1. Fungsi menampilkan halaman form nilai (Diselaraskan menggunakan Jaringan API Backend)
    public function formKelulusan($id)
    {
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());
        $mahasiswa = $all->firstWhere('id', (int) $id);

        if (!$mahasiswa) {
            abort(404, 'Data mahasiswa tidak ditemukan atau berada di luar unit Anda.');
        }

        return view('unit.form-kelulusan', compact('mahasiswa'));
    }

    // 2. Fungsi Eksekusi Nilai + Auto-Send Email Sertifikat
    public function prosesSertifikat(Request $request, $id)
    {
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());
        $mahasiswa = $all->firstWhere('id', (int) $id);

        if (!$mahasiswa) {
            abort(404, 'Data mahasiswa gagal divalidasi.');
        }

        // Tanam nilai secara instan ke objek untuk kebutuhan pencetakan berkas PDF
        $mahasiswa->nilai_teknis = $request->nilai_teknis;
        $mahasiswa->nilai_sikap = $request->nilai_sikap;
        $mahasiswa->status_terkini = 'SELESAI MAGANG';

        // Hubungkan perubahan state akhir ke server API lokal agar sinkron
        $this->backend->updateStatusPengajuan((int) $id, 'diterima');

        // LOGIKA A: Generate PDF Sertifikat secara instan di memori server
        $pdf = Pdf::loadView('pdf.sertifikat', compact('mahasiswa'));

        // LOGIKA B: Tembak Email Otomatis langsung ke email pendaftar dengan lampiran PDF
        $dataEmail = [
            'nama' => $mahasiswa->nama,
            'email_tujuan' => $mahasiswa->email ?? 'mahasiswa@kai.id'
        ];

        Mail::send('emails.kelulusan_notif', $dataEmail, function ($message) use ($dataEmail, $pdf) {
            $message->to($dataEmail['email_tujuan'], $dataEmail['nama'])
                ->subject('Selamat! Sertifikat Kelulusan Magang PT KAI Anda Telah Terbit')
                ->attachData($pdf->output(), "Sertifikat_Magang_" . $dataEmail['nama'] . ".pdf");
        });

        return redirect('/unit/monitoring')->with('success', 'Nilai berhasil disimpan dan sertifikat telah dikirim ke email mahasiswa!');
    }

    // FUNGSI HELPER: Otomatisasi Kirim Email Hasil Seleksi (Terima/Tolak)
    protected function kirimEmailHasilSeleksi($id, $status)
    {
        // Ambil data mahasiswa dari API Backend agar dapet email & namanya
        $all = $this->scopedToUnit($this->backend->getEnrichedPengajuan());
        $mahasiswa = $all->firstWhere('id', (int) $id);

        if ($mahasiswa && isset($mahasiswa->email)) {
            $dataEmail = [
                'nama' => $mahasiswa->nama,
                'status' => $status, // 'diterima' atau 'ditolak'
                'unit' => 'Unit Sistem Informasi'
            ];

            // Tentukan subjek email berdasarkan status hasil seleksi
            $subject = $status === 'diterima'
                ? 'Selamat! Pengajuan Magang Anda di PT KAI Diterima'
                : 'Informasi Hasil Pengajuan Magang PT KAI';

            // Tembak email menggunakan template blade khusus 'emails.seleksi_notif'
            Mail::send('emails.seleksi_notif', $dataEmail, function ($message) use ($mahasiswa, $subject) {
                $message->to($mahasiswa->email, $mahasiswa->nama)
                    ->subject($subject);
            });
        }
    }

} // <-- KURUNG KURAWAL PENUTUP UTAMA CLASS SEKARANG SUDAH AMAN ADA DI SINI!