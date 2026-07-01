<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE pengajuans_temp (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nama VARCHAR,
                universitas VARCHAR,
                jurusan VARCHAR,
                unit_tujuan VARCHAR,
                tanggal_pengajuan DATE,
                status VARCHAR,
                created_at DATETIME,
                updated_at DATETIME,
                nim VARCHAR,
                email VARCHAR,
                no_hp VARCHAR,
                fakultas VARCHAR,
                jenjang VARCHAR,
                semester INTEGER,
                ipk DECIMAL(3,2),
                dosen_pembimbing VARCHAR,
                mulai_magang DATE,
                selesai_magang DATE,
                alamat TEXT,
                cv VARCHAR,
                proposal VARCHAR,
                transkrip VARCHAR,
                surat_pengantar VARCHAR,
                catatan TEXT
            );
        ");

        DB::statement("
            INSERT INTO pengajuans_temp
            SELECT * FROM pengajuans;
        ");

        Schema::drop('pengajuans');

        Schema::rename('pengajuans_temp', 'pengajuans');
    }

    public function down(): void
    {
        //
    }
};