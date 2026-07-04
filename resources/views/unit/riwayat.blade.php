<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Review - Admin Unit</title>
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

    {{-- SIDEBAR LENGKAP --}}
{{-- SIDEBAR PINTAR (Otomatis Aktif Sesuai Halaman) --}}
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0 z-20">
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-4">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-10 mb-2">
            <p class="text-[10px] text-gray-500 text-center font-medium leading-tight">
                SISTEM INFORMASI MAGANG<br>PT KERETA API INDONESIA
            </p>
        </div>

        <nav class="flex-1 overflow-y-auto py-2 custom-scrollbar">
            <div class="px-6 mb-3">
                <p class="text-[11px] font-bold text-orange-500 uppercase tracking-wider">Admin Unit</p>
            </div>
            
            <ul class="space-y-1">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/unit/dashboard') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/dashboard') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-house w-6 text-center {{ Request::is('unit/dashboard') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/dashboard') ? 'text-blue-700' : '' }}">Dashboard</span>
                    </a>
                </li>
                {{-- Pengajuan Masuk --}}
                <li>
                    <a href="{{ url('/unit/pengajuan-masuk') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/pengajuan-masuk') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-file-lines w-6 text-center {{ Request::is('unit/pengajuan-masuk') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/pengajuan-masuk') ? 'text-blue-700' : '' }}">Pengajuan Masuk</span>
                    </a>
                </li>
                {{-- Review Pengajuan --}}
                <li>
                    <a href="{{ url('/unit/review-pengajuan') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/review-pengajuan') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-users w-6 text-center {{ Request::is('unit/review-pengajuan') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/review-pengajuan') ? 'text-blue-700' : '' }}">Review Pengajuan</span>
                    </a>
                </li>
                {{-- Riwayat Review --}}
                <li>
                    <a href="{{ url('/unit/riwayat-review') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/riwayat-review') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-clock-rotate-left w-6 text-center {{ Request::is('unit/riwayat-review') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/riwayat-review') ? 'text-blue-700' : '' }}">Riwayat Review</span>
                    </a>
                </li>
                {{-- Monitoring Status --}}
                <li>
                    <a href="{{ url('/unit/monitoring') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/monitoring') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-chart-line w-6 text-center {{ Request::is('unit/monitoring') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/monitoring') ? 'text-blue-700' : '' }}">Monitoring Status</span>
                    </a>
                </li>
                {{-- Notifikasi --}}
                <li>
                    <a href="{{ url('/unit/notifikasi') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/notifikasi') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-bell w-6 text-center {{ Request::is('unit/notifikasi') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/notifikasi') ? 'text-blue-700' : '' }}">Notifikasi</span>
                    </a>
                </li>
                {{-- Dokumen --}}
                <li>
                    <a href="{{ url('/unit/dokumen') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/dokumen') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-folder-open w-6 text-center {{ Request::is('unit/dokumen') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/dokumen') ? 'text-blue-700' : '' }}">Dokumen</span>
                    </a>
                </li>
                {{-- Profil --}}
                <li>
                    <a href="{{ url('/unit/profil') }}" class="flex items-center px-6 py-2.5 transition-colors {{ Request::is('unit/profil') ? 'text-gray-900 font-bold bg-blue-50/50 border-l-4 border-blue-600' : 'text-gray-500 hover:text-gray-900 font-medium' }}">
                        <i class="fa-solid fa-user w-6 text-center {{ Request::is('unit/profil') ? 'text-blue-700' : '' }}"></i>
                        <span class="ml-2 text-sm {{ Request::is('unit/profil') ? 'text-blue-700' : '' }}">Profil</span>
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
        <header class="h-24 flex items-center justify-between px-8 shrink-0">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Riwayat Review</h2>
                <p class="text-sm text-gray-500 mt-1">Daftar keputusan mahasiswa yang telah selesai direview</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm border border-blue-200">AU</div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto px-8 pb-8 custom-scrollbar">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex justify-between items-center px-6 pt-6">
                    <h5 class="text-lg font-bold text-gray-800">Riwayat Keputusan</h5>
                    <form method="GET" action="{{ url()->current() }}" class="relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/NIM/universitas..." class="bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 pl-9 p-2">
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a3668] text-white text-xs font-semibold">
                                <th class="px-6 py-4 rounded-tl-lg">Nama</th>
                                <th class="px-6 py-4">Universitas</th>
                                <th class="px-6 py-4">Jurusan</th>
                                <th class="px-6 py-4 text-center">Posisi</th>
                                <th class="px-6 py-4 text-center rounded-tr-lg">Status Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @forelse($pengajuan as $item)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $item->nama }}</td>
                                <td class="px-6 py-4">{{ $item->universitas }}</td>
                                <td class="px-6 py-4">{{ $item->jurusan }}</td>
                                <td class="px-6 py-4 text-center">{{ $item->unit_tujuan ?? 'Sistem Informasi' }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @if($item->status_raw === 'diterima')
                                                <span class="bg-green-100 text-green-800 text-[11px] font-bold px-3 py-1.5 rounded-sm">
                                                    <i class="fa-solid fa-check mr-1"></i> Disetujui Unit
                                                </span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-[11px] font-bold px-3 py-1.5 rounded-sm">
                                                    <i class="fa-solid fa-xmark mr-1"></i> Ditolak Unit
                                                </span>
                                            @endif
                                        </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                    <i class="fa-solid fa-box-open text-3xl mb-2 text-gray-300"></i>
                                    <p>Belum ada riwayat review mahasiswa.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    @if(isset($pengajuan) && $pengajuan instanceof \Illuminate\Pagination\LengthAwarePaginator && $pengajuan->hasPages())
                        <div class="p-4 border-t border-gray-100">
                            {{ $pengajuan->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>
