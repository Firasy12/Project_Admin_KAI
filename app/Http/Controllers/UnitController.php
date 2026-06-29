<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;

class UnitController extends Controller
{
    public function dashboard()
    {
        return view('unit.dashboard', [

            'masuk' => Pengajuan::count(),

            'review' => Pengajuan::where('status','Review')->count(),

            'diterima' => Pengajuan::where('status','Diterima')->count(),

            'ditolak' => Pengajuan::where('status','Ditolak')->count(),

            'selesai' => Pengajuan::where('status','Selesai')->count(),

            'pengajuan' => Pengajuan::latest()->take(5)->get(),

        ]);
    }
}