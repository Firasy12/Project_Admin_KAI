<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Unit - E-Magang KAI</title>
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

    {{-- MAIN CONTENT DASHBOARD --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-24 flex items-center justify-between px-8 shrink-0">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, Unit Sistem Informasi</h2>
                <p class="text-sm text-gray-500 mt-1">kelola pengajuan magang dengan mudah</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="relative text-gray-400 hover:text-gray-600 transition-colors p-2">
                    <i class="fa-solid fa-bell text-xl"></i>
                    @if(isset($jumlah_masuk) && $jumlah_masuk > 0)
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </button>
                <div class="flex items-center bg-white border border-gray-100 shadow-sm rounded-full pl-4 pr-1 py-1 cursor-pointer">
                    <div class="flex flex-col text-right mr-3">
                        <span class="text-sm font-bold text-gray-800 leading-tight">Admin Unit</span>
                        <span class="text-[10px] text-gray-500 leading-tight">Sistem Informasi</span>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm border border-blue-200">AU</div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto px-8 pb-8 custom-scrollbar">
            
            {{-- KOTAK STATISTIK --}}
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-blue-500 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-blue-600 uppercase tracking-wide mb-2">Tugas Masuk</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $jumlah_masuk ?? 0 }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-yellow-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-yellow-500 uppercase tracking-wide mb-2">Perlu Review</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $jumlah_masuk ?? 0 }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-green-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-green-500 uppercase tracking-wide mb-2">Diterima</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $countDiterima ?? 0 }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-red-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-red-500 uppercase tracking-wide mb-2">Ditolak</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $countDitolak ?? 0 }}</span>
                </div>
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-teal-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-teal-500 uppercase tracking-wide mb-2">Selesai</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $countSelesai ?? 0 }}</span>
                </div>
            </div>

            {{-- INI DIA TABEL YANG KEMARIN SAYA HILANGKAN (SUDAH DIKEMBALIKAN) --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h5 class="text-lg font-bold text-gray-800">Daftar Mahasiswa Magang</h5>
                    <button class="bg-[#1a3668] hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                        Lihat Semua
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a3668] text-white text-xs font-semibold">
                                <th class="px-6 py-3 font-semibold rounded-tl-lg">Nama</th>
                                <th class="px-6 py-3 font-semibold">Universitas</th>
                                <th class="px-6 py-3 font-semibold">Jurusan</th>
                                <th class="px-6 py-3 font-semibold">Posisi</th>
                                <th class="px-6 py-3 font-semibold text-center">Status</th>
                                <th class="px-6 py-3 font-semibold text-center rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @if(isset($pengajuan_baru) && count($pengajuan_baru) > 0)
                                @foreach($pengajuan_baru as $item)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-bold text-gray-900">{{ $item->nama }}</td>
                                    <td class="px-6 py-4">{{ $item->universitas }}</td>
                                    <td class="px-6 py-4">{{ $item->jurusan }}</td>
                                    <td class="px-6 py-4">{{ $item->unit_tujuan ?? 'Sistem Informasi' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="bg-yellow-100 text-yellow-800 text-[11px] font-bold px-3 py-1 rounded-sm">Menunggu Review</span>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{-- Keputusan (Lulus/Tolak) diambil di halaman Review Pengajuan. --}}
                                        <a href="{{ route('unit.review') }}" class="border border-[#1a3668] text-[#1a3668] hover:bg-blue-50 px-4 py-1.5 rounded text-xs font-bold transition-colors">
                                            <i class="fa-solid fa-clipboard-check mr-1"></i> Review
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                        <i class="fa-solid fa-inbox text-3xl mb-2 text-gray-300"></i>
                                        <p>Belum ada mahasiswa yang diteruskan dari SDM.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- WIDGET BAWAH --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h5 class="text-lg font-bold text-gray-800 mb-4">Status Unit Anda</h5>
                    <div class="flex items-center gap-6">
                        <div class="w-24 h-24 rounded-full border-[12px] border-blue-600 border-l-green-500 border-t-green-500"></div>
                        <div class="space-y-2">
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="w-3 h-3 rounded-full bg-blue-600 mr-2"></span> Menunggu Review ({{ $jumlah_masuk ?? 0 }})
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span> Sudah Diproses ({{ ($countDiterima ?? 0) + ($countDitolak ?? 0) }})
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h5 class="text-lg font-bold text-gray-800 mb-4">Aktivitas Terbaru</h5>
                    <div class="space-y-4">
                        @if(isset($jumlah_masuk) && $jumlah_masuk > 0)
                            <div class="flex gap-3 bg-red-50 p-3 rounded-lg border border-red-100">
                                <i class="fa-solid fa-bell text-red-500 mt-1"></i>
                                <div>
                                    <p class="text-sm font-bold text-red-700">Peringatan</p>
                                    <p class="text-xs text-red-600 mt-0.5">Terdapat {{ $jumlah_masuk }} pengajuan yang memerlukan tindakan segera!</p>
                                </div>
                            </div>
                        @else
                            <div class="flex gap-3">
                                <i class="fa-solid fa-check-circle text-green-500 mt-1"></i>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Semua tugas telah diselesaikan</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>