<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagangController;

// Halaman utama dialihkan langsung ke dashboard mahasiswa sebagai simulasi awal login
Route::get('/', [MagangController::class, 'dashboardMahasiswa']);

// --- 1. RUTE AKTOR: MAHASISWA ---
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function() {
    Route::get('/dashboard', [MagangController::class, 'dashboardMahasiswa'])->name('dashboard');
    Route::get('/daftar', [MagangController::class, 'create'])->name('create');
    Route::post('/daftar/proses', [MagangController::class, 'store'])->name('store');
    Route::get('/cetak/{id}/{jenis}', [MagangController::class, 'cetakDokumen'])->name('cetak');
});

// --- 2. RUTE AKTOR: SDM (HUMAN CAPITAL) ---
Route::prefix('sdm')->name('sdm.')->group(function() {
    Route::get('/dashboard', [MagangController::class, 'dashboardSdm'])->name('dashboard');
    Route::post('/oper-ke-unit/{id}', [MagangController::class, 'operKeUnit'])->name('oper');
    Route::post('/tolak-kuota/{id}', [MagangController::class, 'tolakKuota'])->name('tolak');
});

// --- 3. RUTE AKTOR: UNIT KERJA ---
Route::prefix('unit')->name('unit.')->group(function() {
    Route::get('/dashboard', [MagangController::class, 'dashboardUnit'])->name('dashboard');
    Route::post('/seleksi/{id}/{status}', [MagangController::class, 'prosesSeleksi'])->name('seleksi');
    Route::post('/selesai/{id}', [MagangController::class, 'selesaiMagang'])->name('selesai');
});