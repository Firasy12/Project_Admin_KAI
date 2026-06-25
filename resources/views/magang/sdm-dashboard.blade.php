<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-Magang KAI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --kai-blue: #223E92;
            --kai-orange: #ED6B23;
        }
        .bg-kai-blue { background-color: var(--kai-blue) !important; }
        .text-kai-blue { color: var(--kai-blue) !important; }
        .border-kai-blue { border-color: var(--kai-blue) !important; }
        .btn-kai-orange {
            background-color: var(--kai-orange);
            color: white;
            border: none;
        }
        .btn-kai-orange:hover {
            background-color: #d65a1a;
            color: white;
        }
        .card-stats {
            border-left: 5px solid var(--kai-blue);
            transition: transform 0.2s;
        }
        .card-stats:hover { transform: translateY(-3px); }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-kai-blue shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('magang.index') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Kereta_Api_Indonesia_Logo_%282020%29.svg" alt="Logo KAI" height="40" class="me-3 bg-white p-1 rounded">
                <div>
                    <span class="fw-bold tracking-wide">E-MAGANG KAI</span>
                    <small class="d-block fs-7 fw-light" style="font-size: 0.65rem;">Sistem Monitoring Seleksi - Divre III</small>
                </div>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm card-stats h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted text-uppercase small">Sisa Kuota Aktif</h6>
                            <h3 class="fw-bold m-0 text-kai-blue">{{ $sisaKuota }} Mhs</h3>
                        </div>
                        <i class="fa-solid fa-users-check fa-2x text-muted opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm card-stats h-100" style="border-left-color: var(--kai-orange);">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted text-uppercase small">Batas Maksimal Kuota</h6>
                            <h3 class="fw-bold m-0 text-dark">{{ $totalKuota }} Peserta</h3>
                        </div>
                        <i class="fa-solid fa-sliders fa-2x text-muted opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
                <a href="{{ route('magang.create') }}" class="btn btn-kai-orange btn-lg shadow-sm w-100 py-3 fw-bold">
                    <i class="fa-solid fa-user-plus me-2"></i> Tambah Pendaftar Baru
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-4">
                <i class="fa-solid fa-circle-check me-2 fs-5"></i> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center mb-4">
                <i class="fa-solid fa-triangle-exclamation me-2 fs-5"></i> {{ session('error') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-5">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center">
                <i class="fa-solid fa-table-list text-kai-blue me-2"></i>
                <h5 class="m-0 fw-bold text-secondary">Tabel Proses Tahapan Seleksi (Sesuai Flowchart)</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="min-width: 900px;">
                        <thead class="table-light text-uppercase fs-7">
                            <tr>
                                <th class="ps-4 py-3 text-secondary">Data Mahasiswa</th>
                                <th class="py-3 text-secondary text-center">Berkas Proposal</th>
                                <th class="py-3 text-secondary text-center">Validasi Kuota</th>
                                <th class="py-3 text-secondary text-center">Status Kelulusan</th>
                                <th class="py-3 text-secondary text-center">Aksi Tahapan Seleksi</th>
                                <th class="pe-4 py-3 text-secondary text-end">Aksi CRUD</th>
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
                                            <small class="text-muted">{{ $p->nim }} — {{ $p->universitas }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ asset('uploads/' . $p->file_proposal) }}" target="_blank" class="btn btn-sm btn-outline-danger px-3 rounded-pill">
                                        <i class="fa-solid fa-file-pdf me-1"></i> Lihat PDF
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill px-3 py-2 {{ $p->is_kuota_tersedia ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                        {{ $p->is_kuota_tersedia ? 'Tersedia' : 'Penuh' }}
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
                                            <form action="{{ route('magang.seleksi', [$p->id, 'lolos']) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success rounded-start-pill px-3"><i class="fa-solid fa-check me-1"></i> Lolos</button>
                                            </form>
                                            <form action="{{ route('magang.seleksi', [$p->id, 'tolak']) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger rounded-end-pill px-3"><i class="fa-solid fa-xmark me-1"></i> Tolak</button>
                                            </form>
                                        </div>
                                    @elseif($p->status_penerimaan == 'Diterima' && $p->status_magang == 'Berjalan')
                                        <a href="{{ route('magang.cetak', [$p->id, 'balasan']) }}" target="_blank" class="btn btn-sm btn-info text-white me-1 rounded-pill px-3">
                                            <i class="fa-solid fa-envelope-open-text me-1"></i> Cetak Surat Balasan
                                        </a>
                                        <form action="{{ route('magang.selesai', $p->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-dark rounded-pill px-3"><i class="fa-solid fa-flag-checkered me-1"></i> Selesai Magang</button>
                                        </form>
                                    @elseif($p->status_magang == 'Selesai')
                                        <a href="{{ route('magang.cetak', [$p->id, 'sertifikat']) }}" target="_blank" class="btn btn-sm btn-warning text-dark fw-bold rounded-pill px-3 shadow-sm">
                                            <i class="fa-solid fa-award me-1"></i> Cetak Sertifikat
                                        </a>
                                    @else
                                        <a href="{{ route('magang.cetak', [$p->id, 'penolakan']) }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            <i class="fa-solid fa-ban me-1"></i> Cetak Surat Tolak
                                        </a>
                                    @endif
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('magang.edit', $p->id) }}" class="btn btn-sm btn-light border text-secondary me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('magang.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini dari sistem?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-folder-open fa-3x mb-3 opacity-25"></i>
                                    <p class="m-0">Belum ada mahasiswa yang terdaftar di sistem monitoring.</p>
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