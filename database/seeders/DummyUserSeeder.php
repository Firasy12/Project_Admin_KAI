<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin SDM
        User::create([
            'name' => 'Admin SDM',
            'email' => 'sdm@kai.id',
            'password' => Hash::make('password'),
            'role' => 'sdm',
            'unit' => null,
        ]);

        // Admin Unit Sistem Informasi
        User::create([
            'name' => 'Admin Sistem Informasi',
            'email' => 'unit@kai.id',
            'password' => Hash::make('password'),
            'role' => 'unit',
            'unit' => 'Sistem Informasi',
        ]);

        // Mahasiswa contoh
        User::create([
            'name' => 'Mahasiswa Contoh',
            'email' => 'mahasiswa@kai.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'unit' => null,
        ]);
    }
}