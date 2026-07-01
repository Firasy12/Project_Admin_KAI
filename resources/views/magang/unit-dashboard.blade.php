<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Unit SI - KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="flex h-screen overflow-hidden text-gray-800 bg-[#f4f6f9] font-sans">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col hidden md:flex shrink-0 z-20">
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-4">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-10 mb-2">
            <p class="text-[10px] text-gray-500 text-center font-medium leading-tight">
                SISTEM INFORMASI MAGANG<br>PT KERETA API INDONESIA
            </p>
        </div>
        <nav class="flex-1 overflow-y-auto py-2">
            <div class="px-6 mb-3">
                <p class="text-[11px] font-bold text-orange-500 uppercase tracking-wider">Admin Unit</p>
            </div>
            <ul class="space-y-1">
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-blue-50/50 border-r-4 border-blue-600">
                        <i class="fa-solid fa-house w-6 text-center text-blue-700"></i>
                        <span class="ml-2 text-sm text-blue-700">Dashboard Unit</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        {{-- Header --}}
        <header class="h-24 flex items-center justify-between px-8 shrink-0 bg-[#f4f6f9]">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, Unit Sistem Informasi</h2>
                <p class="text-sm text-gray-500 mt-1">Penilaian Proposal & Progress Magang Aktif</p>
            </div>
        </header>

        {{-- Scrollable Content Area --}}
        <div class="flex-1 overflow-y-auto px-8 pb-8">
            
            {{-- Alert Notifikasi --}}
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <i class="fa-solid fa-circle-check mr-2"></i>
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
            </div>
            @endif

            {{-- Tabel Pengajuan --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a3668] text-white text-xs font-semibold">
                                <th class="px-6 py-3 rounded-tl-lg">Mahasiswa</th>
                                <th class="px-6 py-3 text-center">Status Berkas</th>
                                <th class="px-6 py-3 text-center">Status Magang</th>
                                <th class="px-6 py-3 text-center rounded-tr-lg">Aksi & Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @forelse($pendaftar as $p)
                                <tr class="hover:bg-gray-50/50">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-900">{{ $p->nama_mahasiswa }}</div>
                                        <div class="text-xs text-gray-500">{{ $p->nim }} | {{ $p->universitas }}</div>
                                        <div class="text-xs font-semibold mt-1">{{ $p->jurusan }}</div>
                                    </td>
                                    
                                    {{-- Kolom Status Penerimaan --}}
                                    <td class="px-6 py-4 text-center">
                                        @if($p->status_penerimaan == 'Diterima')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">{{ $p->status_penerimaan }}</span>
                                        @elseif($p->status_penerimaan == 'Ditolak')
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">{{ $p->status_penerimaan }}</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold border border-yellow-200">{{ $p->status_penerimaan }}</span>
                                        @endif
                                    </td>

                                    {{-- Kolom Status Magang --}}
                                    <td class="px-6 py-4 text-center">
                                        @if($p->status_magang == 'Berjalan')
                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">{{ $p->status_magang }}</span>
                                        @elseif($p->status_magang == 'Selesai')
                                            <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-xs font-bold border border-teal-200">{{ $p->status_magang }}</span>
                                        @else
                                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold border border-gray-200">{{ $p->status_magang ?? 'Menunggu' }}</span>
                                        @endif
                                    </td>

                                    {{-- Kolom Aksi Dinamis --}}
                                    <td class="px-6 py-4 text-center">
                                        @if($p->status_penerimaan == 'Pending' && $p->posisi_berkas == 'UNIT')
                                            <div class="flex items-center justify-center gap-2">
                                                <form action="{{ route('unit.seleksi', [$p->id, 'lolos']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENERIMA mahasiswa ini?')">
                                                    @csrf
                                                    <button type="submit" class="px-3 py-1.5 rounded bg-green-500 text-white hover:bg-green-600 flex items-center justify-center transition-colors text-xs font-bold shadow-sm">
                                                        <i class="fa-solid fa-user-check mr-1"></i> Terima
                                                    </button>
                                                </form>
                                                <form action="{{ route('unit.seleksi', [$p->id, 'gugur']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENOLAK berkas ini?')">
                                                    @csrf
                                                    <button type="submit" class="px-3 py-1.5 rounded bg-red-500 text-white hover:bg-red-600 flex items-center justify-center transition-colors text-xs font-bold shadow-sm">
                                                        <i class="fa-solid fa-user-xmark mr-1"></i> Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif($p->status_penerimaan == 'Diterima' && $p->status_magang == 'Berjalan')
                                            <div class="flex items-center justify-center">
                                                <form action="{{ route('unit.selesai', $p->id) }}" method="POST" onsubmit="return confirm('Selesaikan program magang mahasiswa ini?')">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-1.5 rounded bg-blue-600 text-white hover:bg-blue-700 flex items-center justify-center transition-colors text-xs font-bold shadow-sm">
                                                        <i class="fa-solid fa-graduation-cap mr-2"></i> Selesaikan Magang
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-xs font-bold text-gray-400">
                                                <i class="fa-solid fa-check-double mr-1"></i> Selesai Diproses
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-8 text-gray-500">
                                        <i class="fa-solid fa-hourglass-half text-4xl mb-3 text-gray-300"></i>
                                        <h6 class="font-bold text-gray-700">Belum Ada Berkas Masuk</h6>
                                        <p class="text-sm mt-1">Semua berkas permohonan magang berada di meja SDM atau belum ada usulan baru.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</body>
</html>