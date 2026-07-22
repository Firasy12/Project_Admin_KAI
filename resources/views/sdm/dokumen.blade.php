<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Dokumen - KAI Intern Management</title>
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

<body class="flex h-screen overflow-hidden text-slate-800 bg-[#f4f6f9]">

    {{-- SIDEBAR UTAMA --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-slate-900/50">
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-slate-800/60">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI"
                class="h-11 mb-2 object-contain drop-shadow-md">
            <p class="text-[11px] text-center font-extrabold tracking-wide uppercase mt-1.5"><span
                    class="kai-text-orange">PT KERETA API INDONESIA</span></p>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 custom-scrollbar">
            <div class="px-6 mb-2">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest opacity-70">Admin SDM</p>
            </div>

            {{-- MENU UTAMA FORMAT KAPSUL LONJONG --}}
            <ul class="space-y-2 px-3">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ url('/sdm/dashboard') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dashboard') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-house w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>

                {{-- Pengajuan Masuk --}}
                <li>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/pengajuan-masuk') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-file-import w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/pengajuan-masuk') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Pengajuan Masuk</span>
                    </a>
                </li>

                {{-- Review Pengajuan --}}
                <li>
                    <a href="{{ url('/sdm/review-pengajuan') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/review-pengajuan') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-user-shield w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/review-pengajuan') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Review Pengajuan</span>
                    </a>
                </li>

                {{-- Monitoring Status --}}
                <li>
                    <a href="{{ url('/sdm/monitoring') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/monitoring') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-chart-line w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/monitoring') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Monitoring Status</span>
                    </a>
                </li>

                {{-- Notifikasi --}}
                <li>
                    <a href="{{ url('/sdm/notifikasi') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/notifikasi') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-bell w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/notifikasi') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Notifikasi</span>
                    </a>
                </li>

                {{-- Dokumen --}}
                <li>
                    <a href="{{ route('sdm.dokumen.show', $item->id) }}"
                        class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-4 py-1.5 bg-blue-50 text-blue-700 border border-blue-200 rounded-xl hover:kai-bg-navy hover:text-white hover:border-transparent transition-all shadow-sm">
                        <i class="fa-solid fa-eye"></i>
                        Lihat Dokumen
                    </a>
                </li>

                {{-- Profil --}}
                <li>
                    <a href="{{ url('/sdm/profil') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/profil') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-user w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/profil') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Profil</span>
                    </a>
                </li>
            </ul>

            {{-- SECURE SEPARATOR LINE --}}
            <div class="px-6 my-4 border-t border-white/10"></div>

            {{-- KELOMPOK ACTION LOGOUT (FORMAT KAPSUL MAKSIMAL) --}}
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

    {{-- MAIN INTERFACE --}}
    <main class="flex-1 flex flex-col overflow-hidden relative">
        <header
            class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Arsip Dokumen</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Kelola dan unduh seluruh berkas persyaratan
                        pendaftar magang.</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl p-2 pr-5 shadow-inner">
                    <div
                        class="w-9 h-9 rounded-xl kai-bg-navy text-white flex items-center justify-center font-black text-sm mr-3">
                        AS</div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-slate-400 font-bold mt-0.5">SDM PT KAI</span>
                    </div>
                </div>
            </div>
        </header>

        <div
            class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div
                class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0">
            </div>

            <div class="relative z-10 space-y-6">
                <div
                    class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden transition-shadow hover:shadow-lg">

                    {{-- SEARCH HEADER --}}
                    <div
                        class="p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2"><i
                                class="fa-solid fa-folder-tree text-slate-400"></i> Daftar Berkas Mahasiswa</h4>
                        <form action="" method="GET" class="relative w-full sm:w-80 group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"><i
                                    class="fa-solid fa-magnifying-glass text-slate-400 text-sm"></i></span>
                            <input type="text" placeholder="Cari nama/NIM/universitas..."
                                class="w-full pl-10 pr-4 py-2 text-xs font-semibold bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-[#f47920] focus:ring-1 focus:ring-[#f47920] shadow-inner">
                        </form>
                    </div>

                    {{-- TABLE CONTENT --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="kai-bg-navy text-slate-300 text-[11px] font-bold uppercase tracking-wider border-b border-slate-800/80">
                                    <th class="px-6 py-4 w-20 text-center border-r border-slate-800/40">No</th>
                                    <th class="px-6 py-4 border-r border-slate-800/40">Nama Pendaftar</th>
                                    <th class="px-6 py-4 border-r border-slate-800/40">Universitas</th>
                                    <th class="px-6 py-4 text-center border-r border-slate-800/40">Proposal Pengajuan
                                    </th>
                                    <th class="px-6 py-4 text-center">Aksi Lainnya</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-slate-600 divide-y divide-slate-100 bg-white">
                                @php
                                    $rows = [
                                        ['nama' => 'Nizam Kori', 'univ' => 'Universitas Prabumulih'],
                                        ['nama' => 'Arjuna Bimantara', 'univ' => 'Universitas Prabumulih'],
                                        ['nama' => 'Asep', 'univ' => 'Universitas Brawijaya'],
                                        ['nama' => 'cecep', 'univ' => 'Universitas Sriwijaya'],
                                        ['nama' => 'Nizam Kory', 'univ' => 'Unpra'],
                                        ['nama' => 'Nizam Kory', 'univ' => 'Unpra'],
                                        ['nama' => 'Ahmad Firasy Rahman', 'univ' => 'Universitas Sriwijaya'],
                                        ['nama' => 'Iyann', 'univ' => 'Universitas Prabumulih'],
                                        ['nama' => 'Iyann', 'univ' => 'Universitas Prabumulih'],
                                        ['nama' => 'Arjuna Bimantara', 'univ' => 'Universitas Prabumulih'],
                                    ];
                                @endphp
                                @foreach($rows as $idx => $row)
                                    <tr class="hover:bg-orange-50/10 even:bg-slate-50/40 transition-all duration-150">
                                        <td class="px-6 py-4 font-bold text-slate-400 text-center">{{ $idx + 1 }}</td>
                                        <td class="px-6 py-4 font-extrabold text-slate-800 text-[14px]">
                                            {{ $mock['nama'] ?? $row['nama'] }}</td>
                                        <td class="px-6 py-4 font-bold text-slate-500">
                                            <div class="flex items-center gap-1.5">
                                                <div
                                                    class="w-4 h-4 rounded-md bg-slate-100 flex items-center justify-center text-[9px] text-slate-400">
                                                    <i class="fa-solid fa-building-columns"></i></div>
                                                {{ $mock['univ'] ?? $row['univ'] }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="#"
                                                class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-3 py-1.5 bg-rose-50 text-rose-600 border border-rose-200 rounded-xl hover:bg-rose-100 transition-colors shadow-sm">
                                                <i class="fa-solid fa-file-pdf text-rose-500"></i> Lihat PDF
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ url('/sdm/dokumen/detail') }}"
                                                class="inline-flex items-center gap-1.5 text-[11px] font-extrabold px-3 py-1.5 bg-cyan-50 text-cyan-700 border border-cyan-200 rounded-xl hover:bg-cyan-100 hover:text-cyan-800 transition-all shadow-sm">
                                                <i class="fa-solid fa-folder-open text-cyan-600"></i> Lihat Dokumen
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>