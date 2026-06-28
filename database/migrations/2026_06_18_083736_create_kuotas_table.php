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
        Schema::create('kuotas', function (Blueprint $table) {
            $table->id();
            // Input Data Admin / Unit (Bagian proses awal flowchart)
            $table->string('nama_instansi')->default('PT KAI');
            $table->string('unit_kerja'); // Contoh: IT, Humas, Legal, dll.
            $table->integer('jumlah_kuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuotas');
    }
};