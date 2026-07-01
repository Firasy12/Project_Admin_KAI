<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    // Proses Login
    public function login(Request $request)
    {

        // Kode di bawah ini tidak akan dijalankan selama dd() masih ada

        $email = $request->email;
        $password = $request->password;

        // Super Admin
        if ($email == "superadmin@kai.id" && $password == "superadmin123") {
            session([
                'role' => 'superadmin',
                'nama' => 'Super Admin'
            ]);

            return redirect()->route('superadmin.dashboard');
        }

        // SDM
        if ($email == "sdm@kai.id" && $password == "sdm12345") {
            session([
                'role' => 'sdm',
                'nama' => 'SDM'
            ]);

            return redirect()->route('sdm.dashboard');
        }

        // Unit
        if ($email == "unit.si@kai.id" && $password == "unit12345") {
            session([
                'role' => 'unit',
                'nama' => 'Unit SI'
            ]);

            return redirect()->route('unit.dashboard');
        }

        // Mahasiswa
        if ($email == "mahasiswa@kai.id" && $password == "mahasiswa123") {
            session([
                'role' => 'mahasiswa',
                'nama' => 'Mahasiswa'
            ]);

            return redirect()->route('mahasiswa.dashboard');
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }

    // Dashboard Super Admin
    public function dashboardSuperAdmin()
    {
        return view('magang.superadmin-dashboard');
    }
}