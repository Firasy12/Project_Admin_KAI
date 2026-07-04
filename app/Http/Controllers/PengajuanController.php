<?php

namespace App\Http\Controllers;

use App\Services\BackendApiService;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function __construct(protected BackendApiService $backend)
    {
    }

    public function prosesSdm(Request $request, $id)
    {
        if ($request->action === 'teruskan') {
            // SDM meneruskan berkas: paling dekat dengan status 'disposisi' di backend.
            $status = 'disposisi';
            $pesan = 'Berkas berhasil diverifikasi dan diteruskan ke Unit terkait.';
        } elseif ($request->action === 'tolak') {
            $status = 'ditolak';
            $pesan = 'Pengajuan mahasiswa telah ditolak pada tahap validasi SDM.';
        } else {
            return back()->with('error', 'Aksi tidak dikenali.');
        }

        $response = $this->backend->updateStatusPengajuan((int) $id, $status, $request->catatan);

        if (! $response->successful()) {
            return back()->with('error', 'Gagal memperbarui status di server: '.$response->status());
        }

        return redirect()->back()->with('success', $pesan);
    }
}
