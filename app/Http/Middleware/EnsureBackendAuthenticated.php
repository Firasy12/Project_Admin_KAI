<?php

namespace App\Http\Middleware;

use App\Services\BackendApiService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureBackendAuthenticated
{
    /**
     * Pastikan ada access_token backend di session, kalau tidak
     * lempar balik ke halaman login. Kalau role tidak sesuai
     * dengan route yang diakses, ditolak juga.
     *
     * Pakai: ->middleware('backend.auth:sdm') / ->middleware('backend.auth:unit') / ->middleware('backend.auth:superuser')
     */
    public function handle(Request $request, Closure $next, ?string $requiredRole = null): Response
    {
        if (! session()->has('access_token')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if ($requiredRole && session('role') !== $requiredRole) {
            abort(403, 'Anda tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
