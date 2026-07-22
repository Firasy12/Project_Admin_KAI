<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $judul }}</title>

    <style>
        @page {
            margin: 20px 22px;
        }

        body {
            font-family: DejaVu Sans, Helvetica, Arial, sans-serif;
            color: #334155;
            font-size: 10px;
        }

        * {
            box-sizing: border-box;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #00529b;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header table {
            width: 100%;
            border-collapse: collapse;
        }

        .header td {
            vertical-align: middle;
        }

        .logo {
            width: 75px;
        }

        .title {
            text-align: center;
        }

        .title h2 {
            margin: 0;
            color: #00529b;
            font-size: 17px;
        }

        .title h3 {
            margin: 4px 0;
            font-size: 12px;
            color: #334155;
        }

        .title p {
            margin: 0;
            color: #64748b;
            font-size: 9px;
        }

        .info {
            width: 100%;
            margin-bottom: 12px;
            border-collapse: collapse;
        }

        .info td {
            padding: 2px 0;
            font-size: 9px;
        }

        .summary {
            margin-bottom: 15px;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary td {
            width: 25%;
            border: 1px solid #dbeafe;
            background: #f8fbff;
            padding: 8px;
            text-align: center;
        }

        .summary h4 {
            margin: 0;
            color: #00529b;
            font-size: 16px;
        }

        .summary p {
            margin: 3px 0 0;
            font-size: 8px;
            color: #64748b;
            text-transform: uppercase;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        table.data th {
            background: #00529b;
            color: white;
            border: 1px solid #00427c;
            padding: 6px 4px;
            font-size: 8px;
            text-align: center;
        }

        table.data td {
            border: 1px solid #e2e8f0;
            padding: 5px 4px;
            font-size: 8px;
            vertical-align: top;
            word-wrap: break-word;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .badge {
            display: inline-block;
            padding: 3px 6px;
            font-size: 7px;
            font-weight: bold;
            text-align: center;
        }

        .badge-diterima {
            background: #d1fae5;
            color: #047857;
        }

        .badge-ditolak {
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-review {
            background: #ede9fe;
            color: #7c3aed;
        }

        .badge-menunggu {
            background: #fef3c7;
            color: #b45309;
        }

        .footer {
            margin-top: 15px;
            border-top: 1px solid #dbeafe;
            padding-top: 6px;
            font-size: 8px;
            color: #64748b;
            text-align: right;
        }

        .page:after {
            content: counter(page);
        }
    </style>

</head>

<body>

    <div class="header">

        <table>
            <tr>

                <td width="80">
                    <img src="{{ public_path('images/logo-kai.png') }}" class="logo">
                </td>

                <td class="title">

                    <h2>PT KERETA API INDONESIA (PERSERO)</h2>

                    <h3>{{ $judul }}</h3>

                    <p>Sistem Informasi Pengelolaan Magang Mahasiswa</p>

                </td>

            </tr>
        </table>

    </div>

    <table class="info">
        <tr>
            <td><b>Dicetak Oleh</b> : {{ $dicetak_oleh }}</td>
            <td align="right"><b>Tanggal</b> : {{ now()->format('d/m/Y H:i') }} WIB</td>
        </tr>

        <tr>
            <td colspan="2"><b>Total Data</b> : {{ $data->count() }} Mahasiswa</td>
        </tr>
    </table>

    <div class="summary">

        <table>

            <tr>

                <td>
                    <h4>{{ $data->count() }}</h4>
                    <p>Total Pendaftar</p>
                </td>

                <td>
                    <h4>{{ $data->filter(fn($x) => strtolower(trim($x->status)) == 'diterima')->count() }}</h4>
                    <p>Diterima</p>
                </td>

                <td>
                    <h4>{{ $data->filter(fn($x) => strtolower(trim($x->status)) == 'ditolak')->count() }}</h4>
                    <p>Ditolak</p>
                </td>

                <td>
                    <h4>{{ $data->filter(fn($x) => strtolower(trim($x->status)) == 'review')->count() }}</h4>
                    <p>Review</p>
                </td>

            </tr>

        </table>

    </div>

    <table class="data">

        <thead>

            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>TTL</th>
                <th>JK</th>
                <th>Universitas</th>
                <th>Program Studi</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Unit</th>
                <th>Status</th>
                <th>Periode</th>

            </tr>

        </thead>

        <tbody>

            @forelse($data as $i => $row)

                @php

                    $badge = match (strtolower($row->status)) {
                        'diterima' => 'badge-diterima',
                        'ditolak' => 'badge-ditolak',
                        'review' => 'badge-review',
                        default => 'badge-menunggu'
                    };

                @endphp

                <tr>

                    <td align="center">{{ $i + 1 }}</td>

                    <td>
                        <b>{{ $row->nama }}</b><br>
                        {{ $row->nim }}
                    </td>

                    <td>
                        {{ $row->email }}<br>
                        {{ $row->no_hp }}
                    </td>

                    <td>
                        {{ $row->tempat_lahir }}<br>
                        {{ $row->tgl_lahir ? \Carbon\Carbon::parse($row->tgl_lahir)->format('d/m/Y') : '-' }}
                    </td>

                    <td>
                        {{ $row->jenis_kelamin }}<br>
                        {{ $row->agama }}
                    </td>

                    <td>
                        <b>{{ $row->universitas }}</b><br>
                        {{ $row->fakultas }}
                    </td>

                    <td>
                        {{ $row->prodi }}<br>
                        {{ $row->jenjang }}
                    </td>

                    <td align="center">
                        {{ $row->semester }}
                    </td>

                    <td align="center">
                        {{ $row->ipk }}
                    </td>

                    <td>
                        {{ $row->unit_tujuan }}
                    </td>

                    <td align="center">
                        <span class="badge {{ $badge }}">
                            {{ strtoupper($row->status) }}
                        </span>
                    </td>

                    <td>
                        {{ $row->tanggal_mulai ? \Carbon\Carbon::parse($row->tanggal_mulai)->format('d/m/Y') : '-' }}
                        <br>
                        s/d
                        <br>
                        {{ $row->tanggal_selesai ? \Carbon\Carbon::parse($row->tanggal_selesai)->format('d/m/Y') : '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="12" align="center" style="padding:30px">
                        Belum ada data.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">

        Dokumen ini dibuat otomatis oleh Sistem Informasi Magang PT Kereta Api Indonesia (Persero).

        <br>

        Halaman <span class="page"></span>

    </div>

</body>

</html>