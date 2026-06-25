<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Unit Kerja - E-Magang KAI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --kai-blue: #223E92;
            --kai-orange: #ED6B23;
        }
        .bg-kai-blue { background-color: var(--kai-blue) !important; }
        .text-kai-blue { color: var(--kai-blue) !important; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-kai-blue shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" height="40" class="me-3 bg-white p-1 rounded">
                <div>
                    <span class="fw-bold tracking-wide">E-MAGANG KAI</span>
                    <small class="d-block fs-7 fw-light" style="font-size: 0.65rem;">Unit Kerja - Seleksi Administrasi & Kualifikasi Berkas</small>
                </div>
            </a>
            <span class="navbar-text text-white fw-bold">Aktor: UNIT KERJA</span>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-4">
                <i class="fa-solid fa-circle-check me-2 fs-5"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-5">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center">
                <i class="fa-solid fa-briefcase text-kai-blue me-2"></i>
                <h5 class="m-0 fw-bold text-secondary">Daftar Berkas Masuk dari SDM (Menunggu Seleksi Kualifikasi)</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="min-width: 900px;">
                        <thead class="table-light text-uppercase fs-7">
                            <tr>
                                <th class="ps-4 py-3 text-secondary">Data Mahasiswa</th>
                                <th class="py-3 text-secondary text-center">Berkas Proposal</th>
                                <th class="py-3 text-secondary text-center">Validasi SDM</th>
                                <th class="py-3 text-secondary text-center">Status Kelulusan</th>
                                <th class="py-3 text-secondary text-center">Aksi Seleksi Administrasi Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftar as $p)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-kai-blue text-white d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px;">
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold m-0 text-dark">{{ $p->nama_mahasiswa }}</h6>
                                            <small class="text-muted">{{ $p->nim }} — {{ $p->universitas }} ({{ $p->jurusan }})</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ asset('uploads/' . $p->file_proposal) }}" target="_blank" class="btn btn-sm btn-outline-danger px-3 rounded-pill">
                                        <i class="fa-solid fa-file-pdf me-1"></i> Periksa PDF
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">
                                        <i class="fa-solid fa-check-double me-1"></i> Kuota Tersedia
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill px-3 py-2 text-uppercase {{ $p->status_penerimaan == 'Diterima' ? 'bg-success text-white' : ($p->status_penerimaan == 'Ditolak' ? 'bg-danger text-white' : 'bg-warning text-dark') }}">
                                        {{ $p->status_penerimaan }}
                                    </span>
                                    @if($p->status_penerimaan == 'Diterima')
                                        <div class="small text-muted mt-1" style="font-size: 0.75rem;">Magang: <span class="fw-bold text-primary">{{ $p->status_magang }}</span></div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($p->status_penerimaan == 'Pending')
                                        <div class="btn-group shadow-sm" role="group">
                                            <form action="{{ route('unit.seleksi', [$p->id, 'lolos']) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success rounded-start-pill px-3"><i class="fa-solid fa-user-check me-1"></i> Lolos Kualifikasi</button>
                                            </form>
                                            <form action="{{ route('unit.seleksi', [$p->id, 'tolak']) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger rounded-end-pill px-3"><i class="fa-solid fa-user-xmark me-1"></i> Tolak</button>
                                            </form>
                                        </div>
                                    @elseif($p->status_penerimaan == 'Diterima' && $p->status_magang == 'Berjalan')
                                        <form action="{{ route('unit.selesai', $p->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-dark rounded-pill px-3 shadow-sm">
                                                <i class="fa-solid fa-flag-checkered me-1"></i> Selesaikan Masa Magang
                                            </button>
                                        </form>
                                    @elseif($p->status_magang == 'Selesai')
                                        <span class="text-success small fw-bold"><i class="fa-solid fa-circle-check me-1"></i> Selesai & Sertifikat Siap Unduh</span>
                                    @else
                                        <span class="text-danger small fw-bold"><i class="fa-solid fa-circle-xmark me-1"></i> Berkas Gugur Administrasi</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-tray-leaves fa-3x mb-3 opacity-25"></i>
                                    <p class="m-0">Belum ada limpahan berkas proposal dari SDM untuk divalidasi oleh Unit Kerja.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>