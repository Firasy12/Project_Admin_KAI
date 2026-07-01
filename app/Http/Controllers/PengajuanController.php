<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar; // Sesuaikan dengan nama modelmu, misal: Pendaftar atau Pengajuan

class PengajuanController extends Controller
{
    public function prosesSdm(Request $request, $id)
    {
        $pengajuan = Pendaftar::findOrFail($id);

        if ($request->action == 'teruskan') {
            // SDM meneruskan ke Unit
            $pengajuan->posisi_berkas = 'UNIT';
            $pengajuan->status_penerimaan = 'Pending'; 
            $pesan = 'Berkas berhasil diverifikasi dan diteruskan ke Unit terkait.';
        } 
        elseif ($request->action == 'tolak') {
            // SDM menolak berkas di awal
            $pengajuan->status_penerimaan = 'Ditolak';
            $pesan = 'Pengajuan mahasiswa telah ditolak pada tahap validasi SDM.';
        }

        $pengajuan->save();

        return redirect()->back()->with('success', $pesan);
    }
}