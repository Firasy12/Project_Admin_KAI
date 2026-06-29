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
        Schema::table('pengajuans', function (Blueprint $table) {
            
            $table->string('nim')->nullable();

            $table->string('email')->nullable();
            
            $table->string('no_hp')->nullable();
            
            $table->string('fakultas')->nullable();
            
            $table->string('jenjang')->nullable();
            
            $table->integer('semester')->nullable();
            
            $table->decimal('ipk',3,2)->nullable();
            
            $table->string('dosen_pembimbing')->nullable();
            
            $table->date('mulai_magang')->nullable();
            
            $table->date('selesai_magang')->nullable();
            
            $table->text('alamat')->nullable();
            
            $table->string('cv')->nullable();
            
            $table->string('proposal')->nullable();
            
            $table->string('transkrip')->nullable();
            
            $table->string('surat_pengantar')->nullable();
            
            $table->text('catatan')->nullable();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            //
        });
    }
};
