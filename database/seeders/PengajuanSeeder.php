<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengajuan;

class PengajuanSeeder extends Seeder
{
    public function run(): void
    {
        Pengajuan::create([
            'nama' => 'Nizam Kori',
            'universitas' => 'Universitas Sriwijaya',
            'jurusan' => 'Sistem Informasi',
            'unit_tujuan' => 'Sistem Informasi',
            'tanggal_pengajuan' => now(),
            'status' => 'Menunggu'
        ]);

        Pengajuan::create([
            'nama' => 'Putri Amelia',
            'universitas' => 'Universitas Sriwijaya',
            'jurusan' => 'Informatika',
            'unit_tujuan' => 'SDM',
            'tanggal_pengajuan' => now(),
            'status' => 'Review'
        ]);
    }
}