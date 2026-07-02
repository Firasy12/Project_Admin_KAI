<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan; 

class SDMController extends Controller
{
    public function index()
    {
        $countMasuk    = \App\Models\Pengajuan::where('status', 'Menunggu')->count();
        $countReview   = \App\Models\Pengajuan::where('status', 'Review')->count();
        $countDiterima = \App\Models\Pengajuan::where('status', 'Diterima')->count();
        $countDitolak  = \App\Models\Pengajuan::where('status', 'Ditolak')->count();
        
        // Sekarang sistem akan menghitung data dengan status 'Selesai'
        $countSelesai  = \App\Models\Pengajuan::where('status', 'Selesai')->count(); 
        $pengajuan = \App\Models\Pengajuan::latest()->get();
        $aktivitasTerbaru = \App\Models\Pengajuan::latest()->take(5)->get();

        return view('sdm.dashboard', compact(
            'countMasuk', 'countReview', 'countDiterima', 
            'countDitolak', 'countSelesai', 'pengajuan', 'aktivitasTerbaru'
        ));
    }
    
    public function edit($id)
    {
        $pendaftar = Pengajuan::findOrFail($id);
        return view('magang.edit', compact('pendaftar')); 
    }

    public function update(Request $request, $id)
    {
        try {
            $pendaftar = \App\Models\Pengajuan::findOrFail($id);
            $pendaftar->status = $request->status_penerimaan; 
            $pendaftar->save();
            $pendaftar->update([
            'nama'        => $request->nama_mahasiswa,
            'nim'         => $request->nim,
            'universitas' => $request->universitas,
            'jurusan'     => $request->jurusan,
            'email'       => $request->email,
            'no_hp'       => $request->no_hp,
            'status_penerimaan'  => $request->status_penerimaan, // Status Seleksi
            'status_magang'      => $request->status_magang,     // Status Operasional
        ]);

            return redirect('/sdm/dashboard')->with('success', 'Data mahasiswa berhasil diperbarui!');

        } catch (\Exception $e) {
            dd("ERROR DATABASE: " . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Pengajuan::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }

    public function store(Request $request)
    {
    $data = $request->all();
    
    // Paksa status menjadi 'Menunggu' saat data pertama kali dibuat
    $data['status'] = 'Menunggu'; 

    \App\Models\Pengajuan::create($data);

    return redirect()->route('sdm.dashboard')->with('success', 'Pengajuan berhasil dikirim!');
    }

public function pengajuanMasuk()
{
    // Gunakan 'status' BUKAN 'status_penerimaan'
    $pengajuan = \App\Models\Pengajuan::whereNotNull('status')
                                      ->latest()
                                      ->paginate(10);
    
    return view('sdm.pengajuan.index', compact('pengajuan'));
}

public function reviewPengajuan()
{
    // Mengambil data yang statusnya 'Menunggu' atau 'Review'
    $pengajuan = \App\Models\Pengajuan::whereIn('status', ['Menunggu', 'Review'])
                                      ->latest()
                                      ->paginate(10);
                                      
    return view('sdm.review', compact('pengajuan'));
}

public function riwayatReview() {
    // Mengambil data yang sudah selesai direview
    $riwayat = \App\Models\Pengajuan::whereIn('status', ['Diterima', 'Ditolak'])
                                    ->latest()
                                    ->paginate(10);
                                    
    return view('sdm.riwayat', compact('riwayat'));
}

public function monitoring() {
    // Mengambil semua data pengajuan untuk dipantau statusnya
    $monitoring = \App\Models\Pengajuan::latest()->paginate(10);
                                    
    return view('sdm.monitoring', compact('monitoring'));
}

public function notifikasi() {
    // Mengambil 20 aktivitas pengajuan terbaru dari database
    $notifikasi = \App\Models\Pengajuan::latest()->take(20)->get();
    
    return view('sdm.notifikasi', compact('notifikasi'));
}

public function dokumen() {
    // Mengambil data pengajuan untuk ditampilkan arsip dokumennya
    $dokumen = \App\Models\Pengajuan::latest()->paginate(10);
    
    return view('sdm.dokumen', compact('dokumen'));
}

public function profil() {
    return view('sdm.profil');
} 

public function prosesReview(Request $request, $id) 
{
    $pengajuan = Pengajuan::findOrFail($id);
    $keputusan = $request->keputusan; // Akan berisi "Disposisi", "Revisi", atau "Ditolak"

    if ($keputusan == 'Disposisi') {
        $pengajuan->status = 'Diterima'; // Diteruskan ke Unit
    } elseif ($keputusan == 'Revisi') {
        $pengajuan->status = 'Revisi'; // Butuh perbaikan berkas
    } elseif ($keputusan == 'Ditolak') {
        $pengajuan->status = 'Ditolak_SDM'; // Gagal tahap SDM
    }

    $pengajuan->save();
    return back()->with('success', 'Keputusan review berhasil disimpan!');
}

// Fungsi untuk mengubah status pengajuan dari halaman Pengajuan Masuk SDM
    public function updateStatusSDM(Request $request, $id) 
    {
        // Cari data mahasiswa berdasarkan ID
        $pengajuan = \App\Models\Pengajuan::findOrFail($id);
        
        // Update status sesuai dengan tombol yang ditekan
        $pengajuan->status = $request->status;
        $pengajuan->save();
        
        return back()->with('success', 'Status pengajuan berhasil diubah menjadi: ' . $request->status);
    }

}
