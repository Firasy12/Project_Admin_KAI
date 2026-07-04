<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - E-Magang KAI</title>
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
                <li><a href="{{ url('/sdm/pengajuan-masuk') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-blue-50/50 border-r-4 border-blue-600"><i class="fa-solid fa-file-lines w-6 text-center"></i><span class="ml-2 text-sm">Pengajuan Masuk</span></a></li>
                <li><a href="{{ url('/sdm/riwayat-review') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-clock-rotate-left w-6 text-center"></i><span class="ml-2 text-sm">Riwayat Review</span></a></li>
                <li><a href="{{ url('/sdm/monitoring') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-chart-line w-6 text-center"></i><span class="ml-2 text-sm">Monitoring Status</span></a></li>
                <li><a href="{{ url('/sdm/notifikasi') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors"><i class="fa-solid fa-bell w-6 text-center"></i><span class="ml-2 text-sm">Notifikasi</span></a></li>
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
        <header class="h-24 flex items-center justify-between px-8 shrink-0">
            <div>
                <a href="{{ url()->previous() }}" class="text-xs text-gray-400 hover:text-gray-700 mb-1 inline-flex items-center">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
                </a>
                <h2 class="text-2xl font-bold text-gray-800">Detail Pengajuan Magang</h2>
                <p class="text-sm text-gray-500 mt-1">Informasi lengkap dan berkas pendaftar.</p>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto px-8 pb-8 custom-scrollbar">

            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg">{{ session('error') }}</div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Biodata --}}
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-lg font-bold text-gray-800">Biodata Mahasiswa</h5>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full
                            @if($pengajuan->status === 'Diterima') bg-green-50 text-green-700
                            @elseif($pengajuan->status === 'Ditolak') bg-red-50 text-red-700
                            @elseif($pengajuan->status === 'Review') bg-purple-50 text-purple-700
                            @else bg-orange-50 text-orange-700
                            @endif
                        ">{{ $pengajuan->status }}</span>
                    </div>

                    <table class="w-full text-sm">
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500 w-40">Nama</td><td class="py-2 font-semibold text-gray-800">{{ $pengajuan->nama }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">NIM</td><td class="py-2">{{ $pengajuan->nim }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">Email</td><td class="py-2">{{ $pengajuan->email }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">No. HP</td><td class="py-2">{{ $pengajuan->no_hp }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">Universitas</td><td class="py-2">{{ $pengajuan->universitas }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">Jurusan / Prodi</td><td class="py-2">{{ $pengajuan->jurusan }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">Unit Tujuan</td><td class="py-2">{{ $pengajuan->unit_tujuan }}</td></tr>
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500">Tanggal Pengajuan</td><td class="py-2">{{ $pengajuan->tanggal_pengajuan }}</td></tr>
                        @if($pengajuan->motivasi)
                        <tr class="border-b border-gray-50"><td class="py-2 text-gray-500 align-top">Motivasi</td><td class="py-2">{{ $pengajuan->motivasi }}</td></tr>
                        @endif
                        @if($pengajuan->catatan_sdm)
                        <tr><td class="py-2 text-gray-500 align-top">Catatan SDM</td><td class="py-2">{{ $pengajuan->catatan_sdm }}</td></tr>
                        @endif
                    </table>
                </div>

                {{-- Aksi --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 h-fit">
                    <h5 class="text-lg font-bold text-gray-800 mb-4">Aksi SDM</h5>
                    <div class="space-y-2">
                        <form method="POST" action="{{ route('sdm.pengajuan.aksi', [$pengajuan->id, 'terima']) }}" onsubmit="return confirm('Berkas lengkap dan diteruskan ke Unit?')">
                            @csrf
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                                <i class="fa-solid fa-paper-plane mr-1"></i> Teruskan ke Unit
                            </button>
                        </form>
                        <form method="POST" action="{{ route('sdm.pengajuan.aksi', [$pengajuan->id, 'revisi']) }}" onsubmit="return confirm('Minta revisi berkas ke mahasiswa ini?')">
                            @csrf
                            <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                                <i class="fa-solid fa-rotate-left mr-1"></i> Minta Revisi
                            </button>
                        </form>
                        <form method="POST" action="{{ route('sdm.pengajuan.aksi', [$pengajuan->id, 'tolak']) }}" onsubmit="return confirm('Tolak pengajuan ini?')">
                            @csrf
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                                <i class="fa-solid fa-xmark mr-1"></i> Tolak
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Berkas --}}
            <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-lg font-bold text-gray-800">Berkas Persyaratan</h5>
                    <a href="{{ route('sdm.dokumen.show', $pengajuan->id) }}" class="text-xs font-semibold text-cyan-700 hover:text-cyan-900">
                        Lihat halaman dokumen lengkap <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    @forelse($berkas as $b)
                        <div class="border border-gray-100 rounded-lg p-4 flex items-start justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $b->nama_berkas }}</p>
                                @if($b->status === 'uploaded')
                                    <span class="text-[11px] text-green-600"><i class="fa-solid fa-circle-check mr-1"></i>Sudah diunggah</span>
                                @else
                                    <span class="text-[11px] text-gray-400"><i class="fa-solid fa-circle-exclamation mr-1"></i>Belum diunggah</span>
                                @endif
                            </div>
                            @if($b->download_url)
                                <a href="{{ $b->download_url }}" target="_blank" class="text-cyan-600 hover:text-cyan-800 p-2 rounded-lg hover:bg-cyan-50 transition-colors" title="Unduh berkas">
                                    <i class="fa-solid fa-cloud-arrow-down"></i>
                                </a>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-400 italic">Belum ada data jenis berkas dari server.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </main>
</body>
</html>
