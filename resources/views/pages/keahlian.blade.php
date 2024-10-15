@extends('layouts.sidebar')

@section('content')
    {{-- Header --}}
    <div class="mb-5">
        <h1 class="text-3xl font-medium uppercase mb-2 text-primary">
            Data Keahlian
        </h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <i class="bx bx-chevron-right text-xl"></i>
            <a href="#" class="hover:text-blue-600">Data Keahlian</a>
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
                <p class="font-medium">Type:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="Jenis">Jenis</option>
                    <option value="Name">Name</option>
                    <option value="Date">Date</option>
                </select>
            </div>
            <div class="flex gap-2 items-center text-sm">
                <p class="font-medium">Level:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="N1">N1</option>
                    <option value="N2">N2</option>
                    <option value="N3">N3</option>
                    <option value="N4">N4</option>
                    <option value="N5">N5</option>
                </select>
            </div>
            <!-- Sort By Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-medium">Sort By:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="Last Edited">Last Edited</option>
                    <option value="New Edited">New Edited</option>
                    <option value="Oldest">Oldest</option>
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
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto bg-white border border-slate-300 rounded-md overflow-hidden shadow-lg">
            <thead>
                <tr class="text-slate-500 border-b">
                    <th class="px-4 py-2 text-center font-medium">No</th>
                    <th class="px-4 py-2 text-center font-medium">Nama</th>
                    <th class="px-4 py-2 text-center font-medium">NIM</th>
                    <th class="px-4 py-2 text-center font-medium">Program Studi</th>
                    <th class="px-4 py-2 text-center font-medium">Tingkat</th>
                    <th class="px-4 py-2 text-center font-medium">Semester</th>
                    <th class="px-4 py-2 text-center font-medium">Lingkup</th>
                    <th class="px-4 py-2 text-center font-medium">Keahlian</th>
                    <th class="px-4 py-2 text-center font-medium">Skor</th>
                    <th class="px-4 py-2 text-center font-medium">Tanggal Sertifikat</th>
                    <th class="px-4 py-2 text-center font-medium">Exp Sertifikat</th>
                    <th class="px-4 py-2 text-center font-medium">File Sertifikat</th>
                    <th class="px-4 py-2 text-center font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($mahasiswaData) > 0)
                    @foreach ($mahasiswaData as $index => $mahasiswa)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['nama'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['nim'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['prodi'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['tingkat'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['semester'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['lingkup'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['keahlian'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['skor'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['tgl_sertifikat'] }}</td>
                            <td class="px-4 py-2 text-center">{{ $mahasiswa['expire_sertifikat'] }}</td>
                            <td class="px-4 py-2 text-center">
                                @if($mahasiswa['file_sertifikat'])
                                    <a href="{{ $mahasiswa['file_sertifikat'] }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                @else
                                    <span class="text-gray-500">Tidak Ada File</span>
                                @endif
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
                        <td colspan="13" class="px-4 py-2 text-center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    

    <!-- Table -->

    {{-- Add Data Modal --}}
    <div id="addDataModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="bg-white w-[800px] p-5 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-primary">Create Data Keahlian</h2>
            <form action="{{ route('keahlian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <div class="mb-4 ">
                        <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                        <select name="tingkat" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            <option value="Nama 1">Nama 1</option>
                            <option value="Nama 2">Nama 2</option>
                            <option value="Nama 3">Nama 3</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="number" name="nim" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md" autocomplete="off"
                            inputmode="numeric">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Program Studi</label>
                        <select name="tingkat" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            <option value="Prodi 1">Prodi 1</option>
                            <option value="Prodi 2">Prodi 2</option>
                            <option value="Prodi 3">Prodi 3</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
                        <select name="tingkat" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Semester</label>
                        <select name="tingkat" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8 ">8 </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Lingkup</label>
                        <input type="text" name="lingkup" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Keahlian</label>
                        <input type="text" name="keahlian" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Skor</label>
                        <input type="number" name="skor" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md" min="0">
                    </div>
                    <div class="mb-4 ">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Sertifikat</label>
                        <input type="date" name="tgl_sertifikat" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 ">
                        <label class="block text-sm font-medium text-gray-700">Exp Sertifikat</label>
                        <input type="date" name="expire_sertifikat" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 ">
                        <label class="block text-sm font-medium text-gray-700">File Sertifikat</label>
                        <input type="file" name="file_sertifikat" required
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="button" onclick="document.getElementById('addDataModal').classList.add('hidden')"
                        class="px-4 py-2 bg-red-500 rounded-md text-white">Batal</button>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Add Data Modal --}}


    {{-- JS --}}
    <script>
        //  Script untuk mengontrol modal 
        function
        openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function
        closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
    {{-- JS --}}
@endsection
