<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; }
        th {
            background-color: #00529b;
            color: #ffffff;
            font-weight: bold;
            padding: 6px 8px;
            border: 1px solid #00427c;
            white-space: nowrap;
        }
        td {
            padding: 6px 8px;
            border: 1px solid #cbd5e1;
            vertical-align: top;
            mso-number-format: "\@"; {{-- paksa Excel treat semua sebagai teks, biar NIM/No HP tidak dianggap angka --}}
        }
        tr:nth-child(even) td { background-color: #f8fafc; }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Kode Pos</th>
                <th>Universitas</th>
                <th>Fakultas</th>
                <th>Program Studi</th>
                <th>Jenjang</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>SKS</th>
                <th>Alamat Kampus</th>
                <th>Unit Tujuan</th>
                <th>Status</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Motivasi</th>
                <th>Harapan</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->nim }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td>{{ $row->tempat_lahir }}</td>
                    <td>{{ $row->tgl_lahir ? \Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $row->jenis_kelamin === 'L' ? 'Laki-laki' : ($row->jenis_kelamin === 'P' ? 'Perempuan' : $row->jenis_kelamin) }}</td>
                    <td>{{ $row->agama }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->kota_nama }}</td>
                    <td>{{ $row->provinsi_nama }}</td>
                    <td>{{ $row->kode_pos }}</td>
                    <td>{{ $row->universitas }}</td>
                    <td>{{ $row->fakultas }}</td>
                    <td>{{ $row->prodi }}</td>
                    <td>{{ $row->jenjang }}</td>
                    <td>{{ $row->semester }}</td>
                    <td>{{ $row->ipk }}</td>
                    <td>{{ $row->sks }}</td>
                    <td>{{ $row->alamat_kampus }}</td>
                    <td>{{ $row->unit_tujuan }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->tanggal_mulai ? \Carbon\Carbon::parse($row->tanggal_mulai)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $row->tanggal_selesai ? \Carbon\Carbon::parse($row->tanggal_selesai)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $row->motivasi }}</td>
                    <td>{{ $row->harapan }}</td>
                    <td>{{ $row->created_at ? $row->created_at->format('d-m-Y H:i') : '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="27">Belum ada data pendaftar untuk ditampilkan.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
