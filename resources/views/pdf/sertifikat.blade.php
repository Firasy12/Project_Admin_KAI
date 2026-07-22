<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sertifikat Magang - {{ $mahasiswa->nama ?? '' }}</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: "DejaVu Sans", sans-serif;
            color: #333333;
        }

        /* ====== HALAMAN ====== */
        .page {
            position: relative;
            width: 297mm;
            height: 210mm;
            overflow: hidden;
        }

        .border-outer {
            position: absolute;
            top: 6mm;
            left: 6mm;
            right: 6mm;
            bottom: 6mm;
            border: 2.5mm solid #00529B;
        }

        .border-inner {
            position: absolute;
            top: 9mm;
            left: 9mm;
            right: 9mm;
            bottom: 9mm;
            border: 0.6mm solid #F47920;
        }

        /* ====== WATERMARK ====== */
        .watermark {
            position: absolute;
            width: 110mm;
            top: 50mm;
            left: 93mm;
            opacity: 0.06;
        }

        /* ====== ISI (block flow biasa, TIDAK pakai flexbox) ====== */
        .content-wrap {
            position: absolute;
            top: 13mm;
            left: 20mm;
            right: 20mm;
            bottom: 13mm;
            text-align: center;
        }

        /* ====== LOGO & KOP ====== */
        .logo img {
            width: 18mm;
            height: auto;
        }

        .company {
            margin-top: 2mm;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #00529B;
        }

        /* ====== JUDUL ====== */
        .title {
            margin-top: 5mm;
        }

        .title h1 {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 6px;
            color: #00529B;
        }

        .title h2 {
            margin: 2px 0 0;
            font-size: 14px;
            font-weight: normal;
            letter-spacing: 6px;
            color: #F47920;
        }

        .number {
            margin-top: 3mm;
            font-size: 11.5px;
            color: #666666;
        }

        /* ====== ISI SERTIFIKAT ====== */
        .given {
            margin-top: 7mm;
            font-size: 13.5px;
            color: #555555;
        }

        .name {
            margin-top: 3mm;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #111111;
        }

        .line {
            width: 55mm;
            margin: 3mm auto 0;
            border-bottom: 1.2px solid #00529B;
        }

        .description {
            width: 165mm;
            margin: 5mm auto 0;
            font-size: 13px;
            line-height: 20px;
            color: #333333;
        }

        /* ====== TANDA TANGAN (pakai table, bukan float/flex) ====== */
        .sign-table {
            width: 100%;
            margin-top: 9mm;
            border-collapse: collapse;
            font-size: 12px;
        }

        .sign-table td {
            vertical-align: top;
        }

        .sign-blank {
            width: 55%;
        }

        .sign-cell {
            width: 45%;
            text-align: center;
            line-height: 17px;
        }

        .sign-space {
            height: 15mm;
        }

        .sign-name {
            font-weight: bold;
            text-decoration: underline;
            color: #111111;
        }

        /* ====== FOOTER KECIL ====== */
        .bottom-table {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            border-collapse: collapse;
            border-top: 0.5px solid #dddddd;
            font-size: 9px;
            color: #888888;
        }

        .bottom-table td {
            padding-top: 2mm;
        }

        .bottom-right {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="page">

        <div class="border-outer"></div>
        <div class="border-inner"></div>

        @if(file_exists(public_path('images/logo-kai.png')))
            <img class="watermark" src="{{ public_path('images/logo-kai.png') }}">
        @endif

        <div class="content-wrap">

            {{-- Kop / logo --}}
            <div class="logo">
                @if(file_exists(public_path('images/logo-kai.png')))
                    <img src="{{ public_path('images/logo-kai.png') }}">
                @endif
                <div class="company">PT KERETA API INDONESIA (PERSERO)</div>
            </div>

            {{-- Judul --}}
            <div class="title">
                <h1>SERTIFIKAT</h1>
                <h2>PROGRAM MAGANG</h2>
            </div>

            <div class="number">
                Nomor Sertifikat :
                <b>KAI/{{ now()->year }}/{{ sprintf('%05d', $mahasiswa->id) }}</b>
            </div>

            {{-- Isi --}}
            <div class="given">Diberikan kepada</div>

            <div class="name">{{ strtoupper($mahasiswa->nama) }}</div>

            <div class="line"></div>

            <div class="description">
                Atas partisipasi dan dedikasi dalam menyelesaikan <b>Program Magang</b>
                di <b>PT Kereta Api Indonesia (Persero)</b> pada unit
                <b>{{ is_object($mahasiswa->unit_tujuan) ? $mahasiswa->unit_tujuan->nama : $mahasiswa->unit_tujuan }}</b>
                selama periode
                <b>
                    {{ \Carbon\Carbon::parse($mahasiswa->tanggal_mulai)->translatedFormat('d F Y') }}
                    &ndash;
                    {{ \Carbon\Carbon::parse($mahasiswa->tanggal_selesai)->translatedFormat('d F Y') }}
                </b>
                dengan baik.
            </div>

            {{-- Tanda tangan: pakai table 2 kolom supaya sejajar rapi di kanan --}}
            <table class="sign-table">
                <tr>
                    <td class="sign-blank"></td>
                    <td class="sign-cell">
                        Palembang, {{ now()->translatedFormat('d F Y') }}<br>
                        Manager Unit
                        <div class="sign-space"></div>
                        <div class="sign-name">{{ $mahasiswa->manager_nama ?? '____________________' }}</div>
                    </td>
                </tr>
            </table>

        </div>

        {{-- Footer kecil, dikunci di bawah halaman --}}
        <table class="bottom-table">
            <tr>
                <td>PT Kereta Api Indonesia (Persero)</td>
                <td class="bottom-right">Dicetak: {{ now()->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

    </div>

</body>

</html>