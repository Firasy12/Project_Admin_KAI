<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MagangController;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class,'index'])->name('login');

Route::post('/login',[AuthController::class,'login'])->name('login.post');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/superadmin/dashboard',
    [AuthController::class,'dashboardSuperAdmin'])
    ->name('superadmin.dashboard');

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::prefix('mahasiswa')->group(function () {

Route::get('/dashboard',
[MagangController::class,'dashboardMahasiswa'])
->name('mahasiswa.dashboard');

Route::get('/daftar',
[MagangController::class,'create'])
->name('mahasiswa.daftar');

Route::post('/daftar/proses',
[MagangController::class,'store'])
->name('mahasiswa.store');

});

/*
|--------------------------------------------------------------------------
| SDM
|--------------------------------------------------------------------------
*/

Route::prefix('sdm')->group(function () {

Route::get('/dashboard',
[MagangController::class,'dashboardSdm'])
->name('sdm.dashboard');

Route::post('/oper/{id}',
[MagangController::class,'operKeUnit'])
->name('sdm.oper');

Route::post('/tolak/{id}',
[MagangController::class,'tolakKuota'])
->name('sdm.tolak');

});

/*
|--------------------------------------------------------------------------
| UNIT
|--------------------------------------------------------------------------
*/

Route::prefix('unit')->group(function () {

Route::get('/dashboard',
[MagangController::class,'dashboardUnit'])
->name('unit.dashboard');

Route::post('/seleksi/{id}/{status}',
[MagangController::class,'prosesSeleksi'])
->name('unit.seleksi');

Route::post('/selesai/{id}',
[MagangController::class,'selesaiMagang'])
->name('unit.selesai');

});

/*
|--------------------------------------------------------------------------
| CETAK
|--------------------------------------------------------------------------
*/

Route::get('/cetak-dokumen/{id}/{jenis}',
[MagangController::class,'cetakDokumen'])
->name('cetak.dokumen');