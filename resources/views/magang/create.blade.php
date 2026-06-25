<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Magang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-kai-blue { background-color: #223E92 !important; }
        .btn-kai-orange { background-color: #ED6B23; color: white; }
        .btn-kai-orange:hover { background-color: #d65a1a; color: white; }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5" style="max-width: 650px;">
        <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
            <div class="card-header bg-kai-blue text-white p-4 d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Kereta_Api_Indonesia_Logo_%282020%29.svg" alt="Logo KAI" height="35" class="bg-white p-1 rounded me-3">
                <div>
                    <h4 class="mb-0 fw-bold">Form Registrasi E-Magang</h4>
                    <small class="text-white-50">Pengisian berkas usulan kelompok / individu mahasiswa</small>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold small text-secondary">Nama Lengkap</label>
                            <input type="text" name="nama_mahasiswa" class="form-control form-control-lg" placeholder="Masukkan nama sesuai KTM" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-secondary">NIM (Nomor Induk Mahasiswa)</label>
                            <input type="text" name="nim" class="form-control" placeholder="Contoh: 0902118..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-secondary">Universitas / Institut</label>
                            <input type="text" name="universitas" class="form-control" placeholder="Contoh: Universitas Sriwijaya" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold small text-secondary">Jurusan / Program Studi</label>
                            <input type="text" name="jurusan" class="form-control" placeholder="Contoh: Teknik Informatika" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-secondary">Alamat Email Aktif</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@domain.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-secondary">No. Handphone / WhatsApp</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 081234..." required>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold small text-secondary">Upload Proposal Pendukung (Format PDF)</label>
                            <input type="file" name="file_proposal" class="form-control" accept=".pdf" required>
                            <div class="form-text text-muted" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info"></i> Maksimum ukuran dokumen adalah 2 Megabytes (2MB).</div>
                        </div>
                    </div>
                    
                    <hr class="text-muted">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-light border px-4"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
                        <button type="submit" class="btn btn-kai-orange px-4 py-2 fw-bold shadow-sm"><i class="fa-solid fa-paper-plane me-1"></i> Kirim Berkas ke SDM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>