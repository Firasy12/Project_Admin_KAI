@extends('layouts.app')

@section('title','Dashboard Unit')

@section('content')

<link rel="stylesheet"
href="{{ asset('css/unit-dashboard.css') }}">

<div class="wrapper">

    <aside class="sidebar">

        <div class="logo">

            <img src="{{ asset('images/logo-kai.png') }}">

            <h3>Sistem Informasi Magang</h3>

            <small>PT Kereta Api Indonesia</small>

        </div>

        <div class="sidebar-title">

            ADMIN UNIT

        </div>

 <ul class="menu">

    <li class="active">

        <a href="#">

            <i class="fa-solid fa-house"></i>

            Dashboard

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-file-lines"></i>

            Pengajuan Masuk

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-magnifying-glass"></i>

            Review Pengajuan

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-clock-rotate-left"></i>

            Riwayat Review

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-chart-line"></i>

            Monitoring Status

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-bell"></i>

            Notifikasi

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-folder-open"></i>

            Dokumen

        </a>

    </li>

    <li>

        <a href="#">

            <i class="fa-solid fa-user"></i>

            Profil

        </a>

    </li>

</ul>

    </aside>

<main class="content">

    <div class="topbar">

        <div class="page-title">

            <h2 id="greeting">Selamat Datang, Unit Sistem Informasi</h2>

            <p>Kelola pengajuan magang dengan mudah</p>

        </div>

        <div class="admin-box">

<div class="notification">

    <i class="fa-solid fa-bell"></i>

    <span class="badge">1</span>

</div>

<div class="profile-card">

    <img src="{{ asset('images/avatar.png') }}" alt="Avatar">

    <div>

        <div class="profile-name">

            Admin Unit

        </div>

        <div class="profile-role">

            Sistem Informasi

        </div>

    </div>

</div>

        </div>

    </div>

    <div class="stats">

        <div class="stat-card">

            <div class="stat-title">

                Pengajuan Masuk

            </div>

            <div class="stat-value">

                128

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-title">

                Sedang Review

            </div>

            <div class="stat-value">

                28

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-title">

                Diterima

            </div>

            <div class="stat-value">

                17

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-title">

                Ditolak

            </div>

            <div class="stat-value">

                40

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-title">

                Selesai

            </div>

            <div class="stat-value">

                43

            </div>

        </div>

    </div>
<div class="table-card">

    <div class="table-header">

        <h3>Pengajuan Terbaru</h3>

        <button class="btn-lihat">

            Lihat Semua

        </button>

    </div>

    <table class="table">

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

        <tr>

            <td>Nizam Kori</td>

            <td>Universitas Sriwijaya</td>

            <td>Sistem Informasi</td>

            <td>Sistem Informasi</td>

            <td>24 Mei 2026</td>

            <td>

                <div class="action">

<button class="btn-view">

    <i class="fa-solid fa-eye"></i>

</button>

<button class="btn-edit">

    <i class="fa-solid fa-pen"></i>

</button>

<button class="btn-delete">

    <i class="fa-solid fa-trash"></i>

</button>

                </div>

            </td>

        </tr>

        <tr>

            <td>Putri Amelia</td>

            <td>Universitas Sriwijaya</td>

            <td>Informatika</td>

            <td>SDM</td>

            <td>24 Mei 2026</td>

            <td>

                <div class="action">

                    <button class="btn-view">👁</button>

                    <button class="btn-edit">✏</button>

                    <button class="btn-delete">🗑</button>

                </div>

            </td>

        </tr>

        <tr>

            <td>Rizky Febrian</td>

            <td>Universitas Sriwijaya</td>

            <td>Administrasi</td>

            <td>Operasional</td>

            <td>23 Mei 2026</td>

            <td>

                <div class="action">

                    <button class="btn-view">👁</button>

                    <button class="btn-edit">✏</button>

                    <button class="btn-delete">🗑</button>

                </div>

            </td>

        </tr>

        </tbody>

    </table>

</div>

</main>

<div class="bottom-grid">

    <!-- CHART -->

    <div class="card-ui">

        <div class="card-title">

            Ringkasan Status

        </div>

<div class="chart-box">

    <canvas id="statusChart"></canvas>

</div>

    </div>

    <!-- KANAN -->

    <div>

        <!-- Aktivitas -->

        <div class="card-ui mb-3">

            <div class="card-title">

                Aktivitas Terbaru

            </div>

            <div class="activity">

<div class="activity-icon">

    <i class="fa-solid fa-file-lines"></i>

</div>

                <div>

                    <div class="activity-title">

                        Pengajuan Baru

                    </div>

                    <div class="activity-desc">

                        Nizam Kori mengirim proposal.

                    </div>

                    <div class="activity-time">

                        2 menit lalu

                    </div>

                </div>

            </div>

            <div class="activity">

<div class="activity-icon">

    <i class="fa-solid fa-circle-check"></i>

</div>

                <div>

                    <div class="activity-title">

                        Review Selesai

                    </div>

                    <div class="activity-desc">

                        Rizky Febrian diterima.

                    </div>

                    <div class="activity-time">

                        30 menit lalu

                    </div>

                </div>

            </div>

        </div>

        <!-- Pengingat -->

        <div class="card-ui">

            <div class="card-title">

                Pengingat

            </div>

            <div class="reminder">

                Masih ada

                <strong>17 pengajuan</strong>

                yang belum direview.

            </div>

        </div>

    </div>

</div>

    </main>

</div>

@push('scripts')

<script>

const ctx = document.getElementById('statusChart');

new Chart(ctx,{

    type:'doughnut',

    data:{

        labels:[

            'Diterima',

            'Review',

            'Ditolak',

            'Menunggu'

        ],

        datasets:[{

            data:[43,20,18,19],

            backgroundColor:[

                '#2ECC71',

                '#3498DB',

                '#E74C3C',

                '#F39C12'

            ],

            borderWidth:0

        }]

    },

    options:{

        cutout:'68%',

        plugins:{

            legend:{

                position:'bottom'

            }

        }

    }

});

</script>

@endpush

@endsection