<?php

namespace App\Http\Controllers;

use App\Services\BackendApiService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected BackendApiService $backend)
    {
    }

    // Menampilkan halaman login
    public function index()
    {
        if (session()->has('access_token')) {
            return $this->redirectByRole(session('role'));
        }

        return view('login');
    }

    // Proses Login -> ke backend FastAPI (/api/v1/auth/login)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $response = $this->backend->login($request->email, $request->password);

        if (! $response->successful()) {
            $pesan = $response->status() === 422
                ? 'Data yang dikirim tidak valid.'
                : 'Email atau Password salah!';

            return back()->with('error', $pesan)->withInput($request->only('email'));
        }

        $token = $response->json();

        session([
            'access_token' => $token['access_token'],
            'refresh_token' => $token['refresh_token'],
        ]);

        // 1) Coba baca role langsung dari payload JWT dulu -- ini jalur paling
        //    aman karena idak bergantung ke endpoint lain yang mungkin dibatasi
        //    per-role (mis. /users/ cuma buat superuser).
        $claims = $this->backend->decodeAccessTokenPayload();

        if ($claims && isset($claims['role'])) {
            session([
                'role' => $claims['role'],
                'nama' => $claims['name'] ?? $claims['nama'] ?? $request->email,
                'user_id' => $claims['user_id'] ?? $claims['id'] ?? $claims['sub'] ?? null,
                'unit_id' => $claims['unit_id'] ?? null,
                'email' => $request->email,
            ]);

            return $this->redirectByRole($claims['role']);
        }

        // 2) Fallback: token idak nyimpen role di claim-nya, coba cocokkan lewat /users/
        $usersResponse = $this->backend->getUsers();

        if (! $usersResponse->successful()) {
            \Illuminate\Support\Facades\Log::warning('Login berhasil tapi gagal ambil /users/ untuk deteksi role', [
                'email' => $request->email,
                'status' => $usersResponse->status(),
                'body' => $usersResponse->body(),
            ]);

            session()->forget(['access_token', 'refresh_token']);

            return back()->with('error', 'Login berhasil, tapi gagal mengambil data role (HTTP '.$usersResponse->status().'). Detail respons server sudah dicatat di storage/logs/laravel.log.');
        }

        $user = collect($usersResponse->json())
            ->firstWhere('email', $request->email);

        if (! $user) {
            session()->forget(['access_token', 'refresh_token']);

            return back()->with('error', 'Akun ditemukan tapi data role tidak tersedia. Hubungi admin.');
        }

        if (! $user['is_active']) {
            session()->forget(['access_token', 'refresh_token']);

            return back()->with('error', 'Akun Anda nonaktif. Hubungi admin.');
        }

        session([
            'role' => $user['role'],       // superuser | sdm | unit
            'nama' => $user['name'],
            'user_id' => $user['id'],
            'unit_id' => $user['unit_id'],
        ]);

        return $this->redirectByRole($user['role']);
    }

    protected function redirectByRole(string $role)
    {
        return match ($role) {
            'superuser' => redirect()->route('superadmin.dashboard'),
            'sdm' => redirect()->route('sdm.dashboard'),
            'unit' => redirect()->route('unit.dashboard'),
            default => redirect()->route('login')->with('error', 'Role tidak dikenali.'),
        };
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
