<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - E-Magang KAI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --kai-blue: #223E92;
            --kai-orange: #ED6B23;
        }
        .bg-kai-blue { background-color: var(--kai-blue) !important; }
        .text-kai-blue { color: var(--kai-blue) !important; }
        .timeline-steps { display: flex; justify-content: center; align-items: center; position: relative; }
        .timeline-step { text-align: center; position: relative; width: 33.33%; z-index: 2; }
        .timeline-step .step-icon { width: 50px; height: 50px; border-radius: 50%; background-color: #e9ecef; color: #6c757d; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; font-size: 1.25rem; border: 3px solid #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .timeline-step.active .step-icon { background-color: var(--kai-blue); color: white; }
        .timeline-step.completed .step-icon { background-color: #198754; color: white; }
        .timeline-step.rejected .step-icon { background-color: #dc3545; color: white; }
        .timeline-line { position: absolute; top: 25px; left: 15%; right: 15%; height: 4px; background-color: #e9ecef; z-index: 1; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-kai-blue shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" height="40" class="me-3 bg-white p-1 rounded">
                <div>
                    <span class="fw-bold tracking-wide">E-MAGANG KAI</span>
                    <small class="d-block fs-7 fw-light" style="font-size: 0.65rem;">Portal Mahasiswa - Divre III</small>
                </div>
            </a>
            <span class="navbar-text text-white fw-bold">Aktor: Mahasiswa</span>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-4">
                <i class="fa-solid fa-circle-check me-2 fs-5"></i> {{ session('success') }}
            </div>
        @endif

        @if(!$data_kamu)
            <div class="card border-0 shadow-sm rounded-3 text-center p-5 mb-5">
                <div class="py-4">
                    <i class="fa-solid fa-folder-open fa-4x text-muted opacity-25 mb-3"></i>
                    <h4 class="fw-bold text-secondary">Kamu Belum Mengajukan Pendaftaran</h4>
                    <p class="text-muted mb-4">Silakan unggah proposal magang kamu terlebih dahulu untuk memulai proses seleksi struktural PT KAI.</p>
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-warning btn-lg text-white px-4 fw-bold shadow-sm" style="background-color: var(--kai-orange); border:none;">
                        <i class="fa-solid fa-paper-plane me-2"></i> Ajukan Proposal Magang
                    </a>
                </div>
            </div>
        @else
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="card-header bg-kai-blue text-white py-3 text-center fw-bold">
                            <i class="fa-solid fa-id-card me-2"></i>Identitas Pendaftar
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless m-0">
                                <tr><td class="text-muted small py-1">Nama:</td><td class="fw-bold py-1">{{ $data_kamu->nama_mahasiswa }}</td></tr>
                                <tr><td class="text-muted small py-1">NIM:</td><td class="fw-bold py-1">{{ $data_kamu->nim }}</td></tr>
                                <tr><td class="text-muted small py-1">Kampus:</td><td class="fw-bold py-1">{{ $data_kamu->universitas }}</td></tr>
                                <tr><td class="text-muted small py-1">Jurusan:</td><td class="fw-bold py-1">{{ $data_kamu->jurusan }}</td></tr>
                                <tr><td class="text-muted small py-1">Berkas:</td><td class="py-1"><a href="{{ asset('uploads/' . $data_kamu->file_proposal) }}" target="_blank" class="btn btn-sm btn-outline-danger py-0 px-2 rounded-pill"><i class="fa-solid fa-file-pdf"></i> Proposal.pdf</a></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
                        <h5 class="fw-bold text-dark mb-4 text-center"><i class="fa-solid fa-route text-kai-blue me-2"></i>Status Berkas & Alur Seleksi</h5>
                        
                        <div class="position-relative my-4">
                            <div class="timeline-line"></div>
                            <div class="timeline-steps">
                                <div class="timeline-step {{ $data_kamu->posisi_berkas == 'SDM' ? 'active' : 'completed' }}">
                                    <div class="step-icon"><i class="fa-solid fa-building-user"></i></div>
                                    <h6 class="m-0 fw-bold small">1. Validasi SDM</h6>
                                    <small class="text-muted" style="font-size:0.75rem;">Cek Kuota Divre</small>
                                </div>
                                <div class="timeline-step {{ $data_kamu->posisi_berkas == 'UNIT' ? 'active' : ($data_kamu->status_penerimaan == 'Ditolak' && $data_kamu->is_kuota_tersedia ? 'rejected' : ($data_kamu->posisi_berkas == 'SELESAI' && $data_kamu->status_penerimaan == 'Diterima' ? 'completed' : '')) }}">
                                    <div class="step-icon"><i class="fa-solid fa-briefcase"></i></div>
                                    <h6 class="m-0 fw-bold small">2. Seleksi Unit</h6>
                                    <small class="text-muted" style="font-size:0.75rem;">Cek Administrasi</small>
                                </div>
                                <div class="timeline-step {{ $data_kamu->status_penerimaan == 'Ditolak' ? 'rejected' : ($data_kamu->posisi_berkas == 'SELESAI' ? 'completed' : '') }}">
                                    <div class="step-icon"><i class="fa-solid fa-flag-checkered"></i></div>
                                    <h6 class="m-0 fw-bold small">3. Hasil Akhir</h6>
                                    <small class="text-muted" style="font-size:0.75rem;">Pengumuman</small>
                                </div>
                            </div>
                        </div>

                        <div class="alert {{ $data_kamu->status_penerimaan == 'Diterima' ? 'alert-success' : ($data_kamu->status_penerimaan == 'Ditolak' ? 'alert-danger' : 'alert-warning') }} border-0 m-0 mt-4 shadow-sm text-center">
                            <strong>STATUS SAAT INI:</strong> 
                            @if($data_kamu->posisi_berkas == 'SDM')
                                Berkas berada di SDM (Sedang memeriksa sisa kuota).
                            @elseif($data_kamu->posisi_berkas == 'UNIT' && $data_kamu->status_penerimaan == 'Pending')
                                Kuota Divre Tersedia! Berkas diteruskan ke Unit Kerja terkait untuk divalidasi.
                            @elseif($data_kamu->status_penerimaan == 'Diterima')
                                Selamat! Anda DITERIMA Magang. Status Magang: <span class="badge bg-primary text-uppercase">{{ $data_kamu->status_magang }}</span>
                            @else
                                Mohon maaf, berkas Anda ditolak.
                            @endif
                        </div>
                    </div>

                    @if($data_kamu->posisi_berkas == 'SELESAI' || $data_kamu->status_magang == 'Selesai')
                    <div class="card border-0 shadow-sm rounded-3 p-3">
                        <h6 class="fw-bold mb-2 text-secondary"><i class="fa-solid fa-download me-2"></i>Unduh Dokumen Hasil Seleksi:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @if($data_kamu->status_penerimaan == 'Diterima')
                                <a href="{{ route('mahasiswa.cetak', [$data_kamu->id, 'balasan']) }}" target="_blank" class="btn btn-sm btn-info text-white rounded-pill px-3">
                                    <i class="fa-solid fa-envelope-open-text me-1"></i> Unduh Surat Balasan Resmi
                                </a>
                            @endif
                            @if($data_kamu->status_magang == 'Selesai')
                                <a href="{{ route('mahasiswa.cetak', [$data_kamu->id, 'sertifikat']) }}" target="_blank" class="btn btn-sm btn-warning text-dark fw-bold rounded-pill px-3">
                                    <i class="fa-solid fa-award me-1"></i> Unduh Sertifikat Magang Resmi
                                </a>
                            @endif
                            @if($data_kamu->status_penerimaan == 'Ditolak')
                                <a href="{{ route('mahasiswa.cetak', [$data_kamu->id, 'penolakan']) }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="fa-solid fa-ban me-1"></i> Unduh Surat Penolakan
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        @endif
    </div>

</body>
</html>