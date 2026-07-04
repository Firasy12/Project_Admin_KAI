<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

/**
 * Wrapper tunggal untuk semua komunikasi ke Backend FastAPI
 * (KAI Internship Management System).
 *
 * Semua controller HARUS lewat service ini, jangan panggil Http:: langsung
 * di controller supaya penanganan token (login/refresh) konsisten di satu tempat.
 */
class BackendApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.kai_backend.base_url'), '/');
    }

    /* =========================================================
     |  LOW LEVEL HTTP HELPERS
     |========================================================= */

    protected function client(bool $withAuth = true): PendingRequest
    {
        $request = Http::baseUrl($this->baseUrl)
            ->acceptJson()
            ->timeout(30)
            // Header ini wajib kalau base URL kamu masih pakai domain ngrok-free,
            // supaya ngrok tidak mengembalikan halaman interstitial HTML.
            ->withHeaders(['ngrok-skip-browser-warning' => 'true']);

        if ($withAuth && Session::has('access_token')) {
            $request = $request->withToken(Session::get('access_token'));
        }

        return $request;
    }

    /**
     * Kirim request ke backend. Otomatis coba refresh token sekali
     * kalau dapat 401 dan ada refresh_token di session.
     */
    protected function send(string $method, string $path, array $payload = [], bool $withAuth = true, bool $allowRetry = true): Response
    {
        $request = $this->client($withAuth);

        $response = match ($method) {
            'get'    => $request->get($path, $payload),
            'post'   => $request->post($path, $payload),
            'patch'  => $request->patch($path, $payload),
            'put'    => $request->put($path, $payload),
            'delete' => $request->delete($path, $payload),
            default  => throw new \InvalidArgumentException("HTTP method $method tidak didukung"),
        };

        if ($response->status() === 401 && $withAuth && $allowRetry && Session::has('refresh_token')) {
            if ($this->refreshToken()) {
                return $this->send($method, $path, $payload, $withAuth, false);
            }
        }

        return $response;
    }

    protected function get(string $path, array $query = [], bool $withAuth = true): Response
    {
        return $this->send('get', $path, array_filter($query, fn ($v) => $v !== null && $v !== ''), $withAuth);
    }

    protected function post(string $path, array $data = [], bool $withAuth = true): Response
    {
        return $this->send('post', $path, $data, $withAuth);
    }

    protected function patch(string $path, array $data = [], bool $withAuth = true): Response
    {
        return $this->send('patch', $path, $data, $withAuth);
    }

    protected function delete(string $path, bool $withAuth = true): Response
    {
        return $this->send('delete', $path, [], $withAuth);
    }

    /* =========================================================
     |  AUTH
     |========================================================= */

    public function login(string $email, string $password): Response
    {
        return $this->client(false)->post('/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function refreshToken(): bool
    {
        if (! Session::has('refresh_token')) {
            return false;
        }

        $response = $this->client(false)->post('/auth/refresh', [
            'refresh_token' => Session::get('refresh_token'),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            Session::put('access_token', $data['access_token']);
            Session::put('refresh_token', $data['refresh_token']);

            return true;
        }

        Session::forget(['access_token', 'refresh_token']);

        return false;
    }

    /* =========================================================
     |  USERS  (dipakai buat mencocokkan role setelah login,
     |  karena backend belum punya endpoint /auth/me)
     |========================================================= */

    public function getUsers(): Response
    {
        return $this->get('/users/');
    }

    /**
     * Decode payload JWT access_token di session tanpa verifikasi signature
     * (cuma buat baca claim seperti role/user_id/unit_id di sisi client).
     * Verifikasi signature tetap tanggung jawab backend di setiap request.
     */
    public function decodeAccessTokenPayload(): ?array
    {
        $token = Session::get('access_token');

        if (! $token || substr_count($token, '.') !== 2) {
            return null;
        }

        [, $payload] = explode('.', $token);
        $payload .= str_repeat('=', (4 - strlen($payload) % 4) % 4);
        $decoded = base64_decode(strtr($payload, '-_', '+/'), true);

        if ($decoded === false) {
            return null;
        }

        $data = json_decode($decoded, true);

        return is_array($data) ? $data : null;
    }

    /* =========================================================
     |  UNITS
     |========================================================= */

    public function getUnits(): Response
    {
        return $this->get('/units/', [], withAuth: false);
    }

    /* =========================================================
     |  PENGAJUAN
     |========================================================= */

    public function getPengajuan(?string $status = null, int $skip = 0, int $limit = 100): Response
    {
        return $this->get('/pengajuan/', ['status' => $status, 'skip' => $skip, 'limit' => $limit]);
    }

    public function getPengajuanDetail(int $id): Response
    {
        return $this->get("/pengajuan/{$id}");
    }

    public function updateStatusPengajuan(int $id, string $status, ?string $catatan = null): Response
    {
        return $this->patch("/pengajuan/{$id}/status", array_filter([
            'status' => $status,
            'catatan' => $catatan,
        ], fn ($v) => $v !== null));
    }

    public function getBerkasPengajuan(int $pengajuanId): Response
    {
        return $this->get("/pengajuan/{$pengajuanId}/berkas", [], withAuth: false);
    }

    public function getJenisBerkas(): Response
    {
        return $this->get('/jenis-berkas', [], withAuth: false);
    }

    /**
     * Gabungkan daftar jenis berkas (mis. 6 jenis: proposal, KTP, KTM, dst)
     * dengan berkas yang sudah diupload untuk satu pengajuan tertentu.
     * Hasilnya selalu berisi SEMUA jenis berkas, walau belum diupload
     * (status 'belum_upload', download_url null).
     */
    public function getBerkasDetail(int $pengajuanId): Collection
    {
        $jenisResp = $this->getJenisBerkas();
        $jenisList = $jenisResp->successful() ? $jenisResp->json() : [];

        $berkasResp = $this->getBerkasPengajuan($pengajuanId);
        $berkasByJenisId = collect($berkasResp->successful() ? $berkasResp->json() : [])->keyBy('jenis_berkas_id');

        return collect($jenisList)->map(function (array $jenis) use ($berkasByJenisId) {
            $berkas = $berkasByJenisId->get($jenis['id']);

            return (object) [
                'jenis_berkas_id' => $jenis['id'],
                'nama_berkas' => $jenis['nama_berkas'],
                'keterangan' => $jenis['keterangan'] ?? null,
                'is_required' => $jenis['is_required'] ?? true,
                'status' => $berkas['status'] ?? 'belum_upload',
                'file_path' => $berkas['file_path'] ?? null,
                'uploaded_at' => isset($berkas['uploaded_at']) && $berkas['uploaded_at'] ? Carbon::parse($berkas['uploaded_at']) : null,
                'download_url' => (! empty($berkas['file_path'])) ? $this->fileUrl($berkas['file_path']) : null,
            ];
        });
    }

    /**
     * Backend belum punya endpoint download file khusus (yang ada cuma
     * POST upload), jadi URL file kita susun dari file_path yang
     * dikembalikan /pengajuan/{id}/berkas.
     *
     * ASUMSI: file di-serve statis dari root domain backend (di luar
     * /api/v1), contoh: https://xxx.ngrok-free.dev/uploads/nama_file.pdf
     * Kalau ternyata backend serve file dari path lain (atau butuh
     * token khusus), cukup sesuaikan fungsi ini saja -- semua tempat
     * yang butuh link download lewat sini semua.
     */
    public function fileUrl(string $filePath): string
    {
        if (preg_match('#^https?://#', $filePath)) {
            return $filePath;
        }

        $root = preg_replace('#/api/v1/?$#', '', $this->baseUrl);

        return rtrim($root, '/').'/'.ltrim($filePath, '/');
    }

    /* =========================================================
     |  MAHASISWA / PENDAFTARAN
     |========================================================= */

    public function getAllMahasiswa(int $skip = 0, int $limit = 500): Response
    {
        return $this->get('/pendaftaran/', ['skip' => $skip, 'limit' => $limit]);
    }

    public function getMahasiswa(int $id): Response
    {
        return $this->get("/pendaftaran/{$id}");
    }

    /* =========================================================
     |  ENRICHMENT
     |  Blade view yang sudah ada mengharapkan objek gabungan
     |  (nama, jurusan, universitas, unit_tujuan) padahal di API
     |  itu tersebar di PengajuanResponse + MahasiswaResponse + UnitResponse.
     |  Fungsi ini menggabungkan ketiganya jadi satu stdClass per baris.
     |========================================================= */

    /**
     * View lama masih membandingkan status dengan string
     * 'Menunggu' / 'Review' / 'Diterima' / 'Ditolak'. Backend pakai enum
     * lowercase sendiri. Fungsi ini jadi satu-satunya sumber mapping-nya.
     */
    public function toLegacyStatus(string $backendStatus): string
    {
        return match ($backendStatus) {
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak',
            'disposisi', 'perlu_perbaikan' => 'Review',
            default => 'Menunggu', // draft, menunggu_verifikasi
        };
    }

    public function toBackendStatus(?string $legacyStatus): string
    {
        return match ($legacyStatus) {
            'Diterima' => 'diterima',
            'Ditolak' => 'ditolak',
            'Review' => 'disposisi',
            default => 'menunggu_verifikasi',
        };
    }

    public function getEnrichedPengajuan(?string $status = null, int $skip = 0, int $limit = 500): Collection
    {
        $pengajuanResp = $this->getPengajuan($status, $skip, $limit);

        if (! $pengajuanResp->successful()) {
            return collect();
        }

        $mahasiswaResp = $this->getAllMahasiswa(0, 500);

        if (! $mahasiswaResp->successful()) {
            // Kalau ini gagal, semua kolom nama/nim/universitas/jurusan di tabel
            // bakal tampil '-' walau data pengajuan & status tetap muncul normal
            // (karena keduanya sumbernya beda endpoint). Penyebab paling umum:
            // role yang login (mis. 'unit') tidak diizinkan backend mengakses
            // /pendaftaran/. Cek log ini dulu sebelum curiga ke Blade/Controller.
            \Illuminate\Support\Facades\Log::warning('Gagal ambil /pendaftaran/ buat enrich data pengajuan', [
                'status' => $mahasiswaResp->status(),
                'body' => $mahasiswaResp->body(),
                'role' => Session::get('role'),
            ]);
        }

        $mahasiswaById = collect($mahasiswaResp->successful() ? $mahasiswaResp->json() : [])->keyBy('id');

        $unitResp = $this->getUnits();

        if (! $unitResp->successful()) {
            \Illuminate\Support\Facades\Log::warning('Gagal ambil /units/ buat enrich data pengajuan', [
                'status' => $unitResp->status(),
                'body' => $unitResp->body(),
                'role' => Session::get('role'),
            ]);
        }

        $unitById = collect($unitResp->successful() ? $unitResp->json() : [])->keyBy('id');

        return collect($pengajuanResp->json())->map(function (array $p) use ($mahasiswaById, $unitById) {
            $mhs = $mahasiswaById->get($p['mahasiswa_id']);
            $unit = $p['unit_id'] ? $unitById->get($p['unit_id']) : null;

            return (object) [
                'id' => $p['id'],
                'mahasiswa_id' => $p['mahasiswa_id'],
                'unit_id' => $p['unit_id'],
                'nama' => $mhs['nama'] ?? '-',
                'email' => $mhs['email'] ?? '-',
                'nim' => $mhs['nim'] ?? '-',
                'universitas' => $mhs['universitas'] ?? '-',
                'jurusan' => $mhs['prodi'] ?? '-',
                'unit_tujuan' => $unit['nama_unit'] ?? 'Belum Ditentukan',
                // 'status' = label lama (buat kompatibilitas view lama),
                // 'status_raw' = enum asli dari backend (buat logic baru).
                'status' => $this->toLegacyStatus($p['status']),
                'status_raw' => $p['status'],
                'proposal' => null, // backend simpan berkas terpisah per jenis_berkas, lihat getBerkasPengajuan()
                'catatan_sdm' => $p['catatan_sdm'] ?? null,
                'catatan_unit' => $p['catatan_unit'] ?? null,
                'motivasi' => $p['motivasi'] ?? null,
                'harapan' => $p['harapan'] ?? null,
                'tanggal_mulai' => $p['tanggal_mulai'] ?? null,
                'tanggal_selesai' => $p['tanggal_selesai'] ?? null,
                'created_at' => Carbon::parse($p['created_at']),
                'updated_at' => Carbon::parse($p['updated_at']),
            ];
        });
    }

    /**
     * Helper untuk bikin LengthAwarePaginator dari Collection biasa,
     * karena backend belum mengembalikan total count / meta pagination.
     */
    /**
     * Filter koleksi hasil getEnrichedPengajuan() berdasarkan kata kunci
     * pencarian (nama, NIM, universitas, jurusan). Dipakai bareng-bareng
     * di semua halaman tabel yang punya kotak "Cari...".
     */
    public function filterBySearch(Collection $items, ?string $search): Collection
    {
        $search = trim((string) $search);

        if ($search === '') {
            return $items;
        }

        $needle = strtolower($search);

        return $items->filter(function ($item) use ($needle) {
            foreach (['nama', 'nim', 'universitas', 'jurusan'] as $field) {
                if (str_contains(strtolower((string) ($item->{$field} ?? '')), $needle)) {
                    return true;
                }
            }

            return false;
        })->values();
    }

    public function paginate(Collection $items, int $perPage = 10, int $page = 1): LengthAwarePaginator
    {
        $items = $items->values();

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
