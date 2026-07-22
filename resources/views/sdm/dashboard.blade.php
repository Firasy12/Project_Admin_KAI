<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin SDM - Sistem Informasi Magang KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9;
        }

        /* Custom Scrollbar Styling */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
        }

        /* ==================================================================
       KAI Brand Core Colors - KITA GANTI JADI BIRU TERANG (image_18b0a6.png)
       ================================================================== */
        .kai-bg-navy {
            background-color: #00529b;
        }

        /* Mengubah background sidebar jadi biru terang */
        .kai-bg-orange {
            background-color: #f47920;
        }

        .kai-text-navy {
            color: #00529b;
        }

        /* Mengubah teks navy jadi warna biru terang */
        .kai-text-orange {
            color: #f47920;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden text-slate-800 bg-[#f4f6f9]">

    {{-- SIDEBAR UTAMA (KAI DEEP NAVY BLUE) --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-slate-900/50">
        {{-- LOGO AREA - TETAP KOKOH DAN PADAT --}}
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-slate-800/60">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI"
                class="h-11 mb-2 object-contain drop-shadow-md">
            <p class="text-[11px] text-center font-extrabold tracking-wide uppercase mt-1.5">
                <span class="kai-text-orange">PT KERETA API INDONESIA</span>
            </p>
        </div>

        {{-- NAVIGATION MENU ITEMS --}}
        <nav class="flex-1 overflow-y-auto py-4 custom-scrollbar">
            <div class="px-6 mb-2">
                <p class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest">MENU UTAMA</p>
            </div>

            <ul class="space-y-2 px-3">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/sdm/dashboard') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dashboard') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-house w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>

                {{-- Pengajuan Masuk --}}
                <li>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/pengajuan-masuk') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-file-import w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/pengajuan-masuk') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Pengajuan Masuk</span>
                    </a>
                </li>

                {{-- Review Pengajuan --}}
                <li>
                    <a href="{{ url('/sdm/review-pengajuan') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/review-pengajuan') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-user-shield w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/review-pengajuan') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Review Pengajuan</span>
                    </a>
                </li>

                {{-- Monitoring Status --}}
                <li>
                    <a href="{{ url('/sdm/monitoring') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Monitoring Status</span>
                    </a>
                </li>

                {{-- Notifikasi --}}
                <li>
                    <a href="{{ url('/sdm/notifikasi') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Notifikasi</span>
                    </a>
                </li>

                {{-- Dokumen --}}
                <li>
                    <a href="{{ url('/sdm/dokumen') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dokumen</span>
                    </a>
                </li>

                {{-- Profil --}}
                <li>
                    <a href="{{ url('/sdm/profil') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Profil</span>
                    </a>
                </li>
            </ul>

            <div class="px-6 my-4 border-t border-slate-800/50"></div>

            <ul class="px-3">
                <li>
                    <a href="{{ url('/logout') }}"
                        class="flex items-center px-6 py-3 text-rose-400 hover:text-rose-300 hover:bg-rose-950/30 rounded-full font-bold tracking-wide transition-all group">
                        <i
                            class="fa-solid fa-power-off w-5 text-center text-lg mr-3 transition-transform group-hover:scale-110"></i>
                        <span class="text-sm">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- MAIN CONTENT WRAPPER --}}
    <main class="flex-1 flex flex-col overflow-hidden relative">

        {{-- HEADER TOP BAR DENGAN AKSEN STRIP KAI --}}
        <header
            class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div> {{-- Aksen Garis Oranye di Judul Utama --}}
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Selamat Datang, SDM</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Pantau, verifikasi, dan kelola alur
                        administrasi penempatan magang mahasiswa</p>
                </div>
            </div>

            {{-- USER PROFILE INFOBAR --}}
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200/80 rounded-2xl p-2 pr-5 shadow-inner">
                    <div
                        class="w-9 h-9 rounded-xl kai-bg-navy text-white flex items-center justify-center font-black text-sm tracking-wide mr-3 shadow-md shadow-blue-950/30">
                        AS
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-slate-400 font-bold leading-none mt-0.5">Unit Divisi Humas &
                            SDM</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- AREA SCROLL DENGAN WARNA BACKGROUND DEKORATIF MULTILAYER --}}
        <div
            class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div
                class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0">
            </div>
            <div class="relative z-10 space-y-6">

                {{-- 4 KOTAK STATISTIK HORIZONTAL HYPER-ANIMATED UNTUK ADMIN SDM (FIXED: Screenshot 2026-07-07
                102407_2.png) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- 1. Pengajuan Masuk (Blue Theme - Baru) -->
                    <div
                        class="bg-white rounded-2xl p-5 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
                        {{-- Bulatan Bersih Sisi Kanan - Ikut Membesar Halus Saat Hover --}}
                        <div
                            class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-blue-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0">
                        </div>

                        <div class="flex items-center gap-4 relative z-10">
                            {{-- Ikon Kiri - Efek Pop-Up Skala & Rotasi --}}
                            <div
                                class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-blue-600/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                                <i class="fa-solid fa-inbox"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[10px] font-black text-slate-400 whitespace-nowrap uppercase tracking-wider">
                                    Pengajuan Masuk</p>
                                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">
                                    {{ $countMasuk ?? 0 }}</h3>
                            </div>
                        </div>
                        <span
                            class="text-[10px] font-black px-2.5 py-1 bg-blue-100 text-blue-700 border border-blue-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-blue-600 group-hover:text-white group-hover:border-transparent">Baru</span>
                    </div>

                    <!-- 2. Sedang Review (Purple Theme - Proses) -->
                    <div
                        class="bg-white rounded-2xl p-5 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
                        <div
                            class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-purple-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0">
                        </div>

                        <div class="flex items-center gap-4 relative z-10">
                            <div
                                class="w-12 h-12 rounded-2xl bg-purple-600 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-purple-600/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[10px] font-black text-slate-400 whitespace-nowrap uppercase tracking-wider">
                                    Sedang Review</p>
                                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">
                                    {{ $countReview ?? 0 }}</h3>
                            </div>
                        </div>
                        <span
                            class="text-[10px] font-black px-2.5 py-1 bg-purple-100 text-purple-700 border border-purple-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-purple-600 group-hover:text-white group-hover:border-transparent">Proses</span>
                    </div>

                    <!-- 3. Diterima (Emerald Theme - Lolos) -->
                    <div
                        class="bg-white rounded-2xl p-5 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
                        <div
                            class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-emerald-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0">
                        </div>

                        <div class="flex items-center gap-4 relative z-10">
                            <div
                                class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                                <i class="fa-solid fa-square-check"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[10px] font-black text-slate-400 whitespace-nowrap uppercase tracking-wider">
                                    Diterima</p>
                                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">
                                    {{ $countDiterima ?? 0 }}</h3>
                            </div>
                        </div>
                        <span
                            class="text-[10px] font-black px-2.5 py-1 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-emerald-600 group-hover:text-white group-hover:border-transparent">Lolos</span>
                    </div>

                    <!-- 4. Ditolak (Rose Theme - Gagal - FIXED CORRECTION) -->
                    <div
                        class="bg-white rounded-2xl p-5 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
                        <div
                            class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-rose-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0">
                        </div>

                        <div class="flex items-center gap-4 relative z-10">
                            <div
                                class="w-12 h-12 rounded-2xl bg-rose-500 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-rose-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                                <i class="fa-solid fa-square-xmark"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[10px] font-black text-slate-400 whitespace-nowrap uppercase tracking-wider">
                                    Ditolak</p>
                                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">
                                    {{ $countDitolak ?? 0 }}</h3>
                            </div>
                        </div>
                        <span
                            class="text-[10px] font-black px-2.5 py-1 bg-rose-100 text-rose-700 border border-rose-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-rose-600 group-hover:text-white group-hover:border-transparent">Gagal</span>
                    </div>

                </div>

                {{-- DETAIL 2: CARD TABEL DENGAN HEADER GRADASI DAN DEKORASI ROW --}}
                <div
                    class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden transition-shadow hover:shadow-lg">
                    {{-- HEADER TABEL DIKASIH LINGKUNGAN DESAIN DETIL --}}
                    <div
                        class="p-6 flex justify-between items-center border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <div>
                            <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-list-check text-slate-400"></i> Aplikasi Pengajuan Magang Terbaru
                            </h4>
                            <p class="text-xs font-semibold text-slate-400 mt-0.5">Log data berkas registrasi mahasiswa
                                yang baru saja masuk ke sistem antrean</p>
                        </div>
                        <a href="{{ url('/sdm/pengajuan-masuk') }}"
                            class="kai-bg-navy hover:kai-bg-orange text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all shadow-md shadow-blue-950/20 flex items-center gap-2 group">
                            <i class="fa-solid fa-sliders group-hover:animate-spin"></i> Proses Administrasi
                        </a>
                    </div>

                    {{-- INTI TABEL DENGAN VALUE DETIL --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="kai-bg-navy text-slate-300 text-[11px] font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4 rounded-tl-sm border-r border-slate-800/30">Mahasiswa /
                                        Institusi</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Program Studi</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Unit Tujuan</th>
                                    <th class="px-6 py-4 rounded-tr-sm">Waktu Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-600 divide-y divide-slate-100 bg-white">
                                @if(isset($aktivitasTerbaru) && count($aktivitasTerbaru) > 0)
                                    @foreach($aktivitasTerbaru as $item)
                                        <tr
                                            class="hover:bg-orange-50/20 even:bg-slate-50/40 transition-all duration-150 border-l-4 border-transparent hover:border-l-[#f47920]">
                                            <td class="px-6 py-4">
                                                <div class="font-extrabold text-slate-800 text-[14px]">{{ $item->nama }}</div>
                                                <div class="text-xs text-slate-400 font-bold mt-1 flex items-center gap-1.5">
                                                    <div
                                                        class="w-4 h-4 rounded-md bg-slate-100 flex items-center justify-center text-[9px] text-slate-400">
                                                        <i class="fa-solid fa-university"></i></div>
                                                    {{ $item->universitas }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 font-bold text-slate-700">
                                                <span
                                                    class="px-2.5 py-1 bg-slate-100 border border-slate-200 text-slate-600 rounded-lg text-xs font-semibold">{{ $item->jurusan }}</span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1 rounded-xl bg-blue-50 text-blue-700 border border-blue-100 shadow-sm">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                                    {{ $item->unit_tujuan ?? 'Belum Ditentukan' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-xs font-bold text-slate-400 whitespace-nowrap">
                                                <span class="flex items-center gap-1.5 text-slate-500"><i
                                                        class="fa-solid fa-clock text-slate-300 text-sm"></i>{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center text-slate-400 bg-white">
                                            <div
                                                class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                                                <i class="fa-solid fa-inbox text-3xl text-slate-300"></i>
                                            </div>
                                            <p class="text-sm font-extrabold text-slate-500">Belum Ada Aktivitas</p>
                                            <p class="text-xs font-semibold text-slate-400 mt-1">Belum ada pengajuan magang
                                                yang masuk.</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- DETAIL 3: GRID BAWAH (KUOTA & LOG) DENGAN STRUKTUR WARNA PANEL INNER SHADOW --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- Diagram Progress Donut -->
                    <div
                        class="bg-white rounded-2xl border border-slate-200 p-6 shadow-md flex flex-col justify-between min-h-[290px] relative">
                        <div class="border-l-4 border-l-[#f47920] pl-3">
                            <h5 class="text-base font-extrabold text-[#0b1739] tracking-tight">Ketersediaan Kuota</h5>
                            <p class="text-xs text-slate-400 mt-0.5">Persentase utilisasi kapasitas magang</p>
                        </div>

                        <div class="flex items-center justify-start gap-8 py-4 mt-2">
                            {{-- Ring Progress Visual --}}
                            @php
                                $pct = $persentaseKuota ?? 0;
                                $deg = round(($pct / 100) * 360);
                            @endphp
                            <div class="relative flex items-center justify-center shrink-0">
                                <div class="w-32 h-32 rounded-full flex flex-col items-center justify-center shadow-lg bg-slate-50/50"
                                    style="background: conic-gradient(#f47920 0deg {{ $deg }}deg, #e2e8f0 {{ $deg }}deg 360deg); padding: 12px;">
                                    <div
                                        class="w-full h-full rounded-full bg-white flex flex-col items-center justify-center">
                                        <span class="text-2xl font-black text-[#0b1739]">{{ $pct }}%</span>
                                        <span
                                            class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Terisi</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Keterangan Warna List Samping --}}
                            <div class="grid grid-cols-1 gap-2 text-xs font-bold text-slate-600">
                                <div class="flex items-center"><span
                                        class="w-3 h-3 rounded-md bg-blue-600 mr-2 shadow-sm"></span> Masuk
                                    ({{ $countMasuk ?? 0 }})</div>
                                <div class="flex items-center"><span
                                        class="w-3 h-3 rounded-md bg-purple-600 mr-2 shadow-sm"></span> Review
                                    ({{ $countReview ?? 0 }})</div>
                                <div class="flex items-center"><span
                                        class="w-3 h-3 rounded-md bg-emerald-500 mr-2 shadow-sm"></span> Diterima
                                    ({{ $kuotaTerisi ?? 0 }}/{{ $totalKuota ?? 0 }} kuota)</div>
                                <div class="flex items-center"><span
                                        class="w-3 h-3 rounded-md bg-rose-500 mr-2 shadow-sm"></span> Ditolak
                                    ({{ $countDitolak ?? 0 }})</div>
                            </div>
                        </div>
                    </div>

                    <!-- Sistem Log Aktivitas Sistem (2 Kolom) -->
                    <div
                        class="bg-white rounded-2xl border border-slate-200 p-6 lg:col-span-2 shadow-md flex flex-col justify-between min-h-[290px]">
                        <div>
                            <div class="border-l-4 border-l-[#0b1739] pl-3 mb-4">
                                <h5 class="text-base font-extrabold text-[#0b1739] tracking-tight">Log Histori Aktivitas
                                </h5>
                                <p class="text-xs text-slate-400 mt-0.5">Pantauan aktivitas sinkronisasi data sistem</p>
                            </div>

                            <div class="space-y-3 max-h-44 overflow-y-auto pr-1 custom-scrollbar">
                                @forelse(($logAktivitas ?? []) as $log)
                                    @php
                                        $iconMap = [
                                            'menunggu_verifikasi' => ['bg-blue-50 border-blue-100 text-blue-600', 'fa-solid fa-user-plus', 'text-blue-700 bg-blue-50 border-blue-100', 'masuk ke sistem dan menunggu verifikasi SDM'],
                                            'disposisi' => ['bg-purple-50 border-purple-100 text-purple-600', 'fa-solid fa-share-nodes', 'text-purple-700 bg-purple-50 border-purple-100', 'diteruskan ke unit terkait'],
                                            'perlu_perbaikan' => ['bg-amber-50 border-amber-100 text-amber-600', 'fa-solid fa-rotate-left', 'text-amber-700 bg-amber-50 border-amber-100', 'diminta melakukan perbaikan berkas'],
                                            'diterima' => ['bg-emerald-50 border-emerald-100 text-emerald-600', 'fa-solid fa-circle-check', 'text-emerald-700 bg-emerald-50 border-emerald-100', 'dinyatakan diterima magang'],
                                            'ditolak' => ['bg-rose-50 border-rose-100 text-rose-600', 'fa-solid fa-circle-xmark', 'text-rose-700 bg-rose-50 border-rose-100', 'ditolak pengajuannya'],
                                        ];
                                        [$iconBg, $icon, $nameStyle, $desc] = $iconMap[$log->status_raw] ?? ['bg-slate-50 border-slate-100 text-slate-600', 'fa-solid fa-file', 'text-slate-700 bg-slate-50 border-slate-100', 'diperbarui statusnya'];
                                    @endphp
                                    <div
                                        class="flex items-start gap-3.5 p-3.5 bg-gradient-to-r from-slate-50 to-white rounded-xl border border-slate-200/70 shadow-sm hover:border-blue-200 transition-colors">
                                        <div
                                            class="w-9 h-9 rounded-xl {{ $iconBg }} flex items-center justify-center text-sm shrink-0 shadow-sm">
                                            <i class="{{ $icon }}"></i></div>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Pembaruan Status Pengajuan</p>
                                            <p class="text-[11px] text-slate-400 font-semibold mt-1 leading-relaxed">
                                                Mahasiswa atas nama <span
                                                    class="font-extrabold {{ $nameStyle }} px-1.5 py-0.5 rounded border">{{ $log->nama }}</span>
                                                {{ $desc }}.</p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-xs text-slate-400 text-center py-6">Belum ada aktivitas terbaru.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                {{-- EXPORT ACTIONS --}}
                <div class="bg-white rounded-2xl shadow-xl shadow-blue-950/10 border border-blue-100/50 p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        {{-- Judul --}}
                        <div>
                            <h4 class="text-lg font-extrabold text-[#0b1739] tracking-tight">
                                Export Laporan
                            </h4>
                            <p class="text-xs text-slate-400 font-semibold mt-1">
                                Unduh laporan data mahasiswa magang dalam format PDF atau Excel.
                            </p>
                        </div>

                        {{-- Tombol --}}
                        <div class="flex items-center gap-3">

                            <a href="{{ url('/unit/export/pdf') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl
                      bg-gradient-to-r from-rose-500 to-red-600
                      hover:from-rose-600 hover:to-red-700
                      text-white font-bold text-sm
                      shadow-lg shadow-rose-500/20
                      transition-all duration-300 hover:-translate-y-1">
                                <i class="fa-solid fa-file-pdf text-lg"></i>
                                Export PDF
                            </a>

                            <a href="{{ url('/unit/export/excel') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl
                      bg-gradient-to-r from-emerald-500 to-green-600
                      hover:from-emerald-600 hover:to-green-700
                      text-white font-bold text-sm
                      shadow-lg shadow-emerald-500/20
                      transition-all duration-300 hover:-translate-y-1">
                                <i class="fa-solid fa-file-excel text-lg"></i>
                                Export Excel
                            </a>

                        </div>

                    </div>
                </div>

            </div> {{-- END OF LAYER CONTAINER WRAPPER --}}
        </div>
    </main>
</body>

</html>