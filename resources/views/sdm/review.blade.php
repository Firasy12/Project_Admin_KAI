<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Pengajuan - E-Magang KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f4f6f9; 
        }
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
        .kai-bg-navy { background-color: #00529b; }   
        .kai-bg-orange { background-color: #f47920; }
        .kai-text-navy { color: #00529b; }             
        .kai-text-orange { color: #f47920; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-800 bg-[#f4f6f9]">

    {{-- SIDEBAR UTAMA ADMIN SDM (KAI ROYAL BLUE PREMIUM) --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-white/10">
        {{-- LOGO AREA --}}
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-white/10">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-11 mb-2 object-contain drop-shadow-md">
            <p class="text-[11px] text-center font-extrabold tracking-wide uppercase mt-1.5">
                <span class="kai-text-orange">PT KERETA API INDONESIA</span>
            </p>
        </div>

        {{-- NAVIGATION MENU ITEMS (KAPSUL LONJONG FIXED - SINKRON 100%) --}}
        <nav class="flex-1 overflow-y-auto py-4 custom-scrollbar">
            <div class="px-6 mb-2">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest opacity-70">Admin SDM</p>
            </div>
            
            <ul class="space-y-2 px-3">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/sdm/dashboard') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dashboard') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-house w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                {{-- Pengajuan Masuk --}}
                <li>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/pengajuan-masuk') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-file-import w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/pengajuan-masuk') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Pengajuan Masuk</span>
                    </a>
                </li>
                {{-- Review Pengajuan (Active State) --}}
                <li>
                    <a href="{{ url('/sdm/review-pengajuan') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/review-pengajuan') || Request::is('sdm/review*') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-user-shield w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/review-pengajuan') || Request::is('sdm/review*') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Review Pengajuan</span>
                    </a>
                </li>
                {{-- Monitoring Status --}}
                <li>
                    <a href="{{ url('/sdm/monitoring') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Monitoring Status</span>
                    </a>
                </li>
                {{-- Notifikasi --}}
                <li>
                    <a href="{{ url('/sdm/notifikasi') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Notifikasi</span>
                    </a>
                </li>
                {{-- Dokumen --}}
                <li>
                    <a href="{{ url('/sdm/dokumen') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dokumen</span>
                    </a>
                </li>
                {{-- Profil --}}
                <li>
                    <a href="{{ url('/sdm/profil') }}" class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Profil</span>
                    </a>
                </li>
            </ul>

            {{-- GARIS PEMBATAS DEKORATIF --}}
            <div class="px-6 my-4 border-t border-white/10"></div>

            {{-- TOMBOL LOGOUT KAPSUL LONJONG --}}
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

    {{-- MAIN CONTENT WRAPPER --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        
        {{-- HEADER TOP BAR DENGAN AKSEN ORANYE KAI --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Review Pengajuan</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Evaluasi dan berikan keputusan validasi berkas untuk calon peserta magang.</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl p-2 pr-5 shadow-inner">
                    <div class="w-9 h-9 rounded-xl bg-purple-600 text-white flex items-center justify-center font-black text-sm mr-3 shadow-md">
                        SDM
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-slate-400 font-bold leading-none mt-0.5">Human Capital Center</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- WORKSPACE AREA: GRADASI BIRU SEGAR KAI CORPORATE --}}
        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

            <div class="relative z-10 space-y-6">

                {{-- DATA CARD TABLE CONTAINMENT --}}
                <div class="bg-white rounded-2xl shadow-xl shadow-blue-950/10 overflow-hidden border border-blue-100/50">
                    
                    {{-- SEARCH BAR HEADER --}}
                    <div class="p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                            <i class="fa-solid fa-list-check text-slate-400"></i> Antrean Review Berkas
                        </h4>
                        <form method="GET" action="{{ url()->current() }}" class="relative w-full sm:w-80 group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-slate-400 text-sm"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/NIM/universitas..." class="w-full pl-10 pr-4 py-2 text-xs font-semibold bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] shadow-inner transition-all">
                        </form>
                    </div>

                    {{-- PREMIUM RESPONSIVE TABLE STRUCTURE --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="kai-bg-navy text-slate-300 text-[11px] font-bold uppercase tracking-wider border-b border-slate-800/50">
                                    <th class="px-6 py-4 w-16 text-center border-r border-slate-800/30">No</th>
                                    <th class="px-6 py-4 border-r border-slate-800/30">Data Pendaftar</th>
                                    <th class="px-6 py-4 text-center border-r border-slate-800/30">Status Berkas</th>
                                    <th class="px-6 py-4 text-center border-r border-slate-800/30">Status Saat Ini</th>
                                    <th class="px-6 py-4 text-center">Aksi Review</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-600 divide-y divide-slate-100 bg-white">
                                @forelse($pengajuan ?? [] as $index => $item)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="px-6 py-4 font-bold text-slate-400 text-center">
                                        {{ isset($loop) ? $loop->iteration : $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-extrabold text-slate-800 text-[14px]">{{ $item->nama }}</div>
                                        <div class="text-[11px] text-slate-400 font-bold mt-0.5">
                                            {{ $item->universitas }} | {{ $item->jurusan ?? 'Peserta' }}
                                        </div>
                                    </td>
                                    
                                    {{-- BERKAS STATUS BADGE --}}
                                    <td class="px-6 py-4 text-center">
                                        @if(isset($item->is_berkas_lengkap) && $item->is_berkas_lengkap == false)
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-rose-50 text-rose-600 border border-rose-200 rounded-lg shadow-sm uppercase tracking-wide">
                                                <i class="fa-solid fa-circle-xmark text-[10px]"></i> Tidak Lengkap
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-[11px] font-extrabold px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-lg shadow-sm uppercase tracking-wide">
                                                <i class="fa-solid fa-circle-check text-[10px]"></i> Lengkap
                                            </span>
                                        @endif
                                    </td>
                                    
                                    {{-- FLOW STATE STATUS --}}
                                    <td class="px-6 py-4 text-center">
                                        @if(($item->status_raw ?? '') === 'perlu_perbaikan')
                                            <span class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-3 py-1 bg-orange-50 text-orange-700 border border-orange-200 rounded-lg uppercase tracking-wider shadow-sm">
                                                <i class="fa-solid fa-rotate-left text-[9px]"></i> Perlu Revisi
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-3 py-1 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg uppercase tracking-wider shadow-sm">
                                                <i class="fa-solid fa-spinner animate-spin text-[9px]"></i> Menunggu Review
                                            </span>
                                        @endif
                                    </td>
                                    
                                    {{-- ACTION DISPOSISI / REVISI / TOLAK --}}
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <form action="{{ url('/sdm/pengajuan/'.$item->id.'/review') }}" method="POST" class="inline-flex items-center gap-1.5">
                                            @csrf
                                            
                                            <button type="submit" name="status" value="Teruskan" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-extrabold transition-all shadow-md shadow-blue-600/10 hover:shadow-lg">
                                                <i class="fa-solid fa-share-nodes"></i> Disposisi
                                            </button>
                                            
                                            <button type="submit" name="status" value="Revisi" class="inline-flex items-center gap-1 px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-extrabold transition-all shadow-md shadow-amber-500/10 hover:shadow-lg">
                                                <i class="fa-solid fa-rotate-left"></i> Revisi
                                            </button>

                                            <button type="submit" name="status" value="Ditolak" class="inline-flex items-center gap-1 px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-extrabold transition-all shadow-md shadow-rose-600/10 hover:shadow-lg">
                                                <i class="fa-solid fa-trash-can"></i> Tolak
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center text-slate-400 bg-white">
                                        <div class="w-20 h-20 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                                            <i class="fa-solid fa-inbox text-3xl text-slate-300"></i>
                                        </div>
                                        <p class="text-sm font-extrabold text-slate-500">Antrean Bersih!</p>
                                        <p class="text-xs font-semibold text-slate-400 mt-1">Belum ada pengajuan baru yang memerlukan review berkas.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- PAGINATION --}}
                @if(isset($pengajuan) && method_exists($pengajuan, 'links') && $pengajuan->hasPages())
                    <div class="mt-4">
                        {{ $pengajuan->links() }}
                    </div>
                @endif

            </div>
        </div>
    </main>
</body>
</html>