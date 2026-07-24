<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Notifikasi - KAI Intern Management</title>
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

    {{-- SIDEBAR UTAMA (KAI DEEP NAVY BLUE) --}}
    <aside class="w-64 kai-bg-navy flex flex-col shrink-0 z-20 shadow-2xl border-r border-slate-900/50">
        {{-- LOGO AREA - TETAP KOKOH DAN PADAT --}}
        <div class="pt-8 pb-6 flex flex-col items-center justify-center px-6 border-b border-slate-800/60">
            <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI"
                class="h-11 mb-2 object-contain drop-shadow-md">
            <p class="text-[11px] text-center font-extrabold tracking-wide uppercase mt-1.5">
                <span class="kai-text-orange">PT KERETA API INDONESIA</span>
            </p>
        </div>

        {{-- NAVIGATION MENU ITEMS --}}
        <nav class="flex-1 overflow-y-auto py-4 custom-scrollbar">
            <div class="px-6 mb-2">
                <p class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest">MENU UTAMA</p>
            </div>

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

                {{-- Monitoring Status (Active State di File Ini) --}}
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
                    <a href="{{ url('/sdm/dokumen') }}"
                        class="flex items-center px-6 py-3 transition-all duration-200 {{ Request::is('sdm/dokumen') ? 'text-white bg-gradient-to-r from-[#f47920] to-[#e0650d] font-bold rounded-full shadow-lg shadow-orange-900/30' : 'text-slate-300 hover:text-white hover:bg-[#f47920]/15 font-medium rounded-full group' }}">
                        <i
                            class="fa-solid fa-folder-open w-5 text-center text-base mr-3 transition-colors {{ Request::is('sdm/dokumen') ? 'text-white' : 'text-slate-400 group-hover:text-[#f47920]' }}"></i>
                        <span class="text-sm">Dokumen</span>
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

            <div class="px-6 my-4 border-t border-slate-800/50"></div>

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

    {{-- MAIN CONTENT INTERFACE WRAPPER --}}
    <main class="flex-1 flex flex-col overflow-hidden relative">

        {{-- HEADER TOP BAR DENGAN AKSEN VERTikal ORANYE KAI --}}
        <header
            class="h-24 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 shrink-0 shadow-sm relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-10 kai-bg-orange rounded-full"></div>
                <div>
                    <h2 class="text-2xl font-black text-[#0b1739] tracking-tight">Pusat Notifikasi</h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Pemberitahuan terbaru seputar aktivitas
                        pengajuan magang.</p>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-50 border border-slate-200 rounded-2xl p-2 pr-5 shadow-inner">
                    <div
                        class="w-9 h-9 rounded-xl kai-bg-navy text-white flex items-center justify-center font-black text-sm tracking-wide mr-3 shadow-md shadow-blue-950/20">
                        AS
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-extrabold text-[#0b1739] leading-tight">Admin SDM</span>
                        <span class="text-[10px] text-slate-400 font-bold leading-none mt-0.5">Unit Divisi Humas &
                            SDM</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- AREA WORKSPACE DENGAN AMBIENT GLOW MESH BG --}}
        <div
            class="flex-1 overflow-y-auto px-8 py-8 custom-scrollbar relative bg-gradient-to-br from-sky-200 via-blue-200 to-sky-300">

            {{-- BULATAN AURA GRADASI SAMAR DEKORATIF --}}
            <div class="absolute inset-0 bg-white/10 pointer-events-none z-0"></div>
            <div
                class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-400/20 rounded-full blur-[120px] pointer-events-none z-0">
            </div>
            {{-- MAIN INTERFACE CONTAINER LAYOUT --}}
            <div class="relative z-10 space-y-6">

                {{-- KOTAK PERINGATAN JIKA ADA PENGAJUAN BARU YANG BELUM DIPROSES SDM --}}
                @if(isset($jumlahBaru) && $jumlahBaru > 0)
                    <div
                        class="bg-rose-50 border border-rose-100 rounded-2xl p-4 flex items-start gap-4 shadow-xl shadow-blue-950/5 border-l-4 border-l-rose-500">
                        <div
                            class="w-10 h-10 rounded-xl bg-rose-100/80 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <i class="fa-solid fa-triangle-exclamation text-rose-600"></i>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-rose-800 text-sm">Tindakan Diperlukan!</h4>
                            <p class="text-xs text-rose-600 font-semibold mt-1 leading-relaxed">Ada <b>{{ $jumlahBaru }}
                                    pengajuan magang baru</b> yang menunggu diverifikasi. Silakan cek di menu <a
                                    href="{{ url('/sdm/pengajuan-masuk') }}"
                                    class="underline font-black hover:text-rose-800">Pengajuan Masuk</a>.</p>
                        </div>
                    </div>
                @endif

                {{-- MAIN NOTIFICATION BOX CONTAINER --}}
                <div
                    class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden transition-shadow hover:shadow-lg">

                    {{-- HEADER AREA BOX --}}
                    <div class="p-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 kai-bg-navy"></div>
                        <h4 class="text-base font-extrabold text-[#0b1739] tracking-tight flex items-center gap-2">
                            <i class="fa-solid fa-envelope-open-text text-slate-400"></i> Semua Pemberitahuan
                        </h4>
                    </div>

                    {{-- LIST CONTAINER NOTIFIKASI --}}
                    <div class="p-6 space-y-4 bg-white">
                        @if(isset($notifications) && count($notifications) > 0)
                            {{-- RENDER DINAMIS JIKA ADA DATA DARI DATABASE --}}
                        @else
                            {{-- FALLBACK COMPONENT SYNCHRONIZED SEPERTI PADA IMAGE_C4909E.PNG --}}

                            <!-- Notif 1: Nizam Kori -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight">Review Selesai (Memenuhi
                                        Syarat)</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Evaluasi berkas untuk <span
                                            class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Nizam
                                            Kori</span> telah selesai.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 2 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 2: Arjuna Bimantara -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight">Review Selesai (Memenuhi
                                        Syarat)</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Evaluasi berkas untuk <span
                                            class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Arjuna
                                            Bimantara</span> telah selesai.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 2 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 3: Pengajuan Magang Baru (Asep) -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-[#f47920] bg-orange-50/5 hover:border-orange-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 text-blue-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-file-circle-plus"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight kai-text-orange">Pengajuan
                                        Magang Baru</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Mahasiswa <span
                                            class="text-blue-700 font-extrabold bg-blue-50 px-1.5 py-0.5 rounded border border-blue-100/50">Asep</span>
                                        dari <span class="text-slate-600 font-bold">Universitas Brawijaya</span> telah
                                        mengirimkan pengajuan magang.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 2 days ago</span>
                                </div>
                                <span
                                    class="text-[9px] font-black px-2 py-0.5 bg-orange-100 text-[#f47920] rounded border border-orange-200/30 uppercase tracking-wider shadow-sm shrink-0">Unread</span>
                            </div>

                            <!-- Notif 4: cecep -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-rose-500 hover:border-rose-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-circle-xmark"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight">Pengajuan Ditolak</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Pengajuan magang atas nama
                                        <span
                                            class="text-rose-700 font-extrabold bg-rose-50 px-1.5 py-0.5 rounded border border-rose-100/50">cecep</span>
                                        tidak memenuhi syarat.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 2 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 5: Nizam Kory (Ditolak) -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-rose-500 hover:border-rose-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-circle-xmark"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight">Pengajuan Ditolak</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Pengajuan magang atas nama
                                        <span
                                            class="text-rose-700 font-extrabold bg-rose-50 px-1.5 py-0.5 rounded border border-rose-100/50">Nizam
                                            Kory</span> tidak memenuhi syarat.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 2 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 6: Nizam Kory (Memenuhi Syarat) -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight">Review Selesai (Memenuhi
                                        Syarat)</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Evaluasi berkas untuk <span
                                            class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Nizam
                                            Kory</span> telah selesai.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 3 days ago</span>
                                </div>
                            </div>

                            <!-- Notif 7: Ahmad Firasy Rahman -->
                            <div
                                class="flex items-start gap-4 p-4 bg-gradient-to-r from-slate-50/50 to-white rounded-xl border border-slate-200/70 shadow-sm border-l-4 border-l-emerald-500 hover:border-emerald-300 transition-all">
                                <div
                                    class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0 shadow-sm">
                                    <i class="fa-solid fa-circle-check"></i></div>
                                <div class="flex-1">
                                    <h5 class="text-xs font-black text-slate-800 tracking-tight">Review Selesai (Memenuhi
                                        Syarat)</h5>
                                    <p class="text-[11px] text-slate-400 font-semibold mt-1">Evaluasi berkas untuk <span
                                            class="text-emerald-700 font-extrabold bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100/50">Ahmad
                                            Firasy Rahman</span> telah selesai.</p>
                                    <span class="flex items-center gap-1 text-slate-400 text-[10px] font-bold mt-2"><i
                                            class="fa-solid fa-clock text-slate-300"></i> 3 days ago</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div> {{-- END OF CONTAINER WRAPPER --}}
        </div>
    </main>

    <script>
        // Auto-refresh: data di halaman ini (pengajuan masuk, status, dsb)
        // bisa berubah kapan saja dari aksi SDM/Unit lain atau pendaftar baru,
        // jadi halaman di-reload berkala biar selalu sinkron tanpa perlu
        // refresh manual. Dijeda otomatis kalau ada popup SweetAlert lagi
        // kebuka atau user lagi ngetik di kolom pencarian, supaya nggak
        // motong aksi yang sedang berjalan.
        (function () {
            const REFRESH_INTERVAL_MS = 20000; // 20 detik

            function sedangSibuk() {
                if (document.querySelector(".swal2-container")) return true;
                const aktif = document.activeElement;
                if (aktif && (aktif.tagName === "INPUT" || aktif.tagName === "TEXTAREA")) return true;
                return false;
            }

            setInterval(() => {
                if (!sedangSibuk()) {
                    window.location.reload();
                }
            }, REFRESH_INTERVAL_MS);
        })();
    </script>
</body>

</html>