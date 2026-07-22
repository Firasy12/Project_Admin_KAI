<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PengajuanController;

/*
|--------------------------------------------------------------------------
| LOGIN  (login beneran ke backend FastAPI lewat AuthController)
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SUPER ADMIN  (role backend: superuser)
|--------------------------------------------------------------------------
*/

Route::middleware('backend.auth:superuser')->group(function () {
    Route::get('/superadmin/dashboard', [AuthController::class, 'dashboardSuperAdmin'])
        ->name('superadmin.dashboard');
});

/*
|--------------------------------------------------------------------------
| MAHASISWA
| CATATAN: backend belum punya login untuk role mahasiswa -- alur
| pendaftaran mahasiswa pakai endpoint publik /pendaftaran/step1..5
| tanpa JWT. Route di bawah ini masih pakai controller lama
| (MagangController) yang nyimpan ke DB lokal Laravel, BELUM
| disambungkan ke backend. Perlu didiskusikan dulu alurnya kalau
| mau dipindah ke API pendaftaran.
|--------------------------------------------------------------------------
*/

Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [MagangController::class, 'dashboardMahasiswa'])->name('mahasiswa.dashboard');
    Route::get('/daftar', [MagangController::class, 'create'])->name('mahasiswa.daftar');
    Route::post('/daftar/proses', [MagangController::class, 'store'])->name('mahasiswa.store');
});

/*
|--------------------------------------------------------------------------
| SDM  (role backend: sdm)
|--------------------------------------------------------------------------
*/

Route::prefix('sdm')->middleware('backend.auth:sdm')->group(function () {
    Route::get('/dashboard', [SDMController::class, 'dashboard'])->name('sdm.dashboard');

    Route::get('/pengajuan-masuk', [SDMController::class, 'pengajuanMasuk'])->name('sdm.pengajuan');
    Route::get('/riwayat-review', [SDMController::class, 'riwayatReview'])->name('sdm.riwayat');
    Route::get('/monitoring', [SDMController::class, 'monitoring'])->name('sdm.monitoring');
    Route::get('/export/pdf', [SDMController::class, 'exportPdf'])->name('sdm.export.pdf');
    Route::get('/export/excel', [SDMController::class, 'exportExcel'])->name('sdm.export.excel');
    Route::get('/notifikasi', [SDMController::class, 'notifikasi'])->name('sdm.notifikasi');
    Route::get('/dokumen', [SDMController::class, 'dokumen'])->name('sdm.dokumen');
    Route::get('/profil', [SDMController::class, 'profil'])->name('sdm.profil');

    Route::get('/pengajuan/{id}/edit', [SDMController::class, 'edit'])->name('sdm.pengajuan.edit');
    Route::put('/pengajuan/{id}/update', [SDMController::class, 'update'])->name('sdm.pengajuan.update');
    Route::put('/pengajuan/{id}/update-legacy', [SDMController::class, 'update'])->name('magang.update');
    Route::delete('/pengajuan/{id}', [SDMController::class, 'destroy'])->name('sdm.pengajuan.destroy');
    Route::post('/pengajuan/{id}/proses', [PengajuanController::class, 'prosesSdm'])->name('sdm.pengajuan.proses');
    Route::post('/pengajuan/{id}/aksi/{aksi}', [SDMController::class, 'aksiCepat'])->name('sdm.pengajuan.aksi');
    // Tombol quick-status di tabel "Pengajuan Masuk"
    Route::post('/pengajuan/{id}/update-status', [SDMController::class, 'aksiCepatLegacy'])->name('sdm.pengajuan.update-status');
    // Tombol Disposisi/Revisi/Tolak di halaman "Review Pengajuan" (sdm/review.blade.php).
    // Route ini sebelumnya tidak ada sama sekali padahal form-nya sudah post ke sini.
    Route::post('/pengajuan/{id}/review', [SDMController::class, 'aksiCepatLegacy'])->name('sdm.pengajuan.review');
    Route::get('/dokumen/{id}/unduh-semua', [SDMController::class, 'dokumenUnduhSemua'])->name('sdm.dokumen.unduh-semua');
    Route::get('/dokumen/{id}', [SDMController::class, 'dokumenShow'])->name('sdm.dokumen.show');
    Route::get('/pengajuan/{id}', [SDMController::class, 'show'])->name('sdm.pengajuan.show');
});

/*
|--------------------------------------------------------------------------
| UNIT  (role backend: unit)
|--------------------------------------------------------------------------
*/

Route::prefix('unit')->middleware('backend.auth:unit')->group(function () {
    Route::get('/dashboard', [UnitController::class, 'dashboard'])->name('unit.dashboard');
    Route::get('/pengajuan-masuk', [UnitController::class, 'pengajuanMasuk'])->name('unit.pengajuan');
    Route::get('/review-pengajuan', [UnitController::class, 'reviewPengajuan'])->name('unit.review');
    Route::get('/riwayat-review', [UnitController::class, 'riwayatReview'])->name('unit.riwayat');
    Route::get('/monitoring', [UnitController::class, 'monitoring'])->name('unit.monitoring');
    Route::get('/export/pdf', [UnitController::class, 'exportPdf'])->name('unit.export.pdf');
    Route::get('/export/excel', [UnitController::class, 'exportExcel'])->name('unit.export.excel');
    Route::get('/notifikasi', [UnitController::class, 'notifikasi'])->name('unit.notifikasi');
    Route::get('/dokumen', [UnitController::class, 'dokumen'])->name('unit.dokumen');
    Route::get('/dokumen/{id}', [UnitController::class, 'dokumenShow'])->name('unit.dokumen.show');
    Route::get('/dokumen/{id}/unduh-semua', [UnitController::class, 'dokumenUnduhSemua'])->name('unit.dokumen.unduh-semua');
    Route::get('/profil', [UnitController::class, 'profil'])->name('unit.profil');

    Route::post('/pengajuan/{id}/seleksi/{keputusan}', [UnitController::class, 'seleksiUnit'])->name('unit.seleksi');
    Route::post('/pengajuan/{id}/selesai', [UnitController::class, 'selesaikanMagang'])->name('unit.selesai');
    // Tombol quick-status di tabel "Pengajuan Masuk" & dashboard Unit
    Route::post('/pengajuan/update/{id}', [UnitController::class, 'updateStatus'])->name('unit.update.status');
});

/*
|--------------------------------------------------------------------------
| CETAK DOKUMEN
| Masih dari alur lama (MagangController + DB lokal) -- belum disentuh.
|--------------------------------------------------------------------------
*/

Route::get('/cetak-dokumen/{id}/{jenis}', [MagangController::class, 'cetakDokumen'])
    ->name('cetak.dokumen');

    // Jalur routing untuk melihat detail dokumen mahasiswa
Route::get('/sdm/dokumen/detail', function () {
    return view('pengajuan.dokumen-detail'); 
    // Catatan: sesuaikan 'pengajuan.dokumen-detail' dengan lokasi folder/nama file blade detail yang kamu buat tadi
});

// Pastikan URL-nya sama persis dengan yang dipanggil di sidebar: /sdm/review-pengajuan
// CATATAN: sebelumnya "SdmController" (huruf kecil) -- beda dengan nama class
// aslinya "SDMController". Di server Linux (case-sensitive) ini bikin fatal
// error "Class not found" begitu route ini diakses.
Route::get('/sdm/review-pengajuan', [SDMController::class, 'reviewPengajuan'])->name('sdm.review');

// Route untuk menampilkan halaman form input nilai
Route::get('/unit/monitoring/{id}/kelulusan', [App\Http\Controllers\UnitController::class, 'formKelulusan']);

Route::get('/unit/monitoring/{id}/sertifikat', [UnitController::class, 'formSertifikat']);
Route::post('/unit/monitoring/{id}/sertifikat', [UnitController::class, 'terbitkanSertifikat']);