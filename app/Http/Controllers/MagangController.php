<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Pengajuan;

class MagangController extends Controller
{
    // ==========================================
    // 1. ALUR AKTOR: MAHASISWA
    // ==========================================
    
    // Halaman Dashboard Utama Mahasiswa (Melihat Status & Timeline Berkas)
    public function dashboardMahasiswa()
    {
        // Mengambil data pendaftar terakhir untuk kebutuhan simulasi pendaftaran
        $data_kamu = Pendaftaran::latest()->first(); 
        return view('magang.mahasiswa-dashboard', compact('data_kamu'));
    }

    // Halaman Form Mengisi Pendaftaran & Upload Proposal
    public function create()
    {
        return view('magang.create');
    }

    // Fungsi saat Mahasiswa klik "Kirim Berkas ke SDM"
    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $request->validate([
            'nama_mahasiswa' => 'required',
            'nim'            => 'required',
            'universitas'    => 'required',
            'jurusan'        => 'required',
            'email'          => 'required|email',
            'no_hp'          => 'required',
            'file_proposal'  => 'required|mimes:pdf|max:2048',
        ]);

        // 2. Simpan Data ke Database menggunakan Model Pendaftaran
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama_mahasiswa = $request->nama_mahasiswa;
        $pendaftaran->nim            = $request->nim;
        $pendaftaran->universitas    = $request->universitas;
        $pendaftaran->jurusan        = $request->jurusan;
        $pendaftaran->email          = $request->email;
        $pendaftaran->no_hp          = $request->no_hp;

        // Proses Simpan File PDF ke folder public/uploads
        $fileName = time().'_'.$request->file_proposal->getClientOriginalName();
        $request->file_proposal->move(public_path('uploads'), $fileName);
        $pendaftaran->file_proposal  = $fileName;

        // SET ALUR AWAL: Berkas otomatis dikirim mendarat di meja SDM
        $pendaftaran->posisi_berkas     = 'SDM';       
        $pendaftaran->status_penerimaan = 'Pending';   
        $pendaftaran->status_magang     = 'Belum Mulai';
        $pendaftaran->save();
        Pengajuan::create([

    'nama' => $request->nama_mahasiswa,

    'nim' => $request->nim,

    'universitas' => $request->universitas,

    'jurusan' => $request->jurusan,

    'email' => $request->email,

    'no_hp' => $request->no_hp,

    'proposal' => $fileName,

    'tanggal_pengajuan' => now(),

    'unit_tujuan' => 'Belum Ditentukan',

    'status' => 'Menunggu Verifikasi SDM',

]);

        // 3. DIALIRKAN KEMBALI KE DASHBOARD MAHASISWA (Sesuai Alur yang Kamu Minta)
        return redirect()->route('mahasiswa.dashboard')->with('success', 'Proposal Berhasil Dikirim! Berkas Anda saat ini telah diterima oleh unit SDM untuk pengecekan kuota.');
    }

    // ==========================================
    // 2. ALUR AKTOR: SDM (HUMAN CAPITAL)
    // ==========================================
    
    // Halaman Dashboard SDM (Validasi Kuota)
    public function dashboardSdm()
    {
        // SDM hanya mengelola berkas yang posisi_berkas-nya bernilai 'SDM'
        $pendaftar = Pendaftaran::where('posisi_berkas', 'SDM')->get();
        
        // Simulasi batasan kuota aktif (Total kuota maksimal di-set 5)
        $totalKuota = 5;
        $totalDiterima = Pendaftaran::where('status_penerimaan', 'Diterima')->count();
        $sisaKuota = $totalKuota - $totalDiterima;

        return view('magang.sdm-dashboard', compact('pendaftar', 'sisaKuota', 'totalKuota'));
    }

    // Aksi SDM: Kuota Tersedia, Berkas diteruskan ke Unit Kerja terkait
    public function operKeUnit($id)
    {
        $p = Pendaftaran::findOrFail($id);
        $p->is_kuota_tersedia = true;
        $p->posisi_berkas     = 'UNIT'; // Status posisi berkas bergeser ke UNIT
        $p->save();

        return redirect()->route('sdm.dashboard')->with('success', 'Kuota divalidasi tersedia! Berkas sukses diteruskan ke Unit Kerja.');
    }

    // Aksi SDM: Kuota Penuh, Berkas langsung ditolak struktural
    public function tolakKuota($id)
    {
        $p = Pendaftaran::findOrFail($id);
        $p->is_kuota_tersedia   = false;
        $p->status_penerimaan   = 'Ditolak';
        $p->posisi_berkas       = 'SELESAI';
        $p->save();

        return redirect()->route('sdm.dashboard')->with('error', 'Berkas otomatis ditolak sistem karena kuota penuh.');
    }

    // ==========================================
    // 3. ALUR AKTOR: UNIT KERJA
    // ==========================================
    
    // Halaman Dashboard Unit Kerja (Seleksi Administrasi/Kualifikasi Proposal)
    public function dashboardUnit()
    {
        // Unit Kerja mengelola berkas yang sudah lolos dari SDM (posisi 'UNIT' atau sudah 'SELESAI')
        $pendaftar = Pendaftaran::whereIn('posisi_berkas', ['UNIT', 'SELESAI'])
                                ->where('is_kuota_tersedia', true)
                                ->get();
        return view('magang.unit-dashboard', compact('pendaftar'));
    }

    // Aksi Unit: Menentukan Lolos Administrasi (Diterima) atau Gugur (Ditolak)
    public function prosesSeleksi($id, $status)
    {
        $p = Pendaftaran::findOrFail($id);
        if ($status == 'lolos') {
            $p->status_penerimaan = 'Diterima';
            $p->status_magang     = 'Berjalan'; // Mahasiswa mulai magang aktif
        } else {
            $p->status_penerimaan = 'Ditolak';
        }
        $p->posisi_berkas = 'SELESAI'; // Alur berkas berakhir
        $p->save();

        return redirect()->route('unit.dashboard')->with('success', 'Keputusan seleksi administrasi unit berhasil disimpan!');
    }

    // Aksi Unit: Mengubah status magang berjalan menjadi Selesai (untuk cetak sertifikat)
    public function selesaiMagang($id)
    {
        $p = Pendaftaran::findOrFail($id);
        $p->status_magang = 'Selesai';
        $p->save();

        return redirect()->route('unit.dashboard')->with('success', 'Status mahasiswa diperbarui: Telah Selesai Magang.');
    }

    // Fungsi penunjang cetak dokumen hasil output flowchart
    public function cetakDokumen($id, $jenis)
    {
        $data = Pendaftaran::findOrFail($id);
        return view('magang.print-dokumen', compact('data', 'jenis'));
    }
}