<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class UnitController extends Controller
{
    // Halaman Dashboard Unit
    public function dashboard()
    {
        // Menampilkan pengajuan yang diteruskan SDM
        $pengajuan_baru = Pengajuan::where('status', 'Diterima')->latest()->get();
        $jumlah_masuk   = $pengajuan_baru->count();

        // Statistik
        $jumlah_diterima = Pengajuan::where('status', 'Lulus_Magang')->count();
        $jumlah_ditolak  = Pengajuan::where('status', 'Ditolak_Unit')->count();
        $jumlah_selesai  = Pengajuan::where('status', 'Selesai')->count();

        return view('unit.dashboard', compact(
            'pengajuan_baru', 'jumlah_masuk', 'jumlah_diterima', 'jumlah_ditolak', 'jumlah_selesai'
        ));
    }

    // Halaman "Pengajuan Masuk" (Daftar yang diteruskan SDM)
public function pengajuanMasuk()
{
    // SESUDAH: menggunakan paginate(10) agar fungsi hasPages() dan links() bisa berjalan
    $pengajuan = Pengajuan::where('status', 'Diterima')->latest()->paginate(10);
    return view('unit.pengajuan.index', compact('pengajuan'));
}

    // Aksi tombol Terima / Tolak di halaman "Pengajuan Masuk"
    public function updateStatus(Request $request, $id) 
    {
        $item = Pengajuan::findOrFail($id);
        
        // Menerima nilai 'Diterima_Unit' atau 'Ditolak' dari form
        $item->status = $request->status; 
        $item->save();
        
        return back()->with('success', 'Status pengajuan masuk berhasil diperbarui!');
    }

    // Halaman "Review Pengajuan"
    public function reviewPengajuan() 
    {
        // Hanya mengambil data yang sudah "Diterima" oleh Unit dari tahap sebelumnya
        $pengajuan = Pengajuan::where('status', 'Diterima_Unit')->latest()->get();
        return view('unit.review', compact('pengajuan'));
    }

    // Aksi tombol Lulus / Tolak di halaman "Review Pengajuan"
    public function seleksiUnit($id, $keputusan) 
    {
        $item = Pengajuan::findOrFail($id);
        
        if ($keputusan == 'Lulus') {
            $item->status = 'Lulus_Magang'; 
            $pesan = 'Mahasiswa berhasil lulus seleksi akhir magang.';
        } else {
            $item->status = 'Ditolak_Unit'; 
            $pesan = 'Mahasiswa tidak lulus tahap review unit.';
        }
        
        $item->save();
        
        return back()->with('success', $pesan);
    }

    // Menandai program magang yang sedang berjalan sebagai selesai
    public function selesaikanMagang($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Selesai';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Program magang mahasiswa telah diselesaikan.');
    }

    // Fungsi untuk halaman Riwayat Review
    public function riwayatReview() 
    {
        // Mengambil data yang statusnya Lulus atau Ditolak oleh Unit
        $pengajuan = \App\Models\Pengajuan::whereIn('status', ['Lulus_Magang', 'Ditolak_Unit'])
                                          ->latest()
                                          ->paginate(10);
        
        return view('unit.riwayat', compact('pengajuan'));
    }

    // Fungsi untuk halaman Monitoring Status
    public function monitoring() 
    {
        // Mengambil SEMUA data yang berkaitan dengan Unit (dari tahap Pengajuan Masuk hingga Selesai)
        $pengajuan = \App\Models\Pengajuan::whereIn('status', [
            'Diterima',         // Baru diteruskan dari SDM
            'Diterima_Unit',    // Sedang tahap Review
            'Lulus_Magang',     // Lulus dan Sedang Magang
            'Ditolak_Unit',     // Ditolak oleh Unit
            'Selesai'           // Selesai Magang
        ])->latest()->paginate(10);
        
        return view('unit.monitoring', compact('pengajuan'));
    }

    // Fungsi untuk halaman Notifikasi
    public function notifikasi() 
    {
        // Mengambil data aktivitas pengajuan terbaru
        $notifikasi = \App\Models\Pengajuan::latest('updated_at')->paginate(15);
        
        // Menghitung jumlah tugas baru yang butuh tindakan segera
        $jumlah_masuk = \App\Models\Pengajuan::where('status', 'Diterima')->count();
        
        return view('unit.notifikasi', compact('notifikasi', 'jumlah_masuk'));
    }

    // Fungsi untuk halaman Dokumen
    public function dokumen() 
    {
        return view('unit.dokumen');
    }

    // Fungsi untuk halaman Profil
    public function profil() 
    {
        return view('unit.profil');
    }
}