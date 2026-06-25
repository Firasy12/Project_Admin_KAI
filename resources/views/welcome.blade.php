<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard E-Magang KAI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Sistem Monitoring E-Magang KAI</h2>
            <a href="{{ route('magang.create') }}" class="btn btn-primary">+ Input Pendaftaran Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Universitas</th>
                            <th>Kuota</th>
                            <th>Administrasi</th>
                            <th>Status Penerimaan</th>
                            <th>Output Dokumen (Flowchart)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftar as $p)
                        <tr>
                            <td>{{ $p->nama_mahasiswa }}</td>
                            <td>{{ $p->universitas }}</td>
                            <td>
                                <span class="badge {{ $p->is_kuota_tersedia ? 'bg-success' : 'bg-danger' }}">
                                    {{ $p->is_kuota_tersedia ? 'Tersedia' : 'Penuh' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $p->is_lolos_administrasi ? 'bg-success' : 'bg-danger' }}">
                                    {{ $p->is_lolos_administrasi ? 'Lolos' : 'Gagal' }}
                                </span>
                            </td>
                            <td><strong>{{ $p->status_penerimaan }}</strong></td>
                            <td>
                                @if($p->status_penerimaan == 'Diterima' && $p->status_magang == 'Berjalan')
                                    <button class="btn btn-sm btn-info text-white">📄 Cetak Surat Balasan KAI</button>
                                    <form action="{{ route('magang.selesai', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Selesaikan Magang</button>
                                    </form>
                                @elseif($p->status_magang == 'Selesai')
                                    <button class="btn btn-sm btn-warning">🎓 Cetak Sertifikat Magang</button>
                                @else
                                    <button class="btn btn-sm btn-danger">📄 Cetak Surat Penolakan</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data pendaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>