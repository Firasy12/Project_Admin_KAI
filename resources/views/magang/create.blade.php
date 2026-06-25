<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi E-Magang | PT Kereta Api Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
        }
        :root {
            --kai-blue: #223E92;
            --kai-orange: #ED6B23;
            --kai-dark: #1e293b;
        }
        .card-custom {
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .header-gradient {
            background: linear-gradient(135deg, var(--kai-blue) 0%, #1a3070 100%);
            position: relative;
            overflow: hidden;
        }
        .header-gradient::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }
        .form-label {
            color: var(--kai-dark);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.3px;
            margin-bottom: 8px;
        }
        .input-group-text-custom {
            background-color: #f8fafc;
            border-right: none;
            color: #64748b;
            transition: all 0.3s ease;
        }
        .form-control-custom {
            border-left: none;
            font-size: 0.95rem;
            padding: 11px 16px;
            border-color: #dee2e6;
            transition: all 0.3s ease;
        }
        .form-control-custom:focus {
            box-shadow: none;
            border-color: var(--kai-blue);
        }
        .input-group:focus-within .input-group-text-custom {
            border-color: var(--kai-blue);
            color: var(--kai-blue);
        }
        /* Custom File Upload Styling */
        .file-upload-wrapper {
            position: relative;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            background-color: #f8fafc;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .file-upload-wrapper:hover {
            border-color: var(--kai-orange);
            background-color: #fff7ed;
        }
        .file-upload-wrapper input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        /* Button Theme */
        .btn-kai-orange {
            background: linear-gradient(135deg, var(--kai-orange) 0%, #d65a1a 100%);
            color: white;
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-kai-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(237, 107, 35, 0.3);
            color: white;
        }
        .btn-light-custom {
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            color: #64748b;
            transition: all 0.3s ease;
        }
        .btn-light-custom:hover {
            background-color: #f1f5f9;
            color: #334155;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5" style="max-width: 700px;">
        <div class="card card-custom shadow-xl overflow-hidden">
            
            <div class="card-header header-gradient text-white p-4 d-flex align-items-center border-0">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" height="42" class="bg-white p-2 rounded-3 me-3 shadow-sm">
                <div>
                    <h4 class="mb-1 fw-extrabold" style="letter-spacing: -0.5px;">Form Registrasi E-Magang</h4>
                    <p class="text-white-50 small mb-0"><i class="fa-solid fa-circle-info me-1"></i> Silakan lengkapi berkas usulan kelompok / individu mahasiswa</p>
                </div>
            </div>

            <div class="card-body p-4 p-md-5">
                <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">NAMA LENGKAP MAHASISWA</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"><i class="fa-solid fa-user-tie"></i></span>
                                <input type="text" name="nama_mahasiswa" class="form-control form-control-custom" placeholder="Masukkan nama sesuai KTM / KTP" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIM (NOMOR INDUK MAHASISWA)</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"><i class="fa-solid fa-id-card"></i></span>
                                <input type="text" name="nim" class="form-control form-control-custom" placeholder="Contoh: 0902118..." required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">UNIVERSITAS / INSTITUT</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"><i class="fa-solid fa-building-columns"></i></span>
                                <input type="text" name="universitas" class="form-control form-control-custom" placeholder="Contoh: Universitas Sriwijaya" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">JURUSAN / PROGRAM STUDI</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input type="text" name="jurusan" class="form-control form-control-custom" placeholder="Contoh: Sistem Komputer" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">ALAMAT EMAIL AKTIF</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control form-control-custom" placeholder="nama@domain.com" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">NO. WHATSAPP AKTIF</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-text-custom"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" name="no_hp" class="form-control form-control-custom" placeholder="Contoh: 081234567xxx" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">UPLOAD PROPOSAL PENDUKUNG (FORMAT PDF)</label>
                            <div class="file-upload-wrapper">
                                <i class="fa-solid fa-cloud-arrow-up text-secondary fa-2x mb-2"></i>
                                <h6 class="mb-1 text-dark fw-bold">Pilih file PDF atau seret ke sini</h6>
                                <p class="text-muted small mb-0">Maksimal ukuran file dokumen adalah 2 Megabytes (2MB)</p>
                                <input type="file" name="file_proposal" id="file_proposal" accept=".pdf" required onchange="displayFileName()">
                            </div>
                            <div id="file-name-display" class="form-text text-success mt-2 fw-bold small" style="display: none;"></div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-light-custom px-4 py-2 fw-semibold"><i class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                        <button type="submit" class="btn btn-kai-orange px-4 py-2 fw-bold shadow-sm"><i class="fa-solid fa-paper-plane me-2"></i>Kirim Berkas ke SDM</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        function displayFileName() {
            const input = document.getElementById('file_proposal');
            const display = document.getElementById('file-name-display');
            if(input.files.length > 0) {
                display.innerHTML = `<i class="fa-solid fa-file-pdf me-1"></i> Dokumen Terpilih: ${input.files[0].name}`;
                display.style.display = 'block';
            }
        }
    </script>
</body>
</html>