<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan Masuk - KAI Intern Management</title>
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
    
    /* KAI Brand Core Colors - ROYAL CORPORATE BLUE */
    .kai-bg-navy { background-color: #00529b; }   
    .kai-bg-orange { background-color: #f47920; }
    .kai-text-navy { color: #00529b; }             
    .kai-text-orange { color: #f47920; }
</style>
</head>
<body class="flex h-screen overflow-hidden text-slate-800">

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
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest opacity-70">MENU UTAMA</p>
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

            <div class="px-6 my-4 border-t border-white/10"></div>

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

    {{-- MAIN CONTENT WORKSPACE --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        
        {{-- HEADER TOP BAR DENGAN TOMBOL KEMBALI PREMIUM --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm z-10">
            <div class="flex items-center gap-4">
                {{-- Tombol Kembali Kotak Premium --}}
                <a href="{{ url('/sdm/pengajuan-masuk') }}" class="w-10 h-10 rounded-xl border border-slate-200 bg-slate-50 flex items-center justify-center text-slate-500 hover:kai-text-orange hover:border-orange-200 transition-all shadow-sm" title="Kembali ke Daftar">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Detail Pengajuan Masuk</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Informasi lengkap biodata pendaftar beserta berkas dokumen persyaratan administrasi</p>
                </div>
            </div>
            
            {{-- USER PROFILE INFO --}}
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

        {{-- AREA SCROLLABLE CONTENT - KITA BERI WARNA BACKGROUND GRADASI BIRU MUDA FRESH --}}
        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            
            {{-- GLOW AMBIENT EFFECTS --}}
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0"></div>
            
            {{-- BOX CONTAINER UTAMA AGAR SEJAJAR DAN TERLIHAT MENYATU DENGAN SELA BIRU MUDA --}}
            <div class="relative z-10 space-y-6">
                
                {{-- ROW KARTU BIODATA & PANEL KEPUTUSAN --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    
                    {{-- KARTU DATA BIODATA (2/3 Kolom) --}}
                    <div class="bg-white rounded-2xl border border-slate-200/50 p-6 shadow-xl shadow-blue-950/10 lg:col-span-2 relative overflow-hidden transition-shadow hover:shadow-2xl">
                        <div class="flex justify-between items-center border-b border-slate-100 pb-4 mb-4">
                            <h3 class="text-sm font-extrabold text-[#0b1739] uppercase tracking-wider flex items-center gap-2">
                                <i class="fa-solid fa-id-card kai-text-orange"></i> Biodata Mahasiswa
                            </h3>
                            <span class="inline-flex text-[11px] font-extrabold px-3 py-1 bg-amber-50 text-amber-600 border border-amber-200 rounded-lg uppercase tracking-wider">
                                {{ $pengajuan->status ?? 'Menunggu' }}
                            </span>
                        </div>

                        {{-- DETAIL GRID LIST DATA --}}
                        <div class="divide-y divide-slate-100 text-sm">
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">Nama</span><span class="col-span-2 font-extrabold text-slate-800 text-[15px]">{{ $pengajuan->nama ?? '-' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">NIM</span><span class="col-span-2 font-bold text-slate-700 tracking-wide">{{ $pengajuan->nim ?? '-' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">Email</span><span class="col-span-2 font-medium text-slate-600">{{ $pengajuan->email ?? '-' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">No. HP</span><span class="col-span-2 font-medium text-slate-600">{{ $pengajuan->no_hp ?? '-' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">Universitas</span><span class="col-span-2 font-bold text-slate-700">{{ $pengajuan->universitas ?? '-' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">Jurusan / Prodi</span><span class="col-span-2 font-medium text-slate-600">{{ $pengajuan->jurusan ?? '-' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">Unit Tujuan</span><span class="col-span-2 font-extrabold text-blue-700 bg-blue-50 px-3 py-1 rounded-xl w-fit text-xs border border-blue-100">{{ $pengajuan->unit_tujuan ?? 'Belum Ditentukan' }}</span></div>
                            <div class="py-3 grid grid-cols-3"><span class="text-slate-400 font-bold">Tanggal Pengajuan</span><span class="col-span-2 font-medium text-slate-500"><i class="fa-solid fa-calendar text-slate-300 mr-1"></i> {{ $pengajuan->tanggal_pengajuan ?? '-' }}</span></div>
                            <div class="py-4 grid grid-cols-3"><span class="text-slate-400 font-bold">Motivasi</span><span class="col-span-2 text-xs font-semibold text-slate-500 bg-slate-50 p-3 rounded-xl border border-slate-200/60 leading-relaxed shadow-inner">{{ $pengajuan->motivasi ?? '-' }}</span></div>
                        </div>
                    </div>

                    {{-- PANEL AKSI SDM KAI IDENTITY (1/3 Kolom) --}}
                    <div class="bg-white rounded-2xl border border-slate-200/50 p-6 shadow-xl shadow-blue-950/10 flex flex-col gap-4 transition-shadow hover:shadow-2xl">
                        <h3 class="text-sm font-extrabold text-[#0b1739] uppercase tracking-wider border-b border-slate-100 pb-3 flex items-center gap-2">
                            <i class="fa-solid fa-gavel kai-text-orange"></i> Aksi Keputusan SDM
                        </h3>

                        <form action="{{ isset($pengajuan) ? url('/sdm/pengajuan/'.$pengajuan->id.'/update-status') : '#' }}" method="POST" class="flex flex-col gap-3">
                            @csrf
                            
                            <!-- Teruskan ke Unit (Emerald Solid) -->
                            <button type="submit" name="status" value="Teruskan" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold py-3.5 px-4 rounded-xl shadow-md shadow-emerald-900/20 transition-all flex items-center justify-center gap-2 text-xs uppercase tracking-wider">
                                <i class="fa-solid fa-paper-plane"></i> Teruskan ke Unit
                            </button>
                            
                            <!-- Minta Revisi (KAI Orange Style) -->
                            <button type="submit" name="status" value="Revisi" class="w-full kai-bg-orange hover:bg-orange-600 text-white font-extrabold py-3.5 px-4 rounded-xl shadow-md shadow-orange-900/20 transition-all flex items-center justify-center gap-2 text-xs uppercase tracking-wider">
                                <i class="fa-solid fa-rotate-left"></i> Minta Revisi Berkas
                            </button>
                            
                            <!-- Tolak (Rose Solid) -->
                            <button type="submit" name="status" value="Ditolak" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-extrabold py-3.5 px-4 rounded-xl shadow-md shadow-rose-900/20 transition-all flex items-center justify-center gap-2 text-xs uppercase tracking-wider">
                                <i class="fa-solid fa-ban"></i> Tolak Pengajuan
                            </button>
                        </form>
                    </div>
                </div>

                {{-- GRID DOKUMEN PERSYARATAN --}}
                <div class="bg-white rounded-2xl border border-slate-200/50 p-6 shadow-xl shadow-blue-950/10 transition-shadow hover:shadow-2xl">
                    <div class="flex justify-between items-center border-b border-slate-100 pb-4 mb-4">
                        <h3 class="text-sm font-extrabold text-[#0b1739] uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-folder-open kai-text-orange"></i> Berkas Dokumen Persyaratan
                        </h3>
                    </div>

                    {{-- LOOPING COMPONENT DOKUMEN BADGES (data asli dari backend, lihat getBerkasDetail()) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse(($berkas ?? []) as $b)
                        <div class="p-4 bg-slate-50/60 rounded-xl border border-slate-200/70 flex justify-between items-center hover:bg-slate-100 hover:border-slate-300 transition-all group">
                            <div class="flex flex-col gap-1 pr-2">
                                <span class="text-xs font-extrabold text-slate-800 tracking-tight leading-tight">{{ $b->nama_berkas }}</span>
                                @if($b->status === 'uploaded' && $b->download_url)
                                    <span class="text-[10px] font-bold text-emerald-600 flex items-center gap-1">
                                        <i class="fa-solid fa-circle-check"></i> Sudah diunggah
                                    </span>
                                @else
                                    <span class="text-[10px] font-bold text-slate-400 flex items-center gap-1">
                                        <i class="fa-solid fa-circle-minus"></i> Belum diunggah
                                    </span>
                                @endif
                            </div>
                            {{-- Tombol Download Aksen Navy: nonaktif kalau belum ada file --}}
                            @if($b->download_url)
                                <a href="{{ $b->download_url }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center hover:kai-bg-navy hover:text-white hover:border-transparent transition-all shadow-sm shrink-0" title="Download File">
                                    <i class="fa-solid fa-cloud-arrow-down text-sm"></i>
                                </a>
                            @else
                                <span class="w-9 h-9 rounded-lg bg-slate-100 text-slate-300 border border-slate-200 flex items-center justify-center shrink-0 cursor-not-allowed" title="Belum ada file">
                                    <i class="fa-solid fa-cloud-arrow-down text-sm"></i>
                                </span>
                            @endif
                        </div>
                        @empty
                        <p class="text-xs font-semibold text-slate-400 italic col-span-full">Belum ada data jenis berkas dari backend.</p>
                        @endforelse
                    </div>
                </div>

            </div> {{-- END OF BOX CONTAINER --}}
        </div>
    </main>
</body>
</html>