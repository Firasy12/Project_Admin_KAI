<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Mengosongkan guard agar semua kolom (termasuk posisi_berkas) otomatis diizinkan masuk ke database
    protected $guarded = [];
}