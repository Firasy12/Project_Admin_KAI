<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\UnitController;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/superadmin/dashboard', [AuthController::class, 'dashboardSuperAdmin'])
    ->name('superadmin.dashboard');

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::prefix('mahasiswa')->group(function () {

    Route::get('/dashboard', [MagangController::class, 'dashboardMahasiswa'])
        ->name('mahasiswa.dashboard');

    Route::get('/daftar', [MagangController::class, 'create'])
        ->name('mahasiswa.daftar');

    Route::post('/daftar/proses', [MagangController::class, 'store'])
        ->name('mahasiswa.store');

});

/*
|--------------------------------------------------------------------------
| SDM
|--------------------------------------------------------------------------
*/

Route::prefix('sdm')->group(function () {

    Route::get('/dashboard', [SDMController::class, 'dashboard'])
        ->name('sdm.dashboard');

    Route::get('/pengajuan', [SDMController::class, 'pengajuan'])
        ->name('sdm.pengajuan');

    Route::get('/pengajuan/{pengajuan}', [SDMController::class, 'show'])
        ->name('sdm.pengajuan.show');

    Route::post('/oper/{id}', [MagangController::class, 'operKeUnit'])
        ->name('sdm.oper');

    Route::post('/tolak/{id}', [MagangController::class, 'tolakKuota'])
        ->name('sdm.tolak');

});

/*
|--------------------------------------------------------------------------
| UNIT
|--------------------------------------------------------------------------
*/

Route::prefix('unit')->group(function () {

    Route::get('/dashboard', [UnitController::class, 'dashboard'])
        ->name('unit.dashboard');

    Route::post('/seleksi/{id}/{status}', [MagangController::class, 'prosesSeleksi'])
        ->name('unit.seleksi');

    Route::post('/selesai/{id}', [MagangController::class, 'selesaiMagang'])
        ->name('unit.selesai');

    Route::get('/pengajuan-masuk', [App\Http\Controllers\UnitController::class, 'pengajuanMasuk']); // Tambahkan baris ini

});

/*
|--------------------------------------------------------------------------
| CETAK DOKUMEN
|--------------------------------------------------------------------------
*/

Route::get('/cetak-dokumen/{id}/{jenis}', [MagangController::class, 'cetakDokumen'])
    ->name('cetak.dokumen');

    Route::get('/dashboard-sdm', function () {
    return view('dashboard');
});

// Rute untuk Admin SDM memproses berkas
Route::post('/sdm/pengajuan/{id}/proses', [PengajuanController::class, 'prosesSdm'])->name('sdm.pengajuan.proses');
Route::get('/sdm/pengajuan/{id}/edit', [SDMController::class, 'edit'])->name('sdm.pengajuan.edit');
Route::put('/sdm/pengajuan/{id}/update', [App\Http\Controllers\SDMController::class, 'update'])->name('magang.update');

// Rute untuk aksi Admin Unit
Route::post('/unit/pengajuan/{id}/seleksi/{keputusan}', [UnitController::class, 'seleksiUnit'])->name('unit.seleksi');
Route::post('/unit/pengajuan/{id}/selesai', [UnitController::class, 'selesaikanMagang'])->name('unit.selesai');

// Route Menu Sidebar SDM
// Contoh di web.php
Route::get('/sdm/dashboard', [App\Http\Controllers\SDMController::class, 'index'])->name('sdm.dashboard');

Route::get('/sdm/pengajuan-masuk', [App\Http\Controllers\SDMController::class, 'pengajuanMasuk'])->name('sdm.pengajuan');
// (Buat route menu lainnya mengikuti pola di atas...)

// Route Aksi Tabel (Edit & Delete)
Route::get('/sdm/pengajuan/{id}/edit', [SdmController::class, 'edit'])->name('sdm.pengajuan.edit');
Route::delete('/sdm/pengajuan/{id}', [SdmController::class, 'destroy'])->name('sdm.pengajuan.destroy');

Route::get('/sdm/pengajuan-masuk', [App\Http\Controllers\SDMController::class, 'pengajuanMasuk']);
Route::get('/sdm/review-pengajuan', [App\Http\Controllers\SDMController::class, 'reviewPengajuan']);
Route::get('/sdm/riwayat-review', [App\Http\Controllers\SDMController::class, 'riwayatReview']);
Route::get('/sdm/monitoring', [App\Http\Controllers\SDMController::class, 'monitoring']);
Route::get('/sdm/notifikasi', [App\Http\Controllers\SDMController::class, 'notifikasi']);
Route::get('/sdm/dokumen', [App\Http\Controllers\SDMController::class, 'dokumen']);
Route::get('/sdm/profil', [App\Http\Controllers\SDMController::class, 'profil']);

Route::get('/unit/pengajuan-masuk', [App\Http\Controllers\UnitController::class, 'pengajuanMasuk']);