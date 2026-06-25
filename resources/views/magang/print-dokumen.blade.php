<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Dokumen - E-Magang KAI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { font-family: 'Times New Roman', Times, serif; background-color: #fff; color: #000; }
        .kop-surat { border-bottom: 4px double #000; padding-bottom: 12px; margin-bottom: 30px; }
        .sertifikat-box { border: 10px double #223e92; padding: 50px; text-align: center; margin-top: 30px; position: relative; }
        .watermark { position: absolute; top: 30%; left: 35%; opacity: 0.05; width: 30%; pointer-events: none; }
        @media print {
            .no-print { display: none !important; }
            body { padding: 15px; }
        }
    </style>
</head>
<body>
    <div class="container my-4" style="max-width: 800px;">
        <div class="no-print text-end mb-4 p-3 bg-light rounded border d-flex justify-content-between align-items-center">
            <span class="text-muted small">Pratinjau Dokumen Cetak Digital</span>
            <div>
                <button onclick="window.print()" class="btn btn-sm btn-primary me-1"><i class="btn-print"></i> 🖨️ Jalankan Printer</button>
                <button onclick="window.close()" class="btn btn-sm btn-secondary">Tutup</button>
            </div>
        </div>

        @if($jenis == 'balasan' || $jenis == 'penolakan')
            <div class="kop-surat d-flex align-items-center justify-content-between">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Kereta_Api_Indonesia_Logo_%282020%29.svg" alt="Logo KAI" height="55">
                <div class="text-end">
                    <h3 class="mb-0 fw-bold" style="color: #223E92; font-family: Arial, Helvetica, sans-serif;">PT KERETA API INDONESIA (PERSERO)</h3>
                    <p class="mb-0 font-monospace small">DIVISI REGIONAL III PALEMBANG</p>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Jl. Jenderal Ahmad Yani No. 13, Palembang, Sumatera Selatan</small>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    Nomor : B/KAI/MAGANG/{{ $data->id }}/VI/2026<br>
                    Sifat : Penting / Segera<br>
                    Lampiran: -
                </div>
                <div class="col-6 text-end">
                    Palembang, {{ date('d F Y') }}
                </div>
            </div>

            <p class="mt-3">Kepada Yth.<br><strong>Dekan / Pimpinan Instansi {{ $data->universitas }}</strong><br>di Tempat</p>

            <h5 class="text-center fw-bold my-4 text-uppercase text-decoration-underline" style="letter-spacing: 1px;">
                SURAT {{ $jenis == 'balasan' ? 'PENERIMAAN' : 'PENOLAKAN' }} HUBUNGAN KERJA MAGANG
            </h5>

            <p>Menunjuk surat permohonan pelaksanaan riset / magang industri di lingkungan unit kerja PT Kereta Api Indonesia (Persero) Divre III Palembang, dengan ini kami sampaikan data pemohon sebagai berikut:</p>
            <table class="table table-sm table-borderless ms-4 my-3" style="max-width: 550px;">
                <tr><td width="35%">Nama Mahasiswa</td><td>: <strong>{{ $data->nama_mahasiswa }}</strong></td></tr>
                <tr><td>Nomor Induk / NIM</td><td>: {{ $data->nim }}</td></tr>
                <tr><td>Fakultas / Jurusan</td><td>: {{ $data->jurusan }}</td></tr>
            </table>

            <p class="mt-4" style="text-align: justify; line-height: 1.6;">
                @if($jenis == 'balasan')
                    Berdasarkan verifikasi kesesuaian berkas dokumen serta ketersediaan ruang batas maksimum kuota tampung unit kerja kami, maka diputuskan bahwa mahasiswa tersebut di atas dinyatakan <strong>DITERIMA</strong> untuk mengikuti program magang kerja terhitung mulai tanggal administrasi dikeluarkan.
                @else
                    Berdasarkan hasil rapat evaluasi kuota tampung internal dan efisiensi ruang kerja kedinasan, dengan ini kami sampaikan permohonan maaf yang sebesar-besarnya bahwa berkas mahasiswa tersebut di atas saat ini dinyatakan <strong>BELUM DAPAT DITERIMA</strong>.
                @endif
            </p>

            <p class="mt-3">Demikian pemberitahuan resmi ini dikeluarkan, atas perhatian serta kerjasamanya kami ucapkan terima kasih.</p>

            <div class="text-end mt-5 pt-4">
                <p class="mb-5"><strong>Human Capital Manager Division</strong><br>PT Kereta Api Indonesia (Persero)</p>
                <p class="text-decoration-underline fw-bold mb-0">Divre III Palembang Corporate</p>
            </div>

        @elseif($jenis == 'sertifikat')
            <div class="sertifikat-box">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Kereta_Api_Indonesia_Logo_%282020%29.svg" alt="Watermark KAI" class="watermark">
                
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Kereta_Api_Indonesia_Logo_%282020%29.svg" alt="Logo KAI" height="60" class="mb-3">
                <h1 class="fw-bold mb-1" style="color: #223E92; font-family: 'Arial Black', Gadget, sans-serif; letter-spacing: 2px;">SERTIFIKAT MAGANG</h1>
                <p class="text-muted small">Nomor Dokumen: CERT/KAI/DIVRE3/{{ $data->id }}/2026</p>
                
                <hr style="width: 40%; margin: 25px auto; border-top: 3px double #223e92;">
                
                <p class="fs-5 italic my-3">Sertifikat ini dengan bangga diberikan kepada:</p>
                <h2 class="fw-bold my-2 text-dark" style="font-family: Georgia, serif;">{{ $data->nama_mahasiswa }}</h2>
                <p class="fs-6 text-muted">NIM: {{ $data->nim }} — {{ $data->universitas }}</p>

                <p class="mx-auto mt-4 px-4" style="max-width: 650px; font-size: 1.1rem; line-height: 1.6; text-align: center;">
                    Telah melaksanakan dan menyelesaikan Program Praktik Kerja Lapangan (Industrial Internship) di lingkungan <strong>PT Kereta Api Indonesia (Persero) Divisi Regional III Palembang</strong> secara menyeluruh dengan hasil capaian evaluasi kerja yang sangat baik.
                </p>

                <div class="row mt-5 pt-3">
                    <div class="col-6">
                        <small>Mengesahkan,</small><br>
                        <strong>Senior Supervisor Pembimbing</strong>
                        <div style="height: 65px;"></div>
                        <p class="mb-0 text-decoration-underline fw-bold">Unit Kerja Diklat KAI</p>
                    </div>
                    <div class="col-6">
                        <small>Palembang, {{ date('d F Y') }}</small><br>
                        <strong>Vice President Division</strong>
                        <div style="height: 65px;"></div>
                        <p class="mb-0 text-decoration-underline fw-bold">Management Executive KAI</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
</html>