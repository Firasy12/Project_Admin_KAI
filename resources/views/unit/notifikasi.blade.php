<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Aktivitas - KAI Intern Management</title>
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
        
        {{-- HEADER TOP BAR (MENYESUAIKAN GAMBAR image_246c03.png) --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Notifikasi Aktivitas</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Pembaruan sistem dan pemberitahuan terkait pengajuan magang</p>
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
            <div class="max-w-4xl mx-auto relative z-10 space-y-6">
                
                {{-- KOTAK PERINGATAN JIKA ADA PENGAJUAN BARU --}}
                @if(isset($jumlah_masuk) && $jumlah_masuk > 0)
                <div class="bg-rose-50 border border-rose-100 rounded-2xl p-4 flex items-start gap-4 shadow-xl shadow-blue-950/5 border-l-4 border-l-rose-500">
                    <div class="w-10 h-10 rounded-xl bg-rose-100/80 flex-shrink-0 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-triangle-exclamation text-rose-600"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-rose-800 text-sm">Tindakan Diperlukan!</h4>
                        <p class="text-xs text-rose-600 font-semibold mt-1 leading-relaxed">Ada <b>{{ $jumlah_masuk }} pengajuan magang baru</b> dari SDM yang menunggu respon Anda. Silakan cek di menu <a href="{{ url('/unit/pengajuan-masuk') }}" class="underline font-black hover:text-rose-800">Pengajuan Masuk</a>.</p>
                    </div>
                </div>
                @endif

                {{-- BOX CONTAINER UTAMA LIST NOTIFIKASI --}}
                <div class="bg-white rounded-2xl shadow-xl shadow-blue-950/10 border border-blue-100/50 overflow-hidden">
                    
                    {{-- HEADER BOX NOTIFIKASI --}}
                    <div class="p-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                            <i class="fa-solid fa-bell text-slate-400"></i> Semua Pemberitahuan Unit
                        </h4>
                    </div>

                    {{-- LIST CONTAINER NOTIFIKASI --}}
                    <div class="p-6 space-y-4 bg-white">
                        @if(isset($notifikasi) && count($notifikasi) > 0)
                            {{-- INTERFACE DINAMIS DARI DATABASE --}}
                            @foreach($notifikasi as $item)
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm transition-all hover:border-slate-300 
                                @if($item->status_raw === 'diterima') border-l-4 border-l-emerald-500
                                @elseif($item->status_raw === 'ditolak') border-l-4 border-l-rose-500
                                @elseif($item->status_raw === 'perlu_perbaikan') border-l-4 border-l-amber-500
                                @else border-l-4 border-l-blue-500 @endif">
                                
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-base shrink-0 shadow-sm
                                    @if($item->status_raw === 'diterima') bg-emerald-50 border border-emerald-100 text-emerald-600
                                    @elseif($item->status_raw === 'ditolak') bg-rose-50 border border-rose-100 text-rose-600
                                    @elseif($item->status_raw === 'perlu_perbaikan') bg-amber-50 border border-amber-100 text-amber-600
                                    @else bg-blue-50 border border-blue-100 text-blue-600 @endif">
                                    @if($item->status_raw === 'diterima') <i class="fa-solid fa-circle-check"></i>
                                    @elseif($item->status_raw === 'ditolak') <i class="fa-solid fa-circle-xmark"></i>
                                    @elseif($item->status_raw === 'perlu_perbaikan') <i class="fa-solid fa-rotate-left"></i>
                                    @else <i class="fa-solid fa-user-plus"></i> @endif
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">
                                        @if($item->status_raw === 'disposisi')
                                            Pengajuan magang baru atas nama <span class="text-blue-700 font-extrabold bg-blue-50 px-1.5 py-0.5 rounded border border-blue-100/50">{{ $item->nama }}</span> ({{ $item->universitas }}) telah diteruskan oleh SDM.
                                        @elseif($item->status_raw === 'perlu_perbaikan')
                                            Pengajuan <span class="text-amber-700 font-extrabold bg-amber-50 px-1.5 py-0.5 rounded border border-amber-100/50">{{ $item->nama }}</span> perlu perbaikan sebelum bisa diproses lebih lanjut.
                                        @elseif($item->status_raw === 'diterima')
                                            Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">{{ $item->nama }}</span>.
                                        @elseif($item->status_raw === 'ditolak')
                                            Anda telah menolak pengajuan magang dari <span class="text-rose-700 font-extrabold bg-rose-50 px-1.5 py-0.5 rounded border border-rose-100/50">{{ $item->nama }}</span>.
                                        @else
                                            Pembaruan status untuk <span class="font-extrabold text-slate-800">{{ $item->nama }}</span>: menjadi {{ $item->status }}.
                                        @endif
                                    </p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> {{ $item->updated_at ? $item->updated_at->diffForHumans() : 'Beberapa saat yang lalu' }}</span>
                                </div>
                            </div>
                            @endforeach
                        @else
                            {{-- FALLBACK/MOCKUP COMPONENT SYNCHRONIZED SEPERTI PADA IMAGE_246C03.PNG --}}
                            
                            <!-- Notif 1: Nizam Kori (Diterima) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Nizam Kori</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 3 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 2: Arjuna Bimantara (Diterima) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Arjuna Bimantara</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 3 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 3: cecep (Ditolak) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-rose-500 hover:border-rose-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-xmark"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menolak pengajuan magang dari <span class="text-rose-700 font-extrabold bg-rose-50 px-1.5 py-0.5 rounded border border-rose-100/50">cecep</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 3 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 4: Nizam Kory (Ditolak) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-rose-500 hover:border-rose-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-xmark"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menolak pengajuan magang dari <span class="text-rose-700 font-extrabold bg-rose-50 px-1.5 py-0.5 rounded border border-rose-100/50">Nizam Kory</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 3 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 5: Nizam Kory (Diterima) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Nizam Kory</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 4 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 6: Ahmad Firasy Rahman (Diterima) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Ahmad Firasy Rahman</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 4 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 7: Iyann (Diterima) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Iyann</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 4 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 8: Arjuna Bimantara (Diterima) -->
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm"><i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-slate-700 leading-relaxed">Anda telah menyetujui pengajuan magang untuk <span class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Arjuna Bimantara</span>.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i class="fa-solid fa-clock text-slate-300"></i> 4 days ago</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- PAGINATION LAYER DETECTOR --}}
                @if(isset($notifikasi) && method_exists($notifikasi, 'links') && $notifikasi->hasPages())
                    <div class="mt-4">
                        {{ $notifikasi->links() }}
                    </div>
                @endif

            </div> {{-- END OF MAIN CONTAINER --}}
        </div>
    </main>
</body>
</html>