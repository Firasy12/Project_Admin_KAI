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
        Schema::create('pengajuans', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('universitas');

            $table->string('jurusan');

            $table->string('unit_tujuan');

            $table->date('tanggal_pengajuan');

            $table->enum('status', [
                'Menunggu',
                'Review',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};