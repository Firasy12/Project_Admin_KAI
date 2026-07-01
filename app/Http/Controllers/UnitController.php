<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan; // <-- Menggunakan model Pengajuan sama seperti SDM

class UnitController extends Controller
{
    // UBAH DI SINI: Nama fungsinya diganti dari index() menjadi dashboard()
    public function dashboard() {
    // 1. Ambil data yang SUDAH LOLOS dari SDM (Status di DB = 'Diterima')
    $pengajuan_baru = \App\Models\Pengajuan::where('status', 'Diterima')->latest()->get();
    
    // 2. Hitung jumlahnya untuk kotak statistik
    $jumlah_masuk = $pengajuan_baru->count();
    
    // Return ke view Unit
    return view('unit.dashboard', compact('pengajuan_baru', 'jumlah_masuk'));
}

    // Fungsi untuk Terima/Tolak dari Unit
    public function seleksiUnit($id, $keputusan)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($keputusan == 'lolos') {
            $pengajuan->status_penerimaan = 'Diterima';
            $pengajuan->status_magang = 'Berjalan';
            $pesan = 'Mahasiswa berhasil diterima untuk magang di Unit Anda.';
        } 
        elseif ($keputusan == 'gugur') {
            $pengajuan->status_penerimaan = 'Ditolak';
            $pesan = 'Anda telah menolak pengajuan magang mahasiswa ini.';
        }

        $pengajuan->save();
        return redirect()->back()->with('success', $pesan);
    }

    // Fungsi untuk Menyelesaikan Magang
    public function selesaikanMagang($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status_magang = 'Selesai';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Program magang mahasiswa telah diselesaikan.');
    }

public function pengajuanMasuk() {
    // Mengambil data yang statusnya 'Diterima' dari SDM
    $pengajuan = \App\Models\Pengajuan::where('status', 'Diterima')
                                      ->latest()
                                      ->paginate(10);
    
    return view('unit.pengajuan.index', compact('pengajuan'));
}

}