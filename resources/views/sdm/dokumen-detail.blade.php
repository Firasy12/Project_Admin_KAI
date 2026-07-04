<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Pendaftar - E-Magang KAI</title>
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
                <li><a href="{{ url('/sdm/dokumen') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-cyan-50/50 border-r-4 border-cyan-600"><i class="fa-solid fa-folder-open w-6 text-center text-cyan-700"></i><span class="ml-2 text-sm text-cyan-700">Dokumen</span></a></li>
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
        <header class="h-24 flex items-center justify-between px-8 shrink-0">
            <div>
                <a href="{{ url('/sdm/dokumen') }}" class="text-xs text-gray-400 hover:text-gray-700 mb-1 inline-flex items-center">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Arsip Dokumen
                </a>
                <h2 class="text-2xl font-bold text-gray-800">Dokumen {{ $nama }}</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $nim }} &middot; {{ $universitas }}</p>
            </div>
            <a href="{{ route('sdm.pengajuan.show', $pengajuanId) }}" class="text-xs font-semibold text-[#1a3668] hover:text-blue-800">
                Lihat detail pengajuan <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </header>

        <div class="flex-1 overflow-y-auto px-8 pb-8 custom-scrollbar">
            <div class="flex justify-end mb-4">
                <a href="{{ route('sdm.dokumen.unduh-semua', $pengajuanId) }}" class="inline-flex items-center px-4 py-2 bg-[#1a3668] hover:bg-blue-900 text-white text-sm font-semibold rounded-lg transition-colors">
                    <i class="fa-solid fa-file-zipper mr-2"></i> Unduh Semua Berkas (.zip)
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-cyan-50 text-cyan-900 text-xs font-semibold border-b border-cyan-100">
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Jenis Berkas</th>
                            <th class="px-6 py-3">Keterangan</th>
                            <th class="px-6 py-3 text-center">Status</th>
                            <th class="px-6 py-3 text-center">Diunggah</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                        @forelse($berkas as $b)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    {{ $b->nama_berkas }}
                                    @if($b->is_required)
                                        <span class="text-red-500 text-xs">*</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-400">{{ $b->keterangan ?? '-' }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($b->status === 'uploaded')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-green-50 text-green-700">
                                            <i class="fa-solid fa-circle-check mr-1"></i> Sudah diunggah
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-500">
                                            Belum diunggah
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center text-xs text-gray-400">
                                    {{ $b->uploaded_at ? $b->uploaded_at->translatedFormat('d M Y, H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($b->download_url)
                                        <a href="{{ $b->download_url }}" target="_blank"
                                           class="inline-flex items-center px-3 py-1.5 bg-cyan-50 text-cyan-700 hover:bg-cyan-100 rounded-lg text-xs font-semibold transition-colors border border-cyan-100">
                                            <i class="fa-solid fa-cloud-arrow-down mr-1.5"></i> Unduh
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-300 italic">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                    <i class="fa-solid fa-folder-open text-3xl mb-2 text-gray-300"></i>
                                    <p>Belum ada jenis berkas terdaftar di server.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-gray-400 mt-3">
                <span class="text-red-500">*</span> Berkas wajib diunggah oleh mahasiswa.
            </p>
        </div>
    </main>
</body>
</html>
