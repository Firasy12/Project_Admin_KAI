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

        {{-- NAVIGATION MENU ITEMS --}}
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
        
        {{-- HEADER TOP BAR (DISET SESUAI GAMBAR image_24152f.png) --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Riwayat Review</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Daftar keputusan mahasiswa yang telah selesai direview</p>
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

        {{-- AREA WORKSPACE: GRADASI BIRU MUDA FRESH CORPORATE --}}
        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

            {{-- LAYOUT MAIN CONTAINER --}}
            <div class="relative z-10 space-y-6">

                {{-- DATA TABLE CARD COMPONENT --}}
                <div class="bg-white rounded-2xl shadow-xl shadow-blue-950/10 overflow-hidden border border-blue-100/50">
                    
                    {{-- HEADER BOX & FIELD SEARCH INPUT --}}
                    <div class="p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                            <i class="fa-solid fa-clock-rotate-left text-slate-400"></i> Riwayat Keputusan
                        </h4>
                        <form method="GET" action="{{ url()->current() }}" class="relative w-full sm:w-80 group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-slate-400 text-sm"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/NIM/universitas..." class="w-full pl-10 pr-4 py-2 text-xs font-semibold bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] shadow-inner transition-all">
                        </form>
                    </div>

                    {{-- TABLE CONTENT --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="kai-bg-navy text-slate-300 text-[11px] font-bold uppercase tracking-wider border-b border-slate-800/50">
                                    <th class="px-6 py-4 border-r border-slate-800/30">Nama</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Universitas</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Jurusan</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Posisi</th>
                                    <th class="px-6 py-4 text-center">Status Akhir</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-600 divide-y divide-slate-100 bg-white">
                                @if(isset($pengajuan) && count($pengajuan) > 0)
                                    @foreach($pengajuan as $item)
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">{{ $item->nama }}</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">{{ $item->universitas }}</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">{{ $item->jurusan }}</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">
                                            {{ is_object($item->unit_tujuan) ? ($item->unit_tujuan->nama ?? 'Unit Sistem Informasi') : ($item->unit_tujuan ?? 'Unit Sistem Informasi') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($item->status_raw === 'diterima' || $item->status === 'Disetujui Unit')
                                                <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm uppercase tracking-wide">
                                                    <i class="fa-solid fa-circle-check text-[10px]"></i> Disetujui Unit
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-rose-50 text-rose-600 border border-rose-200 rounded-lg shadow-sm uppercase tracking-wide">
                                                    <i class="fa-solid fa-circle-xmark text-[10px]"></i> Ditolak Unit
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    {{-- MOCKUP KARTU SINKRONISASI COCOK DENGAN image_24152f.png JIKA DATABASE LAGI KOSONG --}}
                                    <!-- Row 1 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Arjuna Bimantara</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Universitas Peabumulih</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Informatika</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-check"></i> Disetujui Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Nizam Kori</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Universitas Prabumulih</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Informatika</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-check"></i> Disetujui Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 3 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Nizam Kory</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Unpra</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Informatika</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-rose-50 text-rose-600 border border-rose-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-xmark"></i> Ditolak Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 4 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">cecep</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Universitas Sriwijaya</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Sistem Komputer</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-rose-50 text-rose-600 border border-rose-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-xmark"></i> Ditolak Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 5 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Nizam Kory</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Unpra</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Informatika</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-check"></i> Disetujui Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 6 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Ahmad Firasy Rahman</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Universitas Srijaya</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Sistem Komputer</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-check"></i> Disetujui Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 7 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Arjuna Bimantara</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Universitas Prabumulih</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Informatika</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-check"></i> Disetujui Unit
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Row 8 -->
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">Iyann</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">Universitas Peabumulih</td>
                                        <td class="px-6 py-4 font-medium text-slate-600">Informatika</td>
                                        <td class="px-6 py-4 font-bold text-slate-600">Unit Sistem Informasi</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm">
                                                <i class="fa-solid fa-circle-check"></i> Disetujui Unit
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- PAGINATION LINK CONTROLLER --}}
                @if(isset($pengajuan) && method_exists($pengajuan, 'links') && $pengajuan->hasPages())
                    <div class="mt-4">
                        {{ $pengajuan->links() }}
                    </div>
                @endif

            </div> {{-- END OF MAIN CONTAINER --}}
        </div>
    </main>
</body>
</html>