<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Pendaftar - E-Magang KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9;
        }

        /* Custom Scrollbar Styling */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
        }

        /* ==================================================================
       KAI Brand Core Colors - KITA GANTI JADI BIRU TERANG (image_18b0a6.png)
       ================================================================== */
        .kai-bg-navy {
            background-color: #00529b;
        }

        /* Mengubah background sidebar jadi biru terang */
        .kai-bg-orange {
            background-color: #f47920;
        }

        .kai-text-navy {
            color: #00529b;
        }

        /* Mengubah teks navy jadi warna biru terang */
        .kai-text-orange {
            color: #f47920;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden text-gray-800 bg-[#f4f6f9]">

    {{-- SIDEBAR UTAMA (KAI ROYAL BLUE) --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-white/10">
        {{-- LOGO AREA --}}
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-white/10">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI"
                class="h-11 mb-2 object-contain drop-shadow-md">
            <p class="text-[11px] text-center font-extrabold tracking-wide uppercase mt-1.5">
                <span class="kai-text-orange">PT KERETA API INDONESIA</span>
            </p>
        </div>

        {{-- NAVIGATION MENU ITEMS --}}
        <nav class="flex-1 overflow-y-auto py-4 custom-scrollbar">
            <div class="px-6 mb-2">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest opacity-70">Admin Unit SI</p>
            </div>

            {{-- MENU UTAMA FORMAT KAPSUL LONJONG --}}
            <ul class="space-y-2 px-3">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/unit/dashboard') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/dashboard') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-house w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>

                {{-- Pengajuan Masuk --}}
                <li>
                    <a href="{{ url('/unit/pengajuan-masuk') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/pengajuan-masuk') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-file-import w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/pengajuan-masuk') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Pengajuan Masuk</span>
                    </a>
                </li>

                {{-- Review Pengajuan --}}
                <li>
                    <a href="{{ url('/unit/review-pengajuan') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/review-pengajuan') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-user-shield w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/review-pengajuan') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Review Pengajuan</span>
                    </a>
                </li>

                {{-- Monitoring Status --}}
                <li>
                    <a href="{{ url('/unit/monitoring') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Monitoring Status</span>
                    </a>
                </li>

                {{-- Notifikasi --}}
                <li>
                    <a href="{{ url('/unit/notifikasi') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Notifikasi</span>
                    </a>
                </li>

                {{-- Dokumen --}}
                <li>
                    <a href="{{ url('/unit/dokumen') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dokumen</span>
                    </a>
                </li>

                {{-- Profil --}}
                <li>
                    <a href="{{ url('/unit/profil') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('unit/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('unit/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Profil</span>
                    </a>
                </li>
            </ul>

            {{-- LINE SEPARATOR APRESIASI VISUAL --}}
            <div class="px-6 my-4 border-t border-white/10"></div>

            {{-- KELOMPOK ACTION LOGOUT (FORMAT KAPSUL LONJONG SEJAJAR) --}}
            <ul class="px-3">
                <li>
                    <a href="{{ url('/logout') }}"
                        class="flex items-center px-6 py-3 text-rose-400 hover:text-rose-300 hover:bg-rose-950/30 rounded-full font-bold tracking-wide transition-all group">
                        <i
                            class="fa-solid fa-power-off w-5 text-center text-lg mr-3 transition-transform group-hover:scale-110"></i>
                        <span class="text-sm">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <div class="px-8 pt-8">

            {{-- Breadcrumb --}}
            <a href="{{ route('unit.dokumen') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-[#0b1739] transition">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Arsip Dokumen
            </a>

            {{-- Hero --}}
            <div
                class="mt-4 overflow-hidden rounded-3xl bg-gradient-to-r from-[#0b1739] via-[#12346b] to-[#1f4c99] shadow-2xl shadow-blue-950/20">

                <div class="flex items-center justify-between px-8 py-8">

                    <div>

                        <span
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 text-blue-100 text-xs font-bold uppercase tracking-wider">
                            <i class="fa-solid fa-folder-open"></i>
                            Arsip Dokumen
                        </span>

                        <h1 class="mt-4 text-3xl font-black text-white">
                            {{ $nama }}
                        </h1>

                        <div class="mt-2 flex flex-wrap items-center gap-4 text-blue-100 text-sm">

                            <span>
                                <i class="fa-solid fa-id-card mr-1"></i>
                                {{ $nim }}
                            </span>

                            <span>
                                <i class="fa-solid fa-building-columns mr-1"></i>
                                {{ $universitas }}
                            </span>

                        </div>

                    </div>

                    <a href="{{ route('unit.dokumen.unduh-semua', $pengajuanId) }}"
                        class="inline-flex items-center gap-2 rounded-2xl bg-[#f47920] hover:bg-[#df6d17] px-6 py-3 text-sm font-bold text-white shadow-lg transition-all duration-300 hover:-translate-y-1">

                        <i class="fa-solid fa-file-zipper"></i>

                        Unduh Semua Berkas

                    </a>

                </div>

            </div>

        </div>



        <div class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-blue-50 text-blue-900 text-xs font-semibold border-b border-blue-100">
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
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-green-50 text-green-700">
                                            <i class="fa-solid fa-circle-check mr-1"></i> Sudah diunggah
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-500">
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
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg text-xs font-semibold transition-colors border border-blue-100">
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