<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pendaftaran Magang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h4>Form Edit Data Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('magang.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_mahasiswa" class="form-control" value="{{ $pendaftar->nama_mahasiswa }}" required>
                    </div>
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ $pendaftar->nim }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Universitas</label>
                        <input type="text" name="universitas" class="form-control" value="{{ $pendaftar->universitas }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="{{ $pendaftar->jurusan }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $pendaftar->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $pendaftar->no_hp }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Ubah Status Penerimaan</label>
                        <select name="status_penerimaan" class="form-select">
                            <option value="Pending" {{ $pendaftar->status_penerimaan == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diterima" {{ $pendaftar->status_penerimaan == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ $pendaftar->status_penerimaan == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Ubah Status Magang</label>
                        <select name="status_magang" class="form-select">
                            <option value="Belum Mulai" {{ $pendaftar->status_magang == 'Belum Mulai' ? 'selected' : '' }}>Belum Mulai</option>
                            <option value="Berjalan" {{ $pendaftar->status_magang == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                            <option value="Selesai" {{ $pendaftar->status_magang == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Ganti Proposal PDF (Biarkan kosong jika tidak diganti)</label>
                        <input type="file" name="file_proposal" class="form-control" accept=".pdf">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-warning text-white">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>