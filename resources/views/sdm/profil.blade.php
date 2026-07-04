<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun - E-Magang KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-gray-800 bg-[#f4f6f9]">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col hidden md:flex shrink-0 z-20">
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-4">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-10 mb-2">
            <p class="text-[10px] text-gray-500 text-center font-medium leading-tight">
                SISTEM INFORMASI MAGANG<br>PT KERETA API INDONESIA
            </p>
        </div>

        <nav class="flex-1 overflow-y-auto py-2 custom-scrollbar">
            <div class="px-6 mb-3">
                <p class="text-[11px] font-bold text-orange-500 uppercase tracking-wider">Admin SDM</p>
            </div>
            
            <ul class="space-y-1">
                <li><a href="{{ url('/sdm/dashboard') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-house w-6 text-center"></i><span class="ml-2 text-sm">Dashboard</span></a></li>
                <li><a href="{{ url('/sdm/pengajuan-masuk') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-file-lines w-6 text-center"></i><span class="ml-2 text-sm">Pengajuan Masuk</span></a></li>
                <li><a href="{{ url('/sdm/riwayat-review') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-clock-rotate-left w-6 text-center"></i><span class="ml-2 text-sm">Riwayat Review</span></a></li>
                <li><a href="{{ url('/sdm/monitoring') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-chart-line w-6 text-center"></i><span class="ml-2 text-sm">Monitoring Status</span></a></li>
                <li><a href="{{ url('/sdm/notifikasi') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-bell w-6 text-center"></i><span class="ml-2 text-sm">Notifikasi</span></a></li>
                <li><a href="{{ url('/sdm/dokumen') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-folder-open w-6 text-center"></i><span class="ml-2 text-sm">Dokumen</span></a></li>
                
                {{-- MENU AKTIF UNTUK PROFIL --}}
                <li>
                    <a href="{{ url('/sdm/profil') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-rose-50/50 border-r-4 border-rose-500">
                        <i class="fa-solid fa-user w-6 text-center text-rose-600"></i>
                        <span class="ml-2 text-sm text-rose-600">Profil</span>
                    </a>
                </li>
                <li class="mt-2 border-t border-gray-100 pt-2">
                    <a href="{{ url('/logout') }}" class="flex items-center px-6 py-2.5 text-red-500 hover:text-red-700 hover:bg-red-50 font-medium transition-colors">
                        <i class="fa-solid fa-right-from-bracket w-6 text-center"></i><span class="ml-2 text-sm">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        
        {{-- Header --}}
        <header class="h-24 flex items-center justify-between px-8 shrink-0">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Profil Akun</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola informasi data diri dan pengaturan keamanan akun Anda.</p>
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative text-gray-400 hover:text-rose-600 transition-colors p-2">
                    <i class="fa-solid fa-bell text-xl"></i>
                </button>
                <div class="flex items-center bg-white border border-gray-100 shadow-sm rounded-full pl-4 pr-1 py-1 cursor-pointer">
                    <div class="flex flex-col text-right mr-3">
                        <span class="text-sm font-bold text-gray-800 leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-gray-500 leading-tight">SDM PT KAI</span>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm">AS</div>
                </div>
            </div>
        </header>

        {{-- Scrollable Content --}}
        <div class="flex-1 overflow-y-auto px-8 pb-8 custom-scrollbar">
            
            <div class="max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- Kolom Kiri: Foto Profil & Info Singkat --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col items-center text-center">
                    <div class="relative mb-4 group cursor-pointer">
                        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-4xl font-bold border-4 border-white shadow-md overflow-hidden">
                            <span>AS</span>
                        </div>
                        <div class="absolute inset-0 bg-black/40 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fa-solid fa-camera text-white text-xl"></i>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900">Ahmad Firasy Rahman</h4>
                    <p class="text-sm text-gray-500">Human Capital - Divisi SDM</p>
                    <span class="mt-3 bg-green-100 text-green-800 text-[10px] font-bold px-3 py-1 rounded-full"><i class="fa-solid fa-circle text-[8px] mr-1"></i> Sedang Aktif</span>
                </div>

                {{-- Kolom Kanan: Form Pengaturan --}}
                <div class="md:col-span-2 space-y-6">
                    
                    {{-- Form Data Diri --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h5 class="text-base font-bold text-gray-800 mb-4 pb-3 border-b border-gray-100">Informasi Pribadi</h5>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">Nama Lengkap</label>
                                    <input type="text" value="Ahmad Firasy Rahman" class="w-full bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 p-2.5 text-gray-800">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">NIPP / NIP</label>
                                    <input type="text" value="1234567890" class="w-full bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 p-2.5 text-gray-800">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">Alamat Email KAI</label>
                                    <input type="email" value="admin.sdm@kai.id" class="w-full bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 p-2.5 text-gray-800">
                                </div>
                            </div>
                            <div class="flex justify-end pt-2">
                                <button type="button" class="bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Form Keamanan --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h5 class="text-base font-bold text-gray-800 mb-4 pb-3 border-b border-gray-100">Keamanan & Kata Sandi</h5>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">Kata Sandi Saat Ini</label>
                                <input type="password" placeholder="••••••••" class="w-full border border-gray-200 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 p-2.5">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">Kata Sandi Baru</label>
                                    <input type="password" placeholder="Masukkan sandi baru" class="w-full border border-gray-200 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 p-2.5">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">Konfirmasi Sandi Baru</label>
                                    <input type="password" placeholder="Ulangi sandi baru" class="w-full border border-gray-200 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 p-2.5">
                                </div>
                            </div>
                            <div class="flex justify-end pt-2">
                                <button type="button" class="bg-rose-600 hover:bg-rose-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors">
                                    Perbarui Sandi
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </main>
</body>
</html>