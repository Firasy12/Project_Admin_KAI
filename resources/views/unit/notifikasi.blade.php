<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Admin Unit</title>
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
            </ul>
        </nav>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-24 flex items-center justify-between px-8 shrink-0 border-b border-gray-100 bg-white">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Notifikasi Aktivitas</h2>
                <p class="text-sm text-gray-500 mt-1">Pembaruan sistem dan pemberitahuan terkait pengajuan magang</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="text-blue-600 text-sm font-bold hover:underline transition-colors"><i class="fa-solid fa-check-double mr-1"></i> Tandai semua dibaca</button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto custom-scrollbar bg-[#f4f6f9] p-8">
            <div class="max-w-4xl mx-auto">
                
                {{-- KOTAK PERINGATAN JIKA ADA PENGAJUAN BARU --}}
                @if(isset($jumlah_masuk) && $jumlah_masuk > 0)
                <div class="mb-6 bg-red-50 border border-red-100 rounded-xl p-4 flex items-start gap-4 shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex-shrink-0 flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-red-800 text-sm">Tindakan Diperlukan!</h4>
                        <p class="text-sm text-red-600 mt-1">Ada <b>{{ $jumlah_masuk }} pengajuan magang baru</b> dari SDM yang menunggu respon Anda. Silakan cek di menu <a href="{{ url('/unit/pengajuan-masuk') }}" class="underline font-bold hover:text-red-800">Pengajuan Masuk</a>.</p>
                    </div>
                </div>
                @endif

                {{-- DAFTAR NOTIFIKASI --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden divide-y divide-gray-50">
                    @forelse($notifikasi as $item)
                        <div class="p-5 flex items-start gap-4 hover:bg-gray-50 transition-colors {{ $item->status == 'Diterima' ? 'bg-blue-50/30' : '' }}">
                            
                            {{-- Ikon Notifikasi Berdasarkan Status --}}
                            <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center 
                                @if($item->status == 'Diterima') bg-blue-100 text-blue-600
                                @elseif($item->status == 'Diterima_Unit') bg-yellow-100 text-yellow-600
                                @elseif($item->status == 'Lulus_Magang') bg-green-100 text-green-600
                                @elseif($item->status == 'Ditolak_Unit') bg-red-100 text-red-600
                                @else bg-gray-100 text-gray-600 @endif">
                                
                                @if($item->status == 'Diterima') <i class="fa-solid fa-user-plus"></i>
                                @elseif($item->status == 'Diterima_Unit') <i class="fa-solid fa-spinner"></i>
                                @elseif($item->status == 'Lulus_Magang') <i class="fa-solid fa-check"></i>
                                @elseif($item->status == 'Ditolak_Unit') <i class="fa-solid fa-xmark"></i>
                                @else <i class="fa-solid fa-info"></i> @endif
                            </div>

                            {{-- Pesan Notifikasi --}}
                            <div class="flex-1">
                                <p class="text-sm text-gray-800">
                                    @if($item->status == 'Diterima')
                                        Pengajuan magang baru atas nama <span class="font-bold">{{ $item->nama }}</span> ({{ $item->universitas }}) telah diteruskan oleh SDM.
                                    @elseif($item->status == 'Diterima_Unit')
                                        Anda baru saja menerima pengajuan <span class="font-bold">{{ $item->nama }}</span>. Silakan proses di tahap Review.
                                    @elseif($item->status == 'Lulus_Magang')
                                        Anda telah menyetujui (meluluskan) magang untuk <span class="font-bold">{{ $item->nama }}</span>.
                                    @elseif($item->status == 'Ditolak_Unit')
                                        Anda telah menolak pengajuan magang dari <span class="font-bold">{{ $item->nama }}</span>.
                                    @else
                                        Pembaruan status untuk <span class="font-bold">{{ $item->nama }}</span>: menjadi {{ $item->status }}.
                                    @endif
                                </p>
                                <span class="text-xs text-gray-400 mt-1 block"><i class="fa-regular fa-clock mr-1"></i> {{ $item->updated_at ? $item->updated_at->diffForHumans() : 'Beberapa saat yang lalu' }}</span>
                            </div>
                            
                            {{-- Tanda titik biru untuk pesan baru --}}
                            @if($item->status == 'Diterima')
                                <div class="w-2 h-2 rounded-full bg-blue-600 mt-2"></div>
                            @endif
                        </div>
                    @empty
                        <div class="p-10 text-center text-gray-400">
                            <i class="fa-regular fa-bell-slash text-4xl mb-3 text-gray-300"></i>
                            <p>Belum ada notifikasi saat ini.</p>
                        </div>
                    @endforelse
                </div>

                {{-- PAGINATION --}}
                @if(isset($notifikasi) && $notifikasi instanceof \Illuminate\Pagination\LengthAwarePaginator && $notifikasi->hasPages())
                    <div class="mt-6">
                        {{ $notifikasi->links() }}
                    </div>
                @endif

            </div>
        </div>
    </main>
</body>
</html>