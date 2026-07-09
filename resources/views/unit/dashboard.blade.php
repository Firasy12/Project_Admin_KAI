<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Unit - KAI Intern Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
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
        
        /* KAI Brand Core Colors - ROYAL CORPORATE BLUE STYLE */
        .kai-bg-navy { background-color: #00529b; }   
        .kai-bg-orange { background-color: #f47920; }
        .kai-text-navy { color: #00529b; }             
        .kai-text-orange { color: #f47920; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-800 bg-[#f4f6f9]">

    {{-- SIDEBAR UTAMA (KAI ROYAL BLUE) --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-white/10">
        {{-- LOGO AREA --}}
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-white/10">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-11 mb-2 object-contain drop-shadow-md">
            <p class="text-[11px] text-center font-extrabold tracking-wide uppercase mt-1.5">
                <span class="kai-text-orange">PT KERETA API INDONESIA</span>
            </p>
        </div>

        {{-- NAVIGATION MENU ITEMS (AUTOMATIC ACTIVE DETECTION) --}}
<nav class="flex-1 overflow-y-auto py-4 custom-scrollbar">
    <div class="px-6 mb-2">
        <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest opacity-70">Admin Unit SI</p>
    </div>
    
    {{-- MENU UTAMA FORMAT KAPSUL LONJONG --}}
    <ul class="space-y-2 px-3">
        {{-- Dashboard --}}
        <li>
            <a href="{{ url('/unit/dashboard') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/dashboard') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-house w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>

        {{-- Pengajuan Masuk --}}
        <li>
            <a href="{{ url('/unit/pengajuan-masuk') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/pengajuan-masuk') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-file-import w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/pengajuan-masuk') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Pengajuan Masuk</span>
            </a>
        </li>

        {{-- Review Pengajuan --}}
        <li>
            <a href="{{ url('/unit/review-pengajuan') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/review-pengajuan') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-user-shield w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/review-pengajuan') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Review Pengajuan</span>
            </a>
        </li>

        {{-- Monitoring Status --}}
        <li>
            <a href="{{ url('/unit/monitoring') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Monitoring Status</span>
            </a>
        </li>

        {{-- Notifikasi --}}
        <li>
            <a href="{{ url('/unit/notifikasi') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Notifikasi</span>
            </a>
        </li>

        {{-- Dokumen --}}
        <li>
            <a href="{{ url('/unit/dokumen') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Dokumen</span>
            </a>
        </li>

        {{-- Profil --}}
        <li>
            <a href="{{ url('/unit/profil') }}" 
               class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                <i class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                <span class="text-sm">Profil</span>
            </a>
        </li>
    </ul>

    {{-- LINE SEPARATOR APRESIASI VISUAL --}}
    <div class="px-6 my-4 border-t border-white/10"></div>

    {{-- KELOMPOK ACTION LOGOUT (FORMAT KAPSUL LONJONG SEJAJAR) --}}
    <ul class="px-3">
        <li>
            <a href="{{ url('/logout') }}" class="flex items-center px-6 py-3 text-rose-400 hover:text-rose-300 hover:bg-rose-950/30 rounded-full font-bold tracking-wide transition-all group">
                <i class="fa-solid fa-power-off w-5 text-center text-lg mr-3 transition-transform group-hover:scale-110"></i>
                <span class="text-sm">Logout</span>
            </a>
        </li>
    </ul>
</nav>
    </aside>

    {{-- MAIN CONTENT INTERFACE WRAPPER --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        
        {{-- HEADER TOP BAR --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Selamat Datang, Unit Sistem Informasi</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Kelola pengajuan magang mahasiswa di unit Anda dengan mudah</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl p-2 pr-5 shadow-inner">
                    <div class="w-9 h-9 rounded-xl kai-bg-navy text-white flex items-center justify-center font-black text-sm mr-3 shadow-md">
                        AU
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin Unit</span>
                        <span class="text-[10px] text-slate-400 font-bold leading-none mt-0.5">Sistem Informasi</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- AREA WORKSPACE: GRADASI BIRU MUDA FRESH CORPORATE (image_193085.jpg) --}}
        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

            {{-- LAYOUT MAIN CONTAINER --}}
            <div class="relative z-10 space-y-6">
                
                {{-- 5 KOTAK STATISTIK HORIZONTAL HYPER-ANIMATED (Screenshot 2026-07-07 102407.png) --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
    
    <!-- 1. Tugas Masuk (Blue Theme) -->
    <div class="bg-white rounded-2xl p-4 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
        {{-- Bulatan Kanan Khas SDM - Ikut Membesar Halus Saat Hover --}}
        <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-blue-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0"></div>
        
        <div class="flex items-center gap-3.5 relative z-10">
            {{-- Ikon Kiri - Efek Pop-Up Skala --}}
            <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-blue-600/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                <i class="fa-solid fa-inbox"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Tugas Masuk</p>
                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">{{ $jumlah_masuk ?? 0 }}</h3>
            </div>
        </div>
        <span class="text-[10px] font-black px-2.5 py-1 bg-blue-100 text-blue-700 border border-blue-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-blue-600 group-hover:text-white group-hover:border-transparent">Baru</span>
    </div>

    <!-- 2. Perlu Review (Purple Theme) -->
    <div class="bg-white rounded-2xl p-4 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
        <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-purple-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0"></div>
        
        <div class="flex items-center gap-3.5 relative z-10">
            <div class="w-12 h-12 rounded-2xl bg-purple-600 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-purple-600/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Perlu Review</p>
                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">{{ $jumlah_masuk ?? 0 }}</h3>
            </div>
        </div>
        <span class="text-[10px] font-black px-2.5 py-1 bg-purple-100 text-purple-700 border border-purple-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-purple-600 group-hover:text-white group-hover:border-transparent">Proses</span>
    </div>

    <!-- 3. Diterima (Emerald Theme) -->
    <div class="bg-white rounded-2xl p-4 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
        <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-emerald-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0"></div>
        
        <div class="flex items-center gap-3.5 relative z-10">
            <div class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-emerald-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                <i class="fa-solid fa-square-check"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Diterima</p>
                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">{{ $countDiterima ?? 6 }}</h3>
            </div>
        </div>
        <span class="text-[10px] font-black px-2.5 py-1 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-emerald-600 group-hover:text-white group-hover:border-transparent">Lolos</span>
    </div>

    <!-- 4. Ditolak (Rose Theme) -->
    <div class="bg-white rounded-2xl p-4 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
        <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-rose-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0"></div>
        
        <div class="flex items-center gap-3.5 relative z-10">
            <div class="w-12 h-12 rounded-2xl bg-rose-500 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-rose-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                <i class="fa-solid fa-square-xmark"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Ditolak</p>
                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">{{ $countDitolak ?? 2 }}</h3>
            </div>
        </div>
        <span class="text-[10px] font-black px-2.5 py-1 bg-rose-100 text-rose-700 border border-rose-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-rose-600 group-hover:text-white group-hover:border-transparent">Gagal</span>
    </div>

    <!-- 5. Selesai (Cyan Theme) -->
    <div class="bg-white rounded-2xl p-4 flex items-center justify-between shadow-xl shadow-blue-950/5 border border-blue-100/30 relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-blue-950/10 group">
        <div class="absolute -right-4 top-1/2 -translate-y-1/2 w-24 h-24 bg-cyan-50/60 rounded-full transition-transform duration-500 ease-out group-hover:scale-125 pointer-events-none z-0"></div>
        
        <div class="flex items-center gap-3.5 relative z-10">
            <div class="w-12 h-12 rounded-2xl bg-cyan-500 text-white flex items-center justify-center text-xl shrink-0 shadow-lg shadow-cyan-500/20 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Selesai</p>
                <h3 class="text-2xl font-black text-[#0b1739] mt-0.5 tracking-tight">{{ $countSelesai ?? 0 }}</h3>
            </div>
        </div>
        <span class="text-[10px] font-black px-2.5 py-1 bg-cyan-100 text-cyan-700 border border-cyan-200 rounded-lg shadow-sm uppercase tracking-wide relative z-10 transition-colors group-hover:bg-cyan-600 group-hover:text-white group-hover:border-transparent">Alumni</span>
    </div>

</div>

                {{-- DATA TABLE CARD --}}
                <div class="bg-white rounded-2xl shadow-xl shadow-blue-950/10 overflow-hidden border border-blue-100/50">
                    <div class="p-6 flex justify-between items-center border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <h5 class="text-base font-extrabold text-[#0b1739] tracking-tight">Daftar Mahasiswa Magang</h5>
                        <button class="kai-bg-navy hover:kai-bg-orange text-white px-4 py-2 rounded-xl text-xs font-bold transition-all shadow-md">
                            Lihat Semua
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="kai-bg-navy text-slate-300 text-[11px] font-bold uppercase tracking-wider border-b border-slate-800/50">
                                    <th class="px-6 py-4 border-r border-slate-800/30">Nama</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Universitas</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Jurusan</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Posisi</th>
                                    <th class="px-6 py-4 text-center border-r border-slate-800/30">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-600 divide-y divide-slate-100 bg-white">
                                @if(isset($pengajuan_baru) && count($pengajuan_baru) > 0)
                                    @foreach($pengajuan_baru as $item)
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">{{ $item->nama }}</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">{{ $item->universitas }}</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">{{ $item->jurusan }}</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">
                                            {{ is_object($item->unit_tujuan) ? ($item->unit_tujuan->nama ?? 'Sistem Informasi') : ($item->unit_tujuan ?? 'Sistem Informasi') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-3 py-1 bg-amber-50 text-amber-600 border border-amber-200 rounded-lg uppercase tracking-wider shadow-sm">
                                                <i class="fa-solid fa-spinner animate-spin text-[9px]"></i> Menunggu Review
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            <a href="{{ url('/unit/review-pengajuan') }}" class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-4 py-1.5 bg-blue-50 text-blue-700 border border-blue-200 rounded-xl hover:kai-bg-navy hover:text-white hover:border-transparent transition-all shadow-sm">
                                                <i class="fa-solid fa-clipboard-check"></i> Review
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    {{-- LAYOUT EMPTY STATE DISAMAKAN DENGAN image_240364.png --}}
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                            <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center mx-auto mb-3 text-slate-300 shadow-inner">
                                                <i class="fa-solid fa-inbox text-xl"></i>
                                            </div>
                                            <p class="font-bold text-sm text-slate-500">Belum ada mahasiswa yang diteruskan dari SDM.</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ROW PANEL BAWAH (STATUS & LOG HISTORI AKTIVITAS) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Status Unit -->
                    <div class="bg-white rounded-2xl p-6 shadow-xl shadow-blue-950/10 border border-blue-100/50 flex flex-col justify-between min-h-[220px]">
                        <div class="border-l-4 border-l-[#f47920] pl-3">
                            <h5 class="text-sm font-extrabold text-[#0b1739] tracking-tight uppercase">Status Unit Anda</h5>
                        </div>
                        <div class="flex items-center gap-8 py-2">
                            <div class="relative flex items-center justify-center shrink-0">
                                <div class="w-24 h-24 rounded-full border-[10px] border-blue-600 border-l-emerald-500 border-t-emerald-500 flex items-center justify-center bg-slate-50/50 shadow-md">
                                    <i class="fa-solid fa-chart-pie text-slate-400 text-lg"></i>
                                </div>
                            </div>
                            <div class="space-y-2 text-xs font-bold text-slate-600">
                                <div class="flex items-center"><span class="w-3 h-3 rounded-md bg-blue-600 mr-2.5 shadow-sm"></span> Menunggu Review ({{ $jumlah_masuk ?? 0 }})</div>
                                <div class="flex items-center"><span class="w-3 h-3 rounded-md bg-emerald-500 mr-2.5 shadow-sm"></span> Sudah Diproses ({{ ($countDiterima ?? 0) + ($countDitolak ?? 0) }})</div>
                            </div>
                        </div>
                    </div>

                    <!-- Aktivitas Terbaru -->
                    <div class="bg-white rounded-2xl p-6 shadow-xl shadow-blue-950/10 border border-blue-100/50 flex flex-col justify-between min-h-[220px]">
                        <div>
                            <div class="border-l-4 border-l-[#00529b] pl-3 mb-4">
                                <h5 class="text-sm font-extrabold text-[#0b1739] tracking-tight uppercase">Aktivitas Terbaru</h5>
                            </div>
                            <div class="space-y-3">
                                @if(isset($jumlah_masuk) && $jumlah_masuk > 0)
                                    <div class="flex gap-3.5 p-4 bg-gradient-to-r from-rose-50/50 to-white rounded-xl border border-rose-100 shadow-sm border-l-4 border-l-rose-500">
                                        <i class="fa-solid fa-circle-exclamation text-rose-500 text-base mt-0.5"></i>
                                        <div>
                                            <p class="text-xs font-black text-rose-800 uppercase tracking-wide">Tindakan Diperlukan</p>
                                            <p class="text-[11px] text-rose-600 font-semibold mt-1">Terdapat {{ $jumlah_masuk }} pengajuan baru yang memerlukan tindakan penempatan segera!</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex gap-3.5 p-4 bg-gradient-to-r from-emerald-50/50 to-white rounded-xl border border-emerald-100 shadow-sm border-l-4 border-l-emerald-500">
                                        <i class="fa-solid fa-circle-check text-emerald-500 text-base mt-0.5"></i>
                                        <div>
                                            <p class="text-xs font-black text-emerald-800 uppercase tracking-wide">Sistem Bersih</p>
                                            <p class="text-[11px] text-emerald-600 font-semibold mt-1">Semua tugas penempatan berkas mahasiswa telah diselesaikan.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- END OF MAIN LAYOUT --}}
        </div>
    </main>
</body>
</html>