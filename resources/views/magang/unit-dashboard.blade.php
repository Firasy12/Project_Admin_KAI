<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Unit Kerja - E-Magang KAI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f4f6fa; }
        :root { --kai-blue: #223E92; }
        .bg-kai-blue { background-color: var(--kai-blue) !important; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-kai-blue shadow-sm mb-4 py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" height="38" class="bg-white p-1 rounded me-3 shadow-sm">
                <div>
                    <span class="fw-bold fs-5 d-block">E-MAGANG KAI</span>
                    <small style="font-size: 0.7rem;" class="text-white-50">User: Unit Kerja Lapangan / Pembimbing</small>
                </div>
            </a>
            <span class="badge bg-orange text-white bg-warning fw-bold px-3 py-2 rounded-pill">Aktor: UNIT KERJA</span>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4"><i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="m-0 fw-bold text-secondary"><i class="fa-solid fa-user-gear text-kai-blue me-2"></i>Penilaian Proposal & Progress Magang Aktif</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Mahasiswa</th>
                                <th>File Proposal</th>
                                <th class="text-center">Status Berkas</th>
                                <th class="text-center">Status Magang</th>
                                <th class="text-center">Aksi Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftar as $p)
                            <tr>
                                <td class="ps-4">
                                    <h6 class="fw-bold text-dark mb-0">{{ $p->nama_mahasiswa }}</h6>
                                    <small class="text-muted">{{ $p->nim }} | {{ $p->universitas }}</small>
                                    <div class="small text-secondary">{{ $p->jurusan }}</div>
                                </td>
                                <td>
                                    <a href="{{ asset('uploads/' . $p->file_proposal) }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                        <i class="fa-solid fa-file-pdf me-1"></i> Buka Proposal
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge @if($p->status_penerimaan == 'Diterima') bg-success @elif($p->status_penerimaan == 'Ditolak') bg-danger @else bg-warning text-dark @endif px-3 py-2 rounded-pill fw-bold">
                                        {{ $p->status_penerimaan }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill fw-bold">{{ $p->status_magang }}</span>
                                </td>
                                <td class="text-center">
                                    @if($p->status_penerimaan == 'Pending')
                                        <div class="d-flex justify-content-center gap-2">
                                            <form action="{{ route('unit.seleksi', [$p->id, 'lolos']) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-success rounded-pill px-3"><i class="fa-solid fa-user-plus me-1"></i>Terima Magang</button>
                                            </form>
                                            <form action="{{ route('unit.seleksi', [$p->id, 'gugur']) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3"><i class="fa-solid fa-user-minus me-1"></i>Tolak</button>
                                            </form>
                                        </div>
                                    @elif($p->status_penerimaan == 'Diterima' && $p->status_magang == 'Berjalan')
                                        <form action="{{ route('unit.selesai', $p->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-primary rounded-pill px-3 fw-bold"><i class="fa-solid fa-graduation-cap me-1"></i>Selesaikan Magang</button>
                                        </form>
                                    @else
                                        <span class="text-muted small fw-semibold"><i class="fa-solid fa-circle-check text-success me-1"></i>Selesai Diproses</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-hourglass-half fa-2x mb-2 opacity-50"></i>
                                    <p class="mb-0">Belum ada berkas mahasiswa yang dioper oleh pihak SDM.</p>
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