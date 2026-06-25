<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SDM - E-Magang KAI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f4f6fa; }
        :root { --kai-blue: #223E92; --kai-orange: #ED6B23; }
        .bg-kai-blue { background-color: var(--kai-blue) !important; }
        .bg-kai-orange { background-color: var(--kai-orange) !important; }
        .card-stat { border: none; border-radius: 16px; transition: transform 0.2s ease; }
        .card-stat:hover { transform: translateY(-3px); }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-kai-blue shadow-sm mb-4 py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" height="38" class="bg-white p-1 rounded me-3 shadow-sm">
                <div>
                    <span class="fw-bold fs-5 d-block">E-MAGANG KAI</span>
                    <small style="font-size: 0.7rem;" class="text-white-50">Human Capital / SDM - Divisi Regional III</small>
                </div>
            </a>
            <span class="badge bg-white text-kai-blue fw-bold px-3 py-2 rounded-pill">Aktor: SDM</span>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4"><i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card card-stat bg-kai-blue text-white p-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 small font-bold text-uppercase mb-1">Maksimal Kuota</h6>
                            <h2 class="fw-bold mb-0">{{ $totalKuota }} <span class="fs-5 fw-normal">Orang</span></h2>
                        </div>
                        <i class="fa-solid fa-users fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat bg-success text-white p-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 small font-bold text-uppercase mb-1">Kuota Terisi Active</h6>
                            <h2 class="fw-bold mb-0">{{ $totalKuota - $sisaKuota }} <span class="fs-5 fw-normal">Orang</span></h2>
                        </div>
                        <i class="fa-solid fa-user-check fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat bg-kai-orange text-white p-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 small font-bold text-uppercase mb-1">Sisa Slot Kuota</h6>
                            <h2 class="fw-bold mb-0">{{ $sisaKuota }} <span class="fs-5 fw-normal">Slot</span></h2>
                        </div>
                        <i class="fa-solid fa-pie-chart fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="m-0 fw-bold text-secondary"><i class="fa-solid fa-folder-open text-kai-blue me-2"></i>Berkas Masuk Menunggu Validasi</h5>
                <span class="badge bg-danger rounded-pill px-3 py-2">{{ $pendaftar->count() }} Berkas</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Data Mahasiswa</th>
                                <th>Kontak Informasi</th>
                                <th class="text-center">Dokumen</th>
                                <th class="text-center">Posisi Alur</th>
                                <th class="text-center">Aksi Pengecekan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftar as $p)
                            <tr>
                                <td class="ps-4">
                                    <h6 class="fw-bold text-dark mb-0">{{ $p->nama_mahasiswa }}</h6>
                                    <small class="text-muted">{{ $p->nim }} — <strong>{{ $p->universitas }}</strong></small>
                                    <div style="font-size: 0.75rem;" class="text-secondary">{{ $p->jurusan }}</div>
                                </td>
                                <td>
                                    <div class="small text-secondary"><i class="fa-solid fa-envelope me-1 text-muted"></i>{{ $p->email }}</div>
                                    <div class="small text-secondary"><i class="fa-solid fa-phone me-1 text-muted"></i>{{ $p->no_hp }}</div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ asset('uploads/' . $p->file_proposal) }}" target="_blank" class="btn btn-sm btn-outline-danger px-3 rounded-pill">
                                        <i class="fa-solid fa-file-pdf me-1"></i> Buka Proposal
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold" style="font-size: 0.7rem;">MEJA SDM</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <form action="{{ route('sdm.oper', $p->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success rounded-pill px-3" {{ $sisaKuota <= 0 ? 'disabled' : '' }}><i class="fa-solid fa-check me-1"></i>Kuota Ada</button>
                                        </form>
                                        <form action="{{ route('sdm.tolak', $p->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3"><i class="fa-solid fa-ban me-1"></i>Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-circle-check fa-3x text-success mb-2 opacity-50"></i>
                                    <h6 class="fw-bold">Semua Bersih! Tidak Ada Dokumen Tertahan di SDM</h6>
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