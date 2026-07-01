<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Masuk - Admin Unit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#f4f6f9] text-gray-800">
    <div class="flex h-screen">
        {{-- Sidebar (Sama dengan Dashboard Unitmu) --}}
        <aside class="w-64 bg-white border-r border-gray-100 flex flex-col shrink-0">
            <div class="pt-8 pb-6 flex flex-col items-center justify-center px-4">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI" class="h-10 mb-2">
                <p class="text-[10px] text-gray-500 text-center font-medium">SISTEM INFORMASI MAGANG</p>
            </div>
            <nav class="flex-1 px-6 space-y-2 mt-4">
                <a href="{{ url('/unit/dashboard') }}" class="flex items-center text-gray-500 py-2 hover:text-blue-700">
                    <i class="fa-solid fa-house w-6"></i> <span class="ml-2 text-sm font-medium">Dashboard</span>
                </a>
                <a href="{{ url('/unit/pengajuan-masuk') }}" class="flex items-center text-blue-700 py-2 font-bold">
                    <i class="fa-solid fa-file-lines w-6"></i> <span class="ml-2 text-sm">Pengajuan Masuk</span>
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-8 overflow-y-auto">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Pengajuan Masuk (Admin Unit)</h2>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#1a3668] text-white text-xs">
                        <tr>
                            <th class="px-6 py-4">Nama</th>
                            <th class="px-6 py-4">Universitas</th>
                            <th class="px-6 py-4">Jurusan</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($pengajuan as $item)
                        <tr class="text-sm">
                            <td class="px-6 py-4 font-bold">{{ $item->nama }}</td>
                            <td class="px-6 py-4">{{ $item->universitas }}</td>
                            <td class="px-6 py-4">{{ $item->jurusan }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-yellow-100 text-yellow-800 text-[10px] font-bold px-3 py-1 rounded-full">Perlu Review</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold hover:bg-green-700">Terima</button>
                                <button class="bg-red-600 text-white px-3 py-1 rounded text-xs font-bold hover:bg-red-700">Tolak</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-400">Belum ada pengajuan masuk dari SDM.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>