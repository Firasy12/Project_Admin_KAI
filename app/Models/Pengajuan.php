<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
protected $fillable = [

'nama',

'nim',

'email',

'no_hp',

'universitas',

'fakultas',

'jurusan',

'jenjang',

'semester',

'ipk',

'dosen_pembimbing',

'unit_tujuan',

'mulai_magang',

'selesai_magang',

'alamat',

'proposal',

'cv',

'transkrip',

'surat_pengantar',

'catatan',

'tanggal_pengajuan',

'status'

];
}