<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Penerbitan Sertifikat</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6f9;
        }
    </style>

</head>

<body>

    <div class="min-h-screen bg-gradient-to-br from-sky-100 via-blue-100 to-slate-200 p-8">

        <div class="max-w-5xl mx-auto">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-[#00529b] to-[#003f78] rounded-3xl shadow-2xl p-8 text-white">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="uppercase tracking-[6px] text-orange-300 font-bold text-sm">
                            PT Kereta Api Indonesia
                        </p>

                        <h1 class="text-4xl font-black mt-2">
                            Penerbitan Sertifikat
                        </h1>

                        <p class="text-blue-100 mt-2">
                            Lengkapi data sertifikat mahasiswa yang telah menyelesaikan program magang.
                        </p>

                    </div>

                    <div class="w-28 h-28 bg-white rounded-3xl flex items-center justify-center shadow-xl">

                        <img src="{{ asset('images/logo-kai.png') }}" class="w-20">

                    </div>

                </div>

            </div>


            <div class="grid grid-cols-3 gap-6 mt-8">

                {{-- Biodata --}}
                <div class="col-span-1">

                    <div class="bg-white rounded-3xl shadow-xl p-6">

                        <div class="flex justify-center">

                            <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center">

                                <i class="fa-solid fa-user text-5xl text-[#00529b]"></i>

                            </div>

                        </div>

                        <h2 class="text-center font-black text-xl mt-5">
                            {{ $mahasiswa->nama }}
                        </h2>

                        <p class="text-center text-gray-500">
                            Mahasiswa Magang
                        </p>

                        <hr class="my-6">

                        <div class="space-y-4">

                            <div>

                                <div class="text-xs uppercase font-bold text-gray-400">
                                    Universitas
                                </div>

                                <div class="font-bold">
                                    {{ $mahasiswa->universitas }}
                                </div>

                            </div>

                            <div>

                                <div class="text-xs uppercase font-bold text-gray-400">
                                    Unit
                                </div>

                                <div class="font-bold">
                                    {{ $mahasiswa->unit_tujuan }}
                                </div>

                            </div>

                            <div>

                                <div class="text-xs uppercase font-bold text-gray-400">
                                    Periode
                                </div>

                                <div class="font-bold">
                                    {{ \Carbon\Carbon::parse($mahasiswa->tanggal_mulai)->format('d M Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($mahasiswa->tanggal_selesai)->format('d M Y') }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="col-span-2">

                    <div class="bg-white rounded-3xl shadow-xl p-8">

                        <div class="flex items-center mb-8">

                            <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-award text-orange-600 text-2xl"></i>

                            </div>

                            <div class="ml-4">

                                <h2 class="font-black text-2xl">

                                    Terbitkan Sertifikat

                                </h2>

                                <p class="text-gray-500">

                                    Pastikan data sudah benar sebelum menerbitkan.

                                </p>

                            </div>

                        </div>

                        <form action="{{ url('/unit/monitoring/' . $mahasiswa->id . '/sertifikat') }}" method="POST">

                            @csrf

                            <div>

                                <label class="font-bold text-gray-700">
                                    Nomor Sertifikat
                                </label>

                                <input type="text" name="nomor"
                                    value="KAI/{{ date('Y') }}/{{ sprintf('%04d', $mahasiswa->id) }}"
                                    class="mt-2 w-full rounded-2xl border p-4">

                            </div>

                            <div class="mt-6">

                                <label class="font-bold text-gray-700">
                                    Tanggal Terbit
                                </label>

                                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}"
                                    class="mt-2 w-full rounded-2xl border p-4">

                            </div>

                            <div class="mt-6">

                                <label class="font-bold text-gray-700">
                                    Ditandatangani Oleh
                                </label>

                                <input type="text" name="penandatangan" value="Manager Unit Sistem Informasi"
                                    class="mt-2 w-full rounded-2xl border p-4">

                            </div>

                            <div class="mt-10 flex justify-end gap-4">

                                <a href="/unit/monitoring" class="px-8 py-4 rounded-2xl bg-gray-200 font-bold">

                                    Batal

                                </a>

                                <button
                                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-orange-500 to-orange-600 text-white font-black shadow-xl">

                                    <i class="fa-solid fa-certificate mr-2"></i>

                                    Terbitkan Sertifikat

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>