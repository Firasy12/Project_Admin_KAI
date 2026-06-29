@extends('layouts.sdm')

@section('title','Dashboard SDM')

@section('content')

<div class="wrapper">

    {{-- Sidebar --}}
<aside class="sidebar">

    <div class="logo-area">

        <img src="{{ asset('images/logo-kai.png') }}" class="logo">

        <h5>Sistem Informasi Magang</h5>

        <small>PT Kereta Api Indonesia</small>

    </div>

    <span class="menu-label">

        ADMIN SDM

    </span>

    <ul class="menu">

        <li class="active">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </li>

        <li>
            <i class="fa-solid fa-file-lines"></i>
            Pengajuan Magang
        </li>

        <li>
            <i class="fa-solid fa-users"></i>
            Review Berkas
        </li>

        <li>
            <i class="fa-solid fa-location-dot"></i>
            Disposisi ke Unit
        </li>

        <li>
            <i class="fa-solid fa-chart-line"></i>
            Monitoring Status
        </li>

        <li>
            <i class="fa-solid fa-bell"></i>
            Notifikasi
        </li>

        <li>
            <i class="fa-solid fa-folder-open"></i>
            Dokumen
        </li>

        <li>
            <i class="fa-solid fa-file"></i>
            Laporan
        </li>

    </ul>

</aside>

    {{-- Main --}}
    <main class="content">

        {{-- Header --}}
<div class="topbar">

    <div>

        <h2>

            Selamat Datang, Admin SDM

        </h2>

        <span>

            Kelola pengajuan magang dengan mudah

        </span>

    </div>

    <div class="right-menu">

        <div class="notification">

            <i class="fa-solid fa-bell"></i>

            <span class="badge-notif">

                1

            </span>

        </div>

        <div class="profile-card">

            <img src="{{ asset('images/avatar.png') }}">

            <div>

                <b>Admin SDM</b>

                <small>SDM PT KAI</small>

            </div>

        </div>

    </div>

</div>

        {{-- Statistik --}}
        <div class="row mt-4">

            <div class="col-lg-3">

                <div class="stat-card">

                    <small>Menunggu Verifikasi</small>

                    <h2>{{ $menunggu }}</h2>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="stat-card">

                    <small>Pengajuan</small>

                    <h2>{{ $review }}</h2>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="stat-card">

                    <small>Perlu Disposisi</small>

                    <h2>{{ $diterima }}</h2>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="stat-card">

                    <small>Unit Mereview</small>

                    <h2>{{ $ditolak }}</h2>

                </div>

            </div>

        </div>

        {{-- Pengajuan Terbaru --}}
        <div class="card dashboard-card mt-4">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h5 class="mb-0">

                    Pengajuan Terbaru

                </h5>

                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">

                    Lihat Semua

                </a>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-bordered align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Nama</th>

                                <th>Universitas</th>

                                <th>Jurusan</th>

                                <th>Unit Tujuan</th>

                                <th>Tanggal</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

@foreach($pengajuan as $item)

<tr>

    <td>{{ $item->nama }}</td>

    <td>{{ $item->universitas }}</td>

    <td>{{ $item->jurusan }}</td>

    <td>{{ $item->unit_tujuan }}</td>

    <td>{{ $item->tanggal_pengajuan }}</td>

    <td>

        <a href="#" class="btn btn-primary btn-sm">

            <i class="fa fa-eye"></i>

        </a>

        <a href="#" class="btn btn-warning btn-sm">

            <i class="fa fa-pen"></i>

        </a>

        <a href="#" class="btn btn-danger btn-sm">

            <i class="fa fa-trash"></i>

        </a>

    </td>

</tr>

@endforeach

</tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="row mt-4">

    <!-- Ringkasan Status -->

    <div class="col-lg-5">

        <div class="card dashboard-card">

            <div class="card-header">

                Ringkasan Status

            </div>

            <div class="card-body">

                <canvas id="statusChart" height="240"></canvas>

            </div>

        </div>

    </div>

    <!-- Aktivitas -->

    <div class="col-lg-7">

        <div class="card dashboard-card">

            <div class="card-header">

                Aktivitas Terbaru

            </div>

            <div class="card-body">

                <div class="activity-item">

                    <i class="fa-solid fa-file-lines"></i>

                    <div>

                        <b>Pengajuan Baru</b>

                        <p>
                            Nizam Kori mengajukan magang
                        </p>

                        <small>2 menit lalu</small>

                    </div>

                </div>

                <div class="activity-item">

                    <i class="fa-solid fa-paper-plane"></i>

                    <div>

                        <b>Disposisi Unit</b>

                        <p>
                            Berkas dikirim ke Sistem Informasi
                        </p>

                        <small>10 menit lalu</small>

                    </div>

                </div>

                <div class="activity-item">

                    <i class="fa-solid fa-circle-check"></i>

                    <div>

                        <b>Diterima</b>

                        <p>
                            Muhammad Fikri diterima
                        </p>

                        <small>30 menit lalu</small>

                    </div>

                </div>

                <div class="activity-item">

                    <i class="fa-solid fa-user-clock"></i>

                    <div>

                        <b>Menunggu Review</b>

                        <p>
                            17 mahasiswa masih diproses
                        </p>

                        <small>1 jam lalu</small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-6">

        <div class="info-box">

            <i class="fa-solid fa-bullhorn"></i>

            <div>

                <h6>Informasi</h6>

                <span>

                    Pastikan semua berkas mahasiswa telah diverifikasi
                    sebelum didisposisikan ke unit.

                </span>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="info-box warning">

            <i class="fa-solid fa-bell"></i>

            <div>

                <h6>Pengingat</h6>

                <span>

                    Masih ada 17 pengajuan yang belum
                    didisposisikan.

                </span>

            </div>

        </div>

    </div>

</div>

    </main>

</div>

@endsection