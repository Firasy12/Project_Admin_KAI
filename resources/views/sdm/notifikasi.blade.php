<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - E-Magang KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        
        .fade-in { animation: fadeIn 0.4s ease-out forwards; }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(-5px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
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
                
                {{-- MENU AKTIF UNTUK NOTIFIKASI --}}
                <li>
                    <a href="{{ url('/sdm/notifikasi') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-amber-50/50 border-r-4 border-amber-500">
                        <i class="fa-solid fa-bell w-6 text-center text-amber-600"></i>
                        <span class="ml-2 text-sm text-amber-600">Notifikasi</span>
                    </a>
                </li>
                
                <li><a href="{{ url('/sdm/dokumen') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-folder-open w-6 text-center"></i><span class="ml-2 text-sm">Dokumen</span></a></li>
                <li><a href="{{ url('/sdm/profil') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-user w-6 text-center"></i><span class="ml-2 text-sm">Profil</span></a></li>
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
                <h2 class="text-2xl font-bold text-gray-800">Pusat Notifikasi</h2>
                <p class="text-sm text-gray-500 mt-1">Pemberitahuan terbaru seputar aktivitas pengajuan magang.</p>
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative text-gray-400 hover:text-amber-600 transition-colors p-2">
                    <i class="fa-solid fa-bell text-xl"></i>
                    @if(isset($jumlahBaru) && $jumlahBaru > 0)
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
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
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-6 w-full">
                <div class="flex justify-between items-center mb-6">
                    <h5 class="text-lg font-bold text-gray-800">Semua Pemberitahuan</h5>
                </div>

                <div class="space-y-3" id="daftar-notifikasi">
                    
                    {{-- LOOPING DATA ASLI DARI DATABASE --}}
                    @forelse($notifikasi as $item)
                        @php
                            // Logika Tampilan Berdasarkan Status
                            $bgColor = 'bg-white hover:bg-gray-50';
                            $iconBg = 'bg-gray-100 text-gray-600';
                            $icon = 'fa-solid fa-bell';
                            $judul = 'Pembaruan Data';
                            $pesan = 'Data pengajuan atas nama <span class="font-semibold text-gray-800">' . $item->nama . '</span> telah diperbarui.';
                            $garisSamping = '';

                            if ($item->status == 'Menunggu') {
                                $bgColor = 'bg-amber-50/30 hover:bg-amber-50 border-amber-100';
                                $iconBg = 'bg-blue-100 text-blue-600';
                                $icon = 'fa-solid fa-file-arrow-up';
                                $judul = 'Pengajuan Magang Baru';
                                $pesan = 'Mahasiswa <span class="font-semibold text-gray-800">' . $item->nama . '</span> dari ' . $item->universitas . ' telah mengirimkan pengajuan magang.';
                                $garisSamping = '<div class="absolute left-0 top-0 bottom-0 w-1 bg-amber-400"></div>';
                            } elseif ($item->status == 'Diterima' || $item->status == 'Memenuhi Syarat') {
                                $iconBg = 'bg-green-100 text-green-600';
                                $icon = 'fa-solid fa-check-double';
                                $judul = 'Review Selesai (Memenuhi Syarat)';
                                $pesan = 'Evaluasi berkas untuk <span class="font-semibold text-gray-700">' . $item->nama . '</span> telah selesai.';
                            } elseif ($item->status == 'Ditolak') {
                                $iconBg = 'bg-red-100 text-red-600';
                                $icon = 'fa-solid fa-xmark';
                                $judul = 'Pengajuan Ditolak';
                                $pesan = 'Pengajuan magang atas nama <span class="font-semibold text-gray-700">' . $item->nama . '</span> tidak memenuhi syarat.';
                            } elseif ($item->status == 'Review') {
                                $iconBg = 'bg-purple-100 text-purple-600';
                                $icon = 'fa-solid fa-magnifying-glass';
                                $judul = 'Sedang Direview';
                                $pesan = 'Berkas pengajuan <span class="font-semibold text-gray-700">' . $item->nama . '</span> sedang dalam tahap evaluasi.';
                            }

                        @endphp

                        <div class="flex gap-4 p-4 rounded-xl border border-gray-100 {{ $bgColor }} transition cursor-pointer relative overflow-hidden">
                            {!! $garisSamping !!}
                            <div class="w-10 h-10 rounded-full {{ $iconBg }} flex items-center justify-center shrink-0">
                                <i class="{{ $icon }}"></i>
                            </div>
                            <div class="flex-1">
                                <h6 class="text-sm font-bold text-gray-900">{{ $judul }}</h6>
                                <p class="text-xs text-gray-600 mt-1">{!! $pesan !!}</p>
                                <span class="text-[10px] text-gray-400 mt-2 block">
                                    <i class="fa-regular fa-clock mr-1"></i> {{ $item->updated_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                    @empty
                        <div class="text-center py-8 text-gray-400">
                            <i class="fa-solid fa-bell-slash text-3xl mb-2 text-gray-300"></i>
                            <p>Belum ada notifikasi aktivitas terbaru.</p>
                        </div>
                    @endforelse

                </div>

                {{-- Pagination --}}
                @if($notifikasi->hasPages())
                <div class="mt-6">
                    {{ $notifikasi->links() }}
                </div>
                @endif
            </div>

        </div>
    </main>
</body>
</html>