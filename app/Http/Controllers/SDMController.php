<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;

class SDMController extends Controller
{

    public function dashboard()
    {

        $pengajuan = Pengajuan::latest()->take(5)->get();

        $menunggu = Pengajuan::where('status','Menunggu')->count();

        $review = Pengajuan::where('status','Review')->count();

        $diterima = Pengajuan::where('status','Diterima')->count();

        $ditolak = Pengajuan::where('status','Ditolak')->count();

        return view('sdm.dashboard',compact(

            'pengajuan',

            'menunggu',

            'review',

            'diterima',

            'ditolak'

        ));

    }
    public function pengajuan()
{
    $pengajuan = Pengajuan::latest()->paginate(10);

    return view('sdm.pengajuan.index', compact('pengajuan'));
}

    public function show(Pengajuan $pengajuan)
{
    return view('sdm.pengajuan.show', compact('pengajuan'));
}

}