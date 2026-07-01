<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Review - E-Magang KAI</title>
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
                <li>
                    <a href="{{ url('/sdm/dashboard') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-house w-6 text-center"></i>
                        <span class="ml-2 text-sm">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-file-lines w-6 text-center"></i>
                        <span class="ml-2 text-sm">Pengajuan Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/review-pengajuan') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-users w-6 text-center"></i>
                        <span class="ml-2 text-sm">Review Pengajuan</span>
                    </a>
                </li>
                {{-- MENU AKTIF UNTUK RIWAYAT REVIEW --}}
                <li>
                    <a href="{{ url('/sdm/riwayat-review') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-teal-50/50 border-r-4 border-teal-600">
                        <i class="fa-solid fa-clock-rotate-left w-6 text-center text-teal-700"></i>
                        <span class="ml-2 text-sm text-teal-700">Riwayat Review</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/monitoring') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-chart-line w-6 text-center"></i>
                        <span class="ml-2 text-sm">Monitoring Status</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/notifikasi') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-bell w-6 text-center"></i>
                        <span class="ml-2 text-sm">Notifikasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/dokumen') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-folder-open w-6 text-center"></i>
                        <span class="ml-2 text-sm">Dokumen</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/profil') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-user w-6 text-center"></i>
                        <span class="ml-2 text-sm">Profil</span>
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
                <h2 class="text-2xl font-bold text-gray-800">Riwayat Review</h2>
                <p class="text-sm text-gray-500 mt-1">Daftar keputusan pengajuan magang yang telah selesai dievaluasi.</p>
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative text-gray-400 hover:text-gray-600 transition-colors p-2">
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
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-6">
                <div class="flex justify-between items-center mb-6">
                    <h5 class="text-lg font-bold text-gray-800">Riwayat Keputusan</h5>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium px-4 py-2 rounded transition-colors">
                        <i class="fa-solid fa-filter mr-1"></i> Filter
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-teal-50 text-teal-900 text-xs font-semibold border-b border-teal-100">
                                <th class="px-6 py-3 rounded-tl-lg">No</th>
                                <th class="px-6 py-3">Data Pendaftar</th>
                                <th class="px-6 py-3">Tanggal Review</th>
                                <th class="px-6 py-3 text-center">Keputusan</th>
                                <th class="px-6 py-3 text-center rounded-tr-lg">Detail</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @if(isset($riwayat) && count($riwayat) > 0)
                                @foreach($riwayat as $item)
                                    <tr class="hover:bg-gray-50/50">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">
                                            <p class="font-bold text-gray-900">{{ $item->nama }}</p>
                                            <p class="text-xs text-gray-500">{{ $item->universitas }} - {{ $item->jurusan }}</p>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500 text-xs">
                                            {{ $item->updated_at->format('d M Y - H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
    @if($item->status == 'Diterima')
        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full"><i class="fa-solid fa-check mr-1"></i> Memenuhi Syarat</span>
    @elseif($item->status == 'Ditolak')
        <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full"><i class="fa-solid fa-xmark mr-1"></i> Ditolak</span>
    @else
        <span class="bg-gray-100 text-gray-800 text-xs font-bold px-3 py-1 rounded-full">{{ $item->status }}</span>
    @endif
</td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="#" class="text-teal-600 hover:text-teal-800 font-medium text-xs">
                                                Lihat Berkas
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                        <i class="fa-solid fa-folder-open text-3xl mb-2 text-gray-300"></i>
                                        <p>Belum ada riwayat review pengajuan.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if(isset($riwayat) && method_exists($riwayat, 'links'))
                <div class="mt-4">
                    {{ $riwayat->links() }}
                </div>
                @endif

            </div>
        </div>
    </main>
</body>
</html>