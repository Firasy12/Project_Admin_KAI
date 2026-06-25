<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            
            // Data Identitas Mahasiswa
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('universitas');
            $table->string('jurusan');
            $table->string('email');
            $table->string('no_hp');
            $table->string('file_proposal');
            
            // Kolom Validasi Alur Sistem (3 Aktor)
            // Diubah menjadi nullable() agar tidak langsung bernilai false sebelum diperiksa SDM
            $table->boolean('is_kuota_tersedia')->nullable(); 
            $table->string('status_penerimaan')->default('Pending'); // Pending, Diterima, Ditolak (Oleh Unit)
            $table->string('status_magang')->default('Belum Mulai'); // Belum Mulai, Berjalan, Selesai (Oleh Unit)
            
            // Tracking posisi berkas: 'SDM' (awal kirim), 'UNIT' (diteruskan), atau 'SELESAI'
            $table->string('posisi_berkas')->default('SDM'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};