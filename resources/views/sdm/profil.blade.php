<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun - KAI Intern Management</title>
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
        {{-- LOGO AREA --}}
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

    {{-- Monitoring Status (Active State di File Ini) --}}
    <li>
        <a href="{{ url('/sdm/monitoring') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Monitoring Status</span>
        </a>
    </li>

    {{-- Notifikasi --}}
    <li>
        <a href="{{ url('/sdm/notifikasi') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Notifikasi</span>
        </a>
    </li>

    {{-- Dokumen --}}
    <li>
        <a href="{{ url('/sdm/dokumen') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Dokumen</span>
        </a>
    </li>

    {{-- Profil --}}
    <li>
        <a href="{{ url('/sdm/profil') }}" 
           class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
            <i class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
            <span class="text-sm">Profil</span>
        </a>
    </li>
</ul>

            <div class="px-6 my-4 border-t border-slate-800/50"></div>

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
    <main class="flex-1 flex flex-col overflow-hidden relative">
        
        {{-- HEADER TOP BAR DENGAN AKSEN VERTikal ORANYE KAI --}}
        <header class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Profil Akun</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Kelola informasi data diri dan pengaturan keamanan akun Anda.</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl p-2 pr-5 shadow-inner">
                    <div class="w-9 h-9 rounded-xl kai-bg-navy text-white flex items-center justify-center font-black text-sm tracking-wide mr-3 shadow-md shadow-blue-950/20">
                        AS
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-slate-400 font-bold leading-none mt-0.5">SDM PT KAI</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- AREA WORKSPACE DENGAN AMBIENT GLOW MESH BG --}}
        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            
            {{-- BULATAN AURA GRADASI SAMAR DEKORATIF --}}
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

            {{-- PROFIL MAIN CONTAINER LAYOUT SYSTEM --}}
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                
                {{-- KARTU KIRI: AVATAR & RINGKASAN IDENTITAS --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md p-6 flex flex-col items-center text-center relative overflow-hidden transition-shadow hover:shadow-lg">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-slate-50 rounded-full pointer-events-none"></div>
                    
                    {{-- Avatar Initial Wrapper --}}
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-slate-100 to-slate-200 text-[#0b1739] border-4 border-white shadow-xl flex items-center justify-center font-black text-2xl tracking-wide relative z-10 mb-4">
                        AS
                    </div>

                    {{-- User Meta Details --}}
                    <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight">Ahmad Firasy Rahman</h4>
                    <p class="text-xs font-bold text-slate-400 mt-1">Human Capital - Divisi SDM</p>
                    
                    {{-- Status Badge Active --}}
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-extrabold px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 rounded-full mt-4 shadow-sm uppercase tracking-wider">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Sedang Aktif
                    </span>
                </div>

                {{-- FORM KANAN LAYOUT STACK (INFORMASI PRIBADI & KEAMANAN) --}}
                <div class="lg:col-span-2 space-y-6">
                    
                    {{-- KARTU 1: INFORMASI PRIBADI --}}
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden transition-shadow hover:shadow-lg">
                        <div class="p-5 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                            <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                            <h4 class="text-sm font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-user text-slate-400"></i> Informasi Pribadi
                            </h4>
                        </div>
                        
                        <form action="#" method="POST" class="p-6 space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {{-- Nama Lengkap --}}
                                <div class="space-y-1.5">
                                    <label class="text-xs font-extrabold text-slate-500 uppercase tracking-wide">Nama Lengkap</label>
                                    <input type="text" value="Ahmad Firasy Rahman" class="w-full px-4 py-2.5 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] focus:bg-white shadow-inner transition-all">
                                </div>
                                {{-- NIPP / NIP --}}
                                <div class="space-y-1.5">
                                    <label class="text-xs font-extrabold text-slate-500 uppercase tracking-wide">NIPP / NIP</label>
                                    <input type="text" value="1234567890" class="w-full px-4 py-2.5 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] focus:bg-white shadow-inner transition-all">
                                </div>
                            </div>

                            {{-- Alamat Email KAI --}}
                            <div class="space-y-1.5">
                                <label class="text-xs font-extrabold text-slate-500 uppercase tracking-wide">Alamat Email KAI</label>
                                <input type="email" value="admin.sdm@kai.id" class="w-full px-4 py-2.5 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] focus:bg-white shadow-inner transition-all">
                            </div>

                            {{-- Action Submit Button --}}
                            <div class="flex justify-end pt-2">
                                <button type="submit" class="kai-bg-navy hover:kai-bg-orange text-white text-xs font-extrabold px-5 py-2.5 rounded-xl shadow-md shadow-blue-950/20 transition-all flex items-center gap-1.5">
                                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- KARTU 2: KEAMANAN & KATA SANDI --}}
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden transition-shadow hover:shadow-lg">
                        <div class="p-5 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                            <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                            <h4 class="text-sm font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-shield-halved text-slate-400"></i> Keamanan & Kata Sandi
                            </h4>
                        </div>
                        
                        <form action="#" method="POST" class="p-6 space-y-4">
                            {{-- Kata Sandi Saat Ini --}}
                            <div class="space-y-1.5">
                                <label class="text-xs font-extrabold text-slate-500 uppercase tracking-wide">Kata Sandi Saat Ini</label>
                                <input type="password" value="********" class="w-full px-4 py-2.5 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] focus:bg-white shadow-inner transition-all">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {{-- Kata Sandi Baru --}}
                                <div class="space-y-1.5">
                                    <label class="text-xs font-extrabold text-slate-500 uppercase tracking-wide">Kata Sandi Baru</label>
                                    <input type="password" placeholder="Masukkan sandi baru" class="w-full px-4 py-2.5 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] focus:bg-white shadow-inner transition-all">
                                </div>
                                {{-- Konfirmasi Kata Sandi Baru --}}
                                <div class="space-y-1.5">
                                    <label class="text-xs font-extrabold text-slate-500 uppercase tracking-wide">Konfirmasi Sandi Baru</label>
                                    <input type="password" placeholder="Ulangi sandi baru" class="w-full px-4 py-2.5 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] focus:bg-white shadow-inner transition-all">
                                </div>
                            </div>

                            {{-- Action Update Password Button --}}
                            <div class="flex justify-end pt-2">
                                <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white text-xs font-extrabold px-5 py-2.5 rounded-xl shadow-md shadow-rose-900/20 transition-all flex items-center gap-1.5">
                                    <i class="fa-solid fa-key"></i> Perbarui Sandi
                                </button>
                            </div>
                        </form>
                    </div>

                </div> {{-- END OF FORM LAYOUT STACK --}}
            </div> {{-- END OF MAIN GRID --}}
            
        </div>
    </main>
</body>
</html>