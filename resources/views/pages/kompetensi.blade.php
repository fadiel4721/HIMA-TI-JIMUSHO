@extends('layouts.sidebar')

@section('content')
    <style>
        /* Menghilangkan panah pada input type number */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            /* Untuk Firefox */
        }
    </style>

    {{-- Header --}}
    <div class="mb-5">
        <h1 class="text-3xl font-medium uppercase mb-2 text-primary">
            Data Kompetensi Bahasa
        </h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <i class="bx bx-chevron-right text-xl"></i>
            <a href="#" class="hover:text-blue-600">Data Kompetensi Bahasa</a>
        </p>
    </div>
    {{-- Header --}}

    <!-- Search -->
    <div class="mb-5 relative">
        <img src="{{ asset('images/search.svg') }}" class="absolute top-1 left-2">
        <input type="search"
            class="w-[300px] p-2 pl-10 bg-transparent border border-indigo-900 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
            placeholder="Cari..." />
    </div>
    <!-- Search -->

    {{-- Filter --}}
    <div class="mb-5 flex gap-4 justify-between items-center">
        <!-- Section for Type and Sort By -->
        <div class="flex gap-4">
            <!-- Type Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-medium">Tingkat:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="NIM">Tingkat</option>
                    <option value="Name">Name</option>
                    <option value="Date">Date</option>
                </select>
            </div>
            <div class="flex gap-2 items-center text-sm">
                <p class="font-medium">Semester:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="NIM">Semester</option>
                    <option value="Name">Name</option>
                    <option value="Date">Date</option>
                </select>
            </div>
            <!-- Sort By Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-medium">Sort By:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="NIM">Last Edited</option>
                    <option value="Name">New Edited</option>
                    <option value="Date">Oldest</option>
                </select>
            </div>
        </div>
        <!-- Buttons for View All and Create -->
        <div class="flex gap-4">
            <!-- View All Button -->
            <div class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer">
                <img src="{{ asset('images/view-all.svg') }}" alt="View All Icon" class="w-7">
                <a href="#" class="font-medium text-sm text-primary">View All</a>
            </div>
            <!-- Create Button -->
            <div onclick="document.getElementById('addDataModal').classList.remove('hidden')"
                class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer">
                <img src="{{ asset('images/create.svg') }}" alt="Create Icon" class="w-7">
                <a href="#" class="font-medium text-sm text-primary">Create</a>
            </div>
        </div>
    </div>
    {{-- Filter --}}

    <!-- Table -->
    <div class="overflow-x-auto rounded">
        <table class="min-w-full table-auto bg-white border border-slate-300 rounded-md overflow-hidden shadow-lg">
            <thead>
                <tr class="text-slate-500 border-b">
                    <th class="px-4 py-2 text-center font-medium">No</th>
                    <th class="px-4 py-2 text-center font-medium">Nama</th>
                    <th class="px-4 py-2 text-center font-medium">NIM</th>
                    <th class="px-4 py-2 text-center font-medium">Program Studi</th>
                    <th class="px-4 py-2 text-center font-medium">Tingkat</th>
                    <th class="px-4 py-2 text-center font-medium">Level</th>
                    <th class="px-4 py-2 text-center font-medium">Skor</th>
                    <th class="px-4 py-2 text-center font-medium">Bahasa</th>
                    <th class="px-4 py-2 text-center font-medium">Jenis Sertifikat</th>
                    <th class="px-4 py-2 text-center font-medium">Tanggal Sertifikat</th>
                    <th class="px-4 py-2 text-center font-medium">File Sertifikat</th>
                    <th class="px-4 py-2 text-center font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($mahasiswaData))
                    @foreach ($mahasiswaData as $index => $mahasiswa)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['nama'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['nim'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['prodi'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['tingkat'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['level'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['skor'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['type_bahasa'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['jenis'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['tgl_sertifikat'] }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ $mahasiswa['file_sertifikat'] }}" target="_blank"
                                    class="text-blue-600 hover:underline">Lihat</a>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <a href="#" class="text-green-600">
                                    <i class='bx bxs-edit text-xl'></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" class="px-4 py-2 text-center text-red-600">Tidak ada data yang tersedia.</td>
                    </tr>
                @endif
            </tbody>

        </table>

    </div>
    <!-- Table -->

    <div id="addDataModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="bg-white w-1/2 md:w-1/2 p-5 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-primary">Tambah Kompetensi</h2>
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                        <input type="text" name="mahasiswa[nama]" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="number" name="mahasiswa[nim]" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Prodi</label>
                        <select name="mahasiswa[prodi]" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                            <option value="">Pilih Prodi</option>
                            {{-- @foreach ($prodi as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->prodi }} - Tingkat {{ $p->tingkat }} - Semester {{ $p->semester }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>                                        
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Level</label>
                        <input type="text" name="level" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Skor</label>
                        <input type="number" name="skor" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
                        <input type="number" name="tingkat" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Type Bahasa</label>
                        <input type="text" name="type_bahasa" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jenis Sertifikat</label>
                        <input type="text" name="jenis" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Sertifikat</label>
                        <input type="date" name="tgl_sertifikat" 
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">File Sertifikat</label>
                        <input type="url" name="file_sertifikat"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="document.getElementById('addDataModal').classList.add('hidden')"
                        class="px-4 py-2 bg-red-500 rounded-md text-white hover:bg-red-600 transition duration-200">Batal</button>
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
