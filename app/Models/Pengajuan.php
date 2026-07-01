<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    // Ini adalah "pintu gerbang" yang mengizinkan data masuk ke database
    protected $fillable = [
        'nama', 'nim', 'universitas', 'jurusan', 'unit_tujuan',
        'status', 'status_magang', 'email', 'no_hp', 'file_proposal', 'proposal',
    ];
    protected $guarded = [];
}