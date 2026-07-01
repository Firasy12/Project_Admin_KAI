<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin SDM - E-Magang KAI</title>
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
                    <a href="{{ url('/sdm/dashboard') }}" class="flex items-center px-6 py-2.5 text-gray-900 font-bold bg-blue-50/50 border-r-4 border-blue-600">
                        <i class="fa-solid fa-house w-6 text-center text-blue-700"></i>
                        <span class="ml-2 text-sm text-blue-700">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-file-lines w-6 text-center"></i>
                        <span class="ml-2 text-sm">Pengajuan Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-users w-6 text-center"></i>
                        <span class="ml-2 text-sm">Review Pengajuan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-clock-rotate-left w-6 text-center"></i>
                        <span class="ml-2 text-sm">Riwayat Review</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-chart-line w-6 text-center"></i>
                        <span class="ml-2 text-sm">Monitoring Status</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-bell w-6 text-center"></i>
                        <span class="ml-2 text-sm">Notifikasi</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
                        <i class="fa-solid fa-folder-open w-6 text-center"></i>
                        <span class="ml-2 text-sm">Dokumen</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-2.5 text-gray-500 hover:text-gray-900 font-medium transition-colors">
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
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, Admin SDM</h2>
                <p class="text-sm text-gray-500 mt-1">kelola pengajuan magang dengan mudah</p>
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
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm">
                        AS
                    </div>
                </div>
            </div>
        </header>

        {{-- Scrollable Content --}}
        <div class="flex-1 overflow-y-auto px-8 pb-8 custom-scrollbar">
            
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 flex items-center">
                <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
            </div>
            @endif

            {{-- KOTAK STATISTIK DINAMIS (Akan memunculkan angka 0 jika tabel kosong, atau sesuai isi tabel) --}}
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-orange-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-orange-500 uppercase tracking-wide mb-2">Pengajuan Masuk</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $countMasuk ?? 0 }}</span>
                </div>

                <div class="bg-white rounded-xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.1)] border-b-[6px] border-purple-400 p-6 flex flex-col items-center justify-center text-center">
                    <h6 class="text-[11px] font-bold text-purple-500 uppercase tracking-wide mb-2">Sedang Riview</h6>
                    <span class="text-4xl font-bold text-gray-800">{{ $countReview ?? 0 }}</span>
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

            {{-- TABEL PENGUAJUAN --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-lg font-bold text-gray-800">Pengajuan Terbaru</h5>
                    <a href="{{ url('/sdm/pengajuan-masuk') }}" class="text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded transition-colors">Lihat Semua</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1a3668] text-white text-xs font-semibold">
                                <th class="px-6 py-3 font-semibold rounded-tl-lg">Nama</th>
                                <th class="px-6 py-3 font-semibold">Universitas</th>
                                <th class="px-6 py-3 font-semibold">Jurusan</th>
                                <th class="px-6 py-3 font-semibold">Unit Tujuan</th>
                                <th class="px-6 py-3 font-semibold">Tanggal</th>
                                <th class="px-6 py-3 font-semibold text-center rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                            @if(isset($pengajuan) && count($pengajuan) > 0)
                                @foreach($pengajuan as $item)
                                    <tr class="hover:bg-gray-50/50">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                        <td class="px-6 py-4">{{ $item->universitas }}</td>
                                        <td class="px-6 py-4">{{ $item->jurusan }}</td>
                                        <td class="px-6 py-4">{{ $item->unit_tujuan ?? 'Belum Ditentukan' }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-3">
                                                <a href="{{ url('/sdm/pengajuan/'.$item->id.'/edit') }}" class="text-blue-900 hover:text-blue-700" title="Edit">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('sdm.pengajuan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus permanen data pendaftaran ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-blue-900 hover:text-red-600" title="Hapus">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada data pendaftar di database.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- GRAFIK & AKTIVITAS --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <div class="lg:col-span-5 bg-white rounded-xl border border-gray-100 p-6 shadow-sm flex flex-col">
                    <h5 class="text-base font-bold text-gray-800 mb-4">Ringkasan Status</h5>
                    <div class="flex-1 flex items-center justify-center min-h-[220px]">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <div class="lg:col-span-7 bg-white rounded-xl border border-gray-100 p-6 shadow-sm flex flex-col">
                    <h5 class="text-base font-bold text-gray-800 mb-4">Aktivitas Terbaru</h5>
                    <div class="space-y-4 flex-1 overflow-y-auto custom-scrollbar max-h-[240px] pr-2">
                        @if(isset($aktivitasTerbaru) && count($aktivitasTerbaru) > 0)
                            @foreach($aktivitasTerbaru as $akt)
                                <div class="flex gap-3 items-start border-b border-gray-50 pb-3 last:border-0 last:pb-0">
                                    <div class="bg-blue-50 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="fa-solid fa-user-plus text-xs"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-900 block">Pendaftaran / Update Baru</span>
                                        <span class="text-xs text-gray-600 block mt-0.5">Mahasiswa atas nama <strong>{{ $akt->nama_mahasiswa ?? $akt->nama }}</strong> telah masuk/diperbarui di sistem.</span>
                                        <span class="text-[10px] text-gray-400 block mt-1"><i class="fa-regular fa-clock mr-1"></i>{{ $akt->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-400 text-center py-8">Belum ada aktivitas rekam data terbaru dari pendaftar.</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('statusChart').getContext('2d');
            
            // Variabel angka di-inject dari Controller Laravel (default ke 0 jika kosong)
            const dataMasuk = {{ $countMasuk ?? 0 }};
            const dataReview = {{ $countReview ?? 0 }};
            const dataDiterima = {{ $countDiterima ?? 0 }};
            const dataDitolak = {{ $countDitolak ?? 0 }};
            const dataSelesai = {{ $countSelesai ?? 0 }};

            // Jika semua data 0, tampilkan 1 donut abu-abu agar chart tidak blank
            const totalData = dataMasuk + dataReview + dataDiterima + dataDitolak + dataSelesai;
            
            if(totalData === 0) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Belum Ada Data'],
                        datasets: [{
                            data: [1],
                            backgroundColor: ['#e2e8f0'],
                            borderWidth: 0
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false, cutout: '75%', plugins: { legend: { position: 'right' } } }
                });
            } else {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Masuk', 'Review', 'Diterima', 'Ditolak', 'Selesai'],
                        datasets: [{
                            data: [dataMasuk, dataReview, dataDiterima, dataDitolak, dataSelesai],
                            backgroundColor: ['#f97316', '#a855f7', '#22c55e', '#ef4444', '#14b8a6'],
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '75%',
                        plugins: {
                            legend: {
                                position: 'right',
                                labels: { usePointStyle: true, padding: 15, font: { size: 11 } }
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>