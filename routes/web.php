<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagangController;

/*
|--------------------------------------------------------------------------
| Web Routes - E-Magang KAI (3 Aktor)
|--------------------------------------------------------------------------
*/

// Halaman Utama otomatis dialihkan ke Dashboard Mahasiswa
Route::get('/', [MagangController::class, 'dashboardMahasiswa'])->name('mahasiswa.dashboard');

// ==========================================
// 1. RUTE AKTOR: MAHASISWA
// ==========================================
Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [MagangController::class, 'dashboardMahasiswa'])->name('mahasiswa.dashboard');
    Route::get('/daftar', [MagangController::class, 'create'])->name('mahasiswa.daftar'); // <-- Ini yang membuat error jika namanya berbeda
    Route::post('/daftar/proses', [MagangController::class, 'store'])->name('mahasiswa.store');
});

// ==========================================
// 2. RUTE AKTOR: SDM (HUMAN CAPITAL)
// ==========================================
Route::prefix('sdm')->group(function () {
    Route::get('/dashboard', [MagangController::class, 'dashboardSdm'])->name('sdm.dashboard');
    Route::post('/oper/{id}', [MagangController::class, 'operKeUnit'])->name('sdm.oper');
    Route::post('/tolak/{id}', [MagangController::class, 'tolakKuota'])->name('sdm.tolak');
});

// ==========================================
// 3. RUTE AKTOR: UNIT KERJA
// ==========================================
Route::prefix('unit')->group(function () {
    Route::get('/dashboard', [MagangController::class, 'dashboardUnit'])->name('unit.dashboard');
    Route::post('/seleksi/{id}/{status}', [MagangController::class, 'prosesSeleksi'])->name('unit.seleksi');
    Route::post('/selesai/{id}', [MagangController::class, 'selesaiMagang'])->name('unit.selesai');
});

// ==========================================
// RUTE PENUNJANG: CETAK DOKUMEN OUTPUT
// ==========================================
Route::get('/cetak-dokumen/{id}/{jenis}', [MagangController::class, 'cetakDokumen'])->name('cetak.dokumen');