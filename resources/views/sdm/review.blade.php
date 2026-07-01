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
                {{-- MENU AKTIF UNTUK REVIEW PENGAJUAN --}}
                <li>
                    <a href="{{ url('/sdm/review-pengajuan') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-purple-50/50 border-r-4 border-purple-600">
                        <i class="fa-solid fa-users w-6 text-center text-purple-700"></i>
                        <span class="ml-2 text-sm text-purple-700">Review Pengajuan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/riwayat-review') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-clock-rotate-left w-6 text-center"></i>
                        <span class="ml-2 text-sm">Riwayat Review</span>
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
                <h2 class="text-2xl font-bold text-gray-800">Review Pengajuan</h2>
                <p class="text-sm text-gray-500 mt-1">Evaluasi dan berikan keputusan untuk calon peserta magang.</p>
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
            
            {{-- TABEL REVIEW --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-6">
                <div class="flex justify-between items-center mb-6">
                    <h5 class="text-lg font-bold text-gray-800">Antrean Review</h5>
                    <div class="relative">
                        <input type="text" placeholder="Cari nama/universitas..." class="bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 pl-10 p-2">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-purple-50 text-purple-900 text-xs font-semibold border-b border-purple-100">
                                <th class="px-6 py-3 rounded-tl-lg">No</th>
                                <th class="px-6 py-3">Data Pendaftar</th>
                                <th class="px-6 py-3">Berkas</th>
                                <th class="px-6 py-3 text-center">Status saat ini</th>
                                <th class="px-6 py-3 text-center rounded-tr-lg">Aksi Review</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @if(isset($pengajuan) && count($pengajuan) > 0)
                                @foreach($pengajuan as $item)
                                    <tr class="hover:bg-gray-50/50">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">
                                            <p class="font-bold text-gray-900">{{ $item->nama }}</p>
                                            <p class="text-xs text-gray-500">{{ $item->universitas }} - {{ $item->jurusan }}</p>
                                        </td>
                                        <td class="px-6 py-4">
    <a href="#" class="text-blue-600 hover:underline text-xs">
        <i class="fa-solid fa-file-pdf mr-1"></i>Proposal Pengajuan
    </a>
</td>
                                        <td class="px-6 py-4 text-center">
                                            @if($item->status == 'Menunggu')
                                                <span class="bg-orange-100 text-orange-800 text-[10px] font-bold px-2 py-1 rounded">Menunggu</span>
                                            @else
                                                <span class="bg-purple-100 text-purple-800 text-[10px] font-bold px-2 py-1 rounded">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white text-xs px-4 py-2 rounded shadow transition-colors inline-block">
                                                <i class="fa-solid fa-magnifying-glass-chart mr-1"></i> Proses Review
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                        <i class="fa-solid fa-inbox text-3xl mb-2 text-gray-300"></i>
                                        <p>Belum ada pengajuan yang perlu di-review.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if(isset($pengajuan) && method_exists($pengajuan, 'links'))
                <div class="mt-4">
                    {{ $pengajuan->links() }}
                </div>
                @endif

            </div>
        </div>
    </main>
</body>
</html>