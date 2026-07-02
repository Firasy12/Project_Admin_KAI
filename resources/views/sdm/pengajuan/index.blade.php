<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Masuk - E-Magang KAI</title>
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
                {{-- MENU AKTIF UNTUK PENGAJUAN MASUK --}}
                <li>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-blue-50/50 border-r-4 border-blue-600">
                        <i class="fa-solid fa-file-lines w-6 text-center text-blue-700"></i>
                        <span class="ml-2 text-sm text-blue-700">Pengajuan Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/review-pengajuan') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-users w-6 text-center"></i>
                        <span class="ml-2 text-sm">Review Pengajuan</span>
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
                <h2 class="text-2xl font-bold text-gray-800">Pengajuan Masuk</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola seluruh data pengajuan mahasiswa.</p>
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
            
            {{-- KOTAK STATISTIK --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-orange-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-orange-500 uppercase tracking-wide mb-2">Menunggu</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ \App\Models\Pengajuan::where('status', 'Menunggu')->count() }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-purple-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-purple-500 uppercase tracking-wide mb-2">Review</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ \App\Models\Pengajuan::where('status', 'Review')->count() }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-green-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-green-500 uppercase tracking-wide mb-2">Diterima</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ \App\Models\Pengajuan::where('status', 'Diterima')->count() }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-red-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-red-500 uppercase tracking-wide mb-2">Ditolak</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ \App\Models\Pengajuan::where('status', 'Ditolak')->count() }}</span>
                </div>
            </div>

            {{-- TABEL PENGAJUAN --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h5 class="text-lg font-bold text-gray-800">Daftar Pengajuan</h5>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a3668] text-white text-xs font-semibold">
                                <th class="px-6 py-3 font-semibold rounded-tl-lg">No</th>
                                <th class="px-6 py-3 font-semibold">Nama</th>
                                <th class="px-6 py-3 font-semibold">Universitas</th>
                                <th class="px-6 py-3 font-semibold">Jurusan</th>
                                <th class="px-6 py-3 font-semibold">Unit Tujuan</th>
                                <th class="px-6 py-3 font-semibold text-center">Status</th>
                                <th class="px-6 py-3 font-semibold text-center rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @if(isset($pengajuan) && count($pengajuan) > 0)
                                @foreach($pengajuan as $item)
                                    <tr class="hover:bg-gray-50/50">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                        <td class="px-6 py-4">{{ $item->universitas }}</td>
                                        <td class="px-6 py-4">{{ $item->jurusan }}</td>
                                        <td class="px-6 py-4">{{ $item->unit_tujuan ?? 'Belum Ditentukan' }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @if($item->status == 'Menunggu')
                                                <span class="bg-orange-100 text-orange-800 text-xs font-bold px-3 py-1 rounded-full">Menunggu</span>
                                            @elseif($item->status == 'Review')
                                                <span class="bg-purple-100 text-purple-800 text-xs font-bold px-3 py-1 rounded-full">Review</span>
                                            @elseif($item->status == 'Diterima')
                                                <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Diterima</span>
                                            @elseif($item->status == 'Ditolak')
                                                <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Ditolak</span>
                                            @else
                                                <span class="bg-gray-100 text-gray-800 text-xs font-bold px-3 py-1 rounded-full">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
    <form action="{{ url('/sdm/pengajuan/'.$item->id.'/update-status') }}" method="POST" class="flex gap-1 justify-center">
        @csrf
        
        {{-- Tombol Menunggu --}}
        <button type="submit" name="status" value="Menunggu" class="bg-orange-400 hover:bg-orange-500 text-white px-2.5 py-1.5 rounded text-[11px] font-bold transition-colors">
            Menunggu
        </button>
        
        {{-- Tombol Review --}}
        <button type="submit" name="status" value="Review" class="bg-purple-500 hover:bg-purple-600 text-white px-2.5 py-1.5 rounded text-[11px] font-bold transition-colors">
            Review
        </button>

        {{-- Tombol Diterima (Teruskan ke Unit) --}}
        <button type="submit" name="status" value="Diterima" class="bg-green-600 hover:bg-green-700 text-white px-2.5 py-1.5 rounded text-[11px] font-bold transition-colors">
            Terima
        </button>

        {{-- Tombol Ditolak --}}
        <button type="submit" name="status" value="Ditolak" class="bg-red-600 hover:bg-red-700 text-white px-2.5 py-1.5 rounded text-[11px] font-bold transition-colors">
            Tolak
        </button>
    </form>
</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-400">Belum ada data pengajuan.</td>
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