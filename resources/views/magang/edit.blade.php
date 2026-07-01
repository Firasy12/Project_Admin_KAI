<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa - E-Magang KAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f4f6f9] text-gray-800 min-h-screen py-10 px-4 sm:px-6 lg:px-8 flex justify-center items-start">

    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden">
        
        {{-- Header Form --}}
        <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between bg-white relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-500 via-blue-600 to-blue-800"></div>
            
            <div>
                <h2 class="text-xl font-bold text-gray-900">Edit Data Mahasiswa</h2>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi dan status pendaftaran magang</p>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 shrink-0">
                <i class="fa-solid fa-user-pen text-xl"></i>
            </div>
        </div>

        {{-- Form Mulai --}}
        <form action="{{ route('magang.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Informasi Pribadi --}}
            <div class="mb-8">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">Informasi Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <input type="text" name="nama_mahasiswa" value="{{ $pendaftar->nama_mahasiswa }}" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Induk Mahasiswa (NIM) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-regular fa-id-card"></i>
                            </div>
                            <input type="text" name="nim" value="{{ $pendaftar->nim }}" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <input type="email" name="email" value="{{ $pendaftar->email ?? '' }}" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp / HP</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <input type="text" name="no_hp" value="{{ $pendaftar->no_hp ?? '' }}" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800">
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Data Akademik --}}
            <div class="mb-8">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">Data Akademik</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Universitas / Perguruan Tinggi <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <input type="text" name="universitas" value="{{ $pendaftar->universitas }}" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Program Studi / Jurusan <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <input type="text" name="jurusan" value="{{ $pendaftar->jurusan }}" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: Status & Dokumen --}}
            <div class="mb-8">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">Status & Dokumen</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Penerimaan</label>
<select name="status_penerimaan" class="form-select">
    <option value="Menunggu" {{ $pendaftar->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
    <option value="Diterima" {{ $pendaftar->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
    <option value="Ditolak" {{ $pendaftar->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
</select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Magang</label>
                        <select name="status_magang" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm text-gray-800 appearance-none cursor-pointer">
                            <option value="" {{ empty($pendaftar->status_magang) ? 'selected' : '' }}>Menunggu</option>
                            <option value="Berjalan" {{ $pendaftar->status_magang == 'Berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                            <option value="Selesai" {{ $pendaftar->status_magang == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Proposal (PDF)</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-gray-400 mb-2"></i>
                                    <p class="mb-1 text-sm text-gray-500"><span class="font-semibold text-blue-600">Klik untuk unggah</span> atau seret file ke sini</p>
                                    <p class="text-xs text-gray-400">Biarkan kosong jika tidak ingin mengganti file proposal lama</p>
                                </div>
                                <input type="file" name="file_proposal" accept=".pdf" class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                <a href="{{ url('/sdm/dashboard') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors text-sm">
                    Batal & Kembali
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-colors flex items-center text-sm">
                    <i class="fa-regular fa-floppy-disk mr-2"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</body>
</html>