<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    // Ini adalah "pintu gerbang" yang mengizinkan data masuk ke database
    protected $fillable = [
        'nama', 'nim', 'universitas', 'jurusan', 'status', 'email', 'no_hp', 'file_proposal'
    ];
    protected $guarded = [];
}