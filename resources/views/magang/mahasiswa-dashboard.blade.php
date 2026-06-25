<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - E-Magang KAI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f4f6fa; min-height: 100vh; }
        :root { --kai-blue: #223E92; --kai-orange: #ED6B23; }
        .bg-kai-blue { background-color: var(--kai-blue) !important; }
        .card-custom { border: none; border-radius: 16px; background: white; }
        
        /* Timeline Styling */
        .timeline-steps { display: flex; justify-content: space-between; align-items: center; position: relative; }
        .timeline-steps::before { content: ""; position: absolute; top: 25px; left: 10%; right: 10%; height: 4px; background: #cbd5e1; z-index: 1; }
        .timeline-step { text-align: center; position: relative; z-index: 2; width: 30%; }
        .timeline-icon { width: 54px; height: 54px; border-radius: 50%; background: #cbd5e1; color: white; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px; font-size: 1.25rem; border: 4px solid #f4f6fa; transition: all 0.3s ease; }
        
        /* Active & Success States */
        .step-success .timeline-icon { background: #22c55e; box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2); }
        .step-active .timeline-icon { background: var(--kai-orange); box-shadow: 0 0 0 4px rgba(237, 107, 35, 0.2); }
        .step-muted .timeline-icon { background: #cbd5e1; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-kai-blue shadow-sm mb-4 py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" height="38" class="bg-white p-1 rounded me-3 shadow-sm">
                <span class="fw-bold fs-5">Portal Mahasiswa — E-Magang KAI</span>
            </a>
            <a href="{{ route('mahasiswa.daftar') }}" class="btn btn-warning btn-sm fw-bold px-3 py-2 rounded-pill"><i class="fa-solid fa-plus me-1"></i>Daftar Magang Baru</a>
        </div>
    </nav>

    <div class="container py-2">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4"><i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card card-custom shadow-sm p-4">
                    <h5 class="fw-bold text-secondary mb-4 border-bottom pb-2"><i class="fa-solid fa-address-card me-2 text-kai-blue"></i>Identitas Pendaftar</h5>
                    @if($data_kamu)
                        <div class="mb-3">
                            <label class="text-muted small fw-bold d-block">NAMA LENGKAP</label>
                            <span class="fw-bold text-dark fs-5">{{ $data_kamu->nama_mahasiswa }}</span>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small fw-bold d-block">NIM</label>
                            <span class="text-secondary fw-semibold">{{ $data_kamu->nim }}</span>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small fw-bold d-block">KAMPUS / PRODI</label>
                            <span class="text-secondary fw-semibold">{{ $data_kamu->universitas }} — <small>{{ $data_kamu->jurusan }}</small></span>
                        </div>
                        <div class="mb-2">
                            <label class="text-muted small fw-bold d-block">PROPOSAL SAYA</label>
                            <a href="{{ asset('uploads/'.$data_kamu->file_proposal) }}" target="_blank" class="btn btn-sm btn-outline-danger mt-1 rounded-pill"><i class="fa-solid fa-file-pdf me-1"></i>Lihat Proposal.pdf</a>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="fa-solid fa-user-slash fa-2x mb-2 opacity-50"></i>
                            <p class="small mb-0">Anda belum mengirimkan berkas pendaftaran apa pun.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-custom shadow-sm p-4 mb-4">
                    <h5 class="fw-bold text-secondary mb-5 border-bottom pb-2"><i class="fa-solid fa-route me-2 text-kai-blue"></i>Status & Alur Proses Berkas</h5>
                    
                    @if($data_kamu)
                        @php
                            $posisi = $data_kamu->posisi_berkas;
                            $status = $data_kamu->status_penerimaan;
                        @endphp

                        <div class="timeline-steps mb-5">
                            <div class="timeline-step 
                                @if($posisi == 'SDM' && $status == 'Pending') step-active 
                                @elseif($status == 'Ditolak' && $posisi == 'SDM') step-active
                                @else step-success @endif">
                                <div class="timeline-icon"><i class="fa-solid fa-building-user"></i></div>
                                <h6 class="fw-bold mb-0">1. Validasi SDM</h6>
                                <small class="text-muted">Cek Kuota Divre</small>
                            </div>

                            <div class="timeline-step 
                                @if($posisi == 'UNIT' && $status == 'Pending') step-active 
                                @elseif($posisi == 'SDM') step-muted
                                @elseif($status == 'Ditolak' && $posisi == 'UNIT') step-active
                                @else step-success @endif">
                                <div class="timeline-icon"><i class="fa-solid fa-briefcase"></i></div>
                                <h6 class="fw-bold mb-0">2. Seleksi Unit</h6>
                                <small class="text-muted">Kualifikasi Proposal</small>
                            </div>

                            <div class="timeline-step 
                                @if($posisi == 'SELESAI' && $status == 'Diterima') step-success 
                                @elseif($status == 'Ditolak') step-muted
                                @elseif($posisi == 'SELESAI') step-active
                                @else step-muted @endif">
                                <div class="timeline-icon"><i class="fa-solid fa-flag-checkered"></i></div>
                                <h6 class="fw-bold mb-0">3. Hasil Akhir</h6>
                                <small class="text-muted">Pengumuman</small>
                            </div>
                        </div>

                        <div class="p-4 rounded-3 border @if($status == 'Pending') bg-light @style('border-color: #dee2e6;') @elseif($status == 'Diterima') bg-success bg-opacity-10 border-success @else bg-danger bg-opacity-10 border-danger @endif text-center">
                            <h5 class="fw-bold mb-3 text-secondary" style="font-size: 0.9rem; letter-spacing: 0.5px;">STATUS BERKAS SAAT INI</h5>
                            
                            @if($status == 'Pending')
                                <div class="py-2">
                                    <span class="badge bg-warning text-dark px-4 py-2.5 fs-6 rounded-pill fw-bold shadow-sm">
                                        <i class="fa-solid fa-clock-rotate-left me-2"></i>Sedang Diproses di Meja {{ $posisi }}
                                    </span>
                                    <p class="text-muted small mt-3 mb-0">Berkas Anda saat ini sedang dalam tahap peninjauan dan validasi oleh Tim {{ $posisi }} KAI.</p>
                                </div>
                            @elseif($status == 'Diterima')
                                <div class="py-2">
                                    <span class="badge bg-success px-4 py-2.5 fs-6 rounded-pill fw-bold shadow-sm mb-2">
                                        <i class="fa-solid fa-circle-check me-2"></i>Selamat! Anda Resmi DITERIMA Magang
                                    </span>
                                    <div class="mt-3 text-secondary small">Masa aktif program magang Anda: <strong class="text-success">{{ $data_kamu->status_magang }}</strong></div>
                                </div>
                            @else
                                <div class="py-2">
                                    <span class="badge bg-danger px-4 py-2.5 fs-6 rounded-pill fw-bold shadow-sm">
                                        <i class="fa-solid fa-circle-xmark me-2"></i>Mohon Maaf, Berkas Anda DITOLAK
                                    </span>
                                    <p class="text-muted small mt-3 mb-0">Jangan berkecil hati! Kuota penuh atau kualifikasi berkas belum memenuhi spesifikasi kebutuhan unit kerja.</p>
                                </div>
                            @endif
                        </div>
                        
                        @if($status == 'Diterima')
                        <div class="mt-4 border-top pt-4">
                            <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-download me-2 text-kai-blue"></i>Unduh Dokumen Hasil Seleksi:</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('cetak.dokumen', [$data_kamu->id, 'balasan']) }}" target="_blank" class="btn btn-primary btn-sm px-3 py-2 rounded-pill shadow-sm"><i class="fa-solid fa-envelope-open-text me-1"></i> Surat Balasan Penerimaan</a>
                                @if($data_kamu->status_magang == 'Selesai')
                                    <a href="{{ route('cetak.dokumen', [$data_kamu->id, 'sertifikat']) }}" target="_blank" class="btn btn-warning btn-sm px-3 py-2 rounded-pill fw-bold shadow-sm"><i class="fa-solid fa-medal me-1"></i> Unduh Sertifikat Magang Resmi</a>
                                @endif
                            </div>
                        </div>
                        @endif

                    @else
                        <div class="text-center py-5 text-muted">
                            <i class="fa-solid fa-folder-open fa-3x mb-3 opacity-25"></i>
                            <h6 class="fw-bold">Belum Ada Data yang Bisa Dilacak</h6>
                            <small>Silakan klik tombol "Daftar Magang Baru" di kanan atas untuk memulai perjalanan magang Anda.</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>