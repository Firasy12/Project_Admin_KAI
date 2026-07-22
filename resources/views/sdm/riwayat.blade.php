<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Review - KAI Intern Management</title>
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
    
    /* ==================================================================
       KAI Brand Core Colors - KITA GANTI JADI BIRU TERANG (image_18b0a6.png)
       ================================================================== */
    .kai-bg-navy { background-color: #00529b; }   /* Mengubah background sidebar jadi biru terang */
    .kai-bg-orange { background-color: #f47920; }
    .kai-text-navy { color: #00529b; }             /* Mengubah teks navy jadi warna biru terang */
    .kai-text-orange { color: #f47920; }
</style>
</head>
<body class="flex h-screen overflow-hidden text-slate-800 bg-[#f4f6f9]">

    {{-- SIDEBAR UTAMA (KAI DEEP NAVY BLUE) --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-slate-900/50">
        {{-- LOGO AREA - TETAP KOKOH DAN PADAT --}}
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-slate-800/60">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-11 mb-2 object-contain drop-shadow-md">
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
            <i class="fa-solid fa-house w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Dashboard</span>
        </a>
    </li>

    {{-- Pengajuan Masuk --}}
    <li>
        <a href="{{ url('/sdm/pengajuan-masuk') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/pengajuan-masuk') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-file-import w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/pengajuan-masuk') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Pengajuan Masuk</span>
        </a>
    </li>

    {{-- Review Pengajuan --}}
    <li>
        <a href="{{ url('/sdm/review-pengajuan') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/review-pengajuan') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-user-shield w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/review-pengajuan') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Review Pengajuan</span>
        </a>
    </li>

    {{-- Monitoring Status --}}
    <li>
        <a href="{{ url('/sdm/monitoring') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Monitoring Status</span>
        </a>
    </li>

    {{-- Notifikasi --}}
    <li>
        <a href="{{ url('/sdm/notifikasi') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Notifikasi</span>
        </a>
    </li>

    {{-- Dokumen --}}
    <li>
        <a href="{{ url('/sdm/dokumen') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Dokumen</span>
        </a>
    </li>

    {{-- Profil --}}
    <li>
        <a href="{{ url('/sdm/profil') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Profil</span>
        </a>
    </li>
</ul>

            <div class="px-6 my-4 border-t border-slate-800/50"></div>

            <ul class="px-3">
                <li>
                    <a href="{{ url('/logout') }}" class="flex items-center px-4 py-3 text-rose-400 hover:text-rose-300 hover:bg-rose-950/20 rounded-xl font-semibold transition-all">
                        <i class="fa-solid fa-power-off w-5 text-center text-lg mr-3"></i>
                        <span class="text-sm">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- MAIN CONTENT INTERFACE WRAPPER --}}
    <main class="flex-1 flex flex-col overflow-hidden relative">
        
        {{-- HEADER TOP BAR DENGAN AKSEN VERTikal ORANYE KAI --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Riwayat Review</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Daftar keputusan pengajuan mahasiswa pendaftar magang yang telah selesai dievaluasi</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl p-2 pr-5 shadow-inner">
                    <div class="w-9 h-9 rounded-xl kai-bg-navy text-white flex items-center justify-center font-black text-sm tracking-wide mr-3 shadow-md shadow-blue-950/20">
                        AS
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-slate-400 font-bold leading-none mt-0.5">Unit Divisi Humas & SDM</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- AREA WORKSPACE DENGAN AMBIENT GLOW MESH BG --}}
        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0"></div>
            <div class="relative z-10 space-y-6">

                {{-- CARD DATATABLE DENGAN FILTER SEARCH SEJAJAR --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden transition-shadow hover:shadow-lg">
                    
                    {{-- DEKORASI HEADER SEARCH AREA --}}
                    <div class="p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <div>
                            <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-clock-rotate-left text-slate-400"></i> Riwayat Keputusan
                            </h4>
                            <p class="text-xs font-semibold text-slate-400 mt-0.5">Pantau keputusan final dan rekam berkas arsip data</p>
                        </div>
                        
                        {{-- SEARCH BAR --}}
                        <form action="" method="GET" class="relative w-full sm:w-80 group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-slate-400 text-sm group-focus-within:kai-text-orange transition-colors"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/NIM/universitas..." class="w-full pl-10 pr-4 py-2 text-xs font-semibold bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] placeholder-slate-400 shadow-inner transition-all">
                        </form>
                    </div>

                    {{-- RE-STYLED CORPORATE DEEP NAVY TABLE --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="kai-bg-navy text-slate-300 text-[11px] font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4 w-16 border-r border-slate-800/30">No</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Data Pendaftar</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Tanggal Review</th>
                                    <th class="px-6 py-4 text-center border-r border-slate-800/30">Keputusan</th>
                                    <th class="px-6 py-4 text-center rounded-tr-sm">Detail</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-600 divide-y divide-slate-100 bg-white">
                                @if(isset($riwayat) && count($riwayat) > 0)
                                    @foreach($riwayat as $index => $item)
                                    <tr class="hover:bg-orange-50/20 even:bg-slate-50/40 transition-all duration-150 border-l-4 border-transparent hover:border-l-[#f47920]">
                                        <td class="px-6 py-4 font-bold text-slate-400">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4">
                                            <div class="font-extrabold text-slate-800 text-[14px]">{{ $item->nama }}</div>
                                            <div class="text-xs text-slate-400 font-bold mt-1 flex items-center gap-1.5">
                                                <div class="w-4 h-4 rounded-md bg-slate-100 flex items-center justify-center text-[9px] text-slate-400"><i class="fa-solid fa-university"></i></div>
                                                {{ $item->universitas }} - {{ $item->jurusan }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-xs font-bold text-slate-500 whitespace-nowrap">
                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-calendar text-slate-300 text-sm"></i>{{ $item->updated_at ? $item->updated_at->translatedFormat('d M Y - H:i') : '-' }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $keputusanLower = strtolower($item->status_raw ?? '');
                                                $badgeClasses = $keputusanLower === 'ditolak'
                                                    ? 'bg-rose-50 text-rose-600 border-rose-200/60'
                                                    : 'bg-emerald-50 text-emerald-600 border-emerald-200/60';
                                                $icon = $keputusanLower === 'ditolak' ? 'fa-solid fa-circle-xmark' : 'fa-solid fa-circle-check';
                                            @endphp
                                            <span class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-3 py-1 rounded-lg border {{ $badgeClasses }} uppercase tracking-wider shadow-sm">
                                                <i class="{{ $icon }}"></i> {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            <a href="{{ url('/sdm/pengajuan/'.$item->id) }}" class="text-xs font-bold text-blue-600 hover:kai-text-orange hover:underline inline-flex items-center gap-1">
                                                Lihat Berkas <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center text-slate-400 bg-white">
                                            <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                                                <i class="fa-solid fa-clock-rotate-left text-3xl text-slate-300"></i>
                                            </div>
                                            <p class="text-sm font-extrabold text-slate-500">Belum Ada Riwayat</p>
                                            <p class="text-xs font-semibold text-slate-400 mt-1">Belum ada pengajuan yang sudah diputuskan.</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div> {{-- END OF CONTAINER WRAPPER --}}
        </div>
    </main>
</body>
</html>