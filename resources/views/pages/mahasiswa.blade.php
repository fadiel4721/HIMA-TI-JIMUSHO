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
        <h1 class="text-3xl font-medium uppercase mb-2 text-primary">Data Mahasiswa</h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <i class="bx bx-chevron-right text-xl"></i>
            <a href="#" class="hover:text-blue-600">Data Mahasiswa</a>
        </p>
    </div>
    {{-- Header --}}

    @if (session('success'))
        <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search -->
    <div class="mb-5 relative">
        <img src="{{ asset('images/search.svg') }}" class="absolute top-1 left-2">
        <input type="search"
            class="w-[300px] p-2 pl-10 bg-transparent border border-indigo-900 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
            placeholder="Nama Mahasiswa" />
    </div>
    <!-- Search -->

    {{-- Filter --}}
    <div class="mb-5 flex gap-4 justify-between items-center">
        <div class="flex gap-4">
            <!-- Type Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-semibold">Type:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="NIM">NIM</option>
                    <option value="Name">Name</option>
                    <option value="Date">A - Z</option>
                </select>
            </div>
            <!-- Sort By Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-semibold">Sort By:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="Name">New Edited</option>
                    <option value="Date">Oldest</option>
                </select>
            </div>
            <div class="flex gap-2 items-center">
                <p>Hide Data</p>
                <input type="checkbox" id="hideNonAktif">
            </div>            
        </div>
        <div class="flex gap-4">
            <!-- View All Button -->
            <div class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer">
                <img src="{{ asset('images/view-all.svg') }}" alt="View All Icon" class="w-7">
                <a href="#" class="font-medium text-sm text-primary">View All</a>
            </div>
            <!-- Create Button -->
            <button onclick="document.getElementById('addDataModal').classList.remove('hidden')"
                class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer">
                <img src="{{ asset('images/create.svg') }}" alt="Create Icon" class="w-7">
                <span class="font-medium text-sm text-primary">Create</span>
            </button>
        </div>
    </div>
    {{-- Filter --}}

    <!-- Table -->
    <table class="min-w-full table-auto bg-white border border-slate-300 rounded-md overflow-hidden shadow-lg">
        <thead>
            <tr class="text-slate-500 border-b">
                <th class="px-4 py-2 text-center font-medium">No</th>
                <th class="px-4 py-2 text-center font-medium">Nama Mahasiswa</th>
                <th class="px-4 py-2 text-center font-medium">NIM</th>
                <th class="px-4 py-2 text-center font-medium">Status</th>
                <th class="px-4 py-2 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $index => $mahasiswa)
                <tr class="text-center {{ $mahasiswa['status'] == 'Non Aktif' ? 'text-red-600' : '' }}">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $mahasiswa['nama'] }}</td>
                    <td class="px-4 py-3">{{ $mahasiswa['nim'] }}</td>
                    <td class="px-4 py-3">{{ $mahasiswa['status'] }}</td>
                    <td>
                        <a onclick="document.getElementById('editDataModal{{ $mahasiswa['id'] }}').classList.remove('hidden')"
                            href="#" class="">
                            <i class='bx bxs-edit text-xl'></i>
                        </a>
                    </td>
                </tr>

                {{-- Edit Data Modal --}}
                <div id="editDataModal{{ $mahasiswa['id'] }}"
                    class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
                    <div class="bg-white w-11/12 md:w-1/3 p-5 rounded-lg shadow-lg">
                        <h2 class="text-xl font-semibold mb-4 text-primary">Edit Data Mahasiswa</h2>
                        <form action="{{ route('mahasiswa.update', $mahasiswa['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                                <input type="text" name="nama" value="{{ old('nama', $mahasiswa['nama']) }}" required
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">NIM</label>
                                <input type="number" name="nim" value="{{ old('nim', $mahasiswa['nim']) }}" required
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
                                    autocomplete="off" inputmode="numeric">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                                    <option value="Aktif" {{ $mahasiswa['status'] == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Non Aktif" {{ $mahasiswa['status'] == 'Non Aktif' ? 'selected' : '' }}>
                                        Non Aktif</option>
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <button type="button"
                                    onclick="document.getElementById('editDataModal{{ $mahasiswa['id'] }}').classList.add('hidden')"
                                    class="px-4 py-2 bg-red-500 rounded-md text-white hover:bg-red-600 transition duration-200">Batal</button>
                                <button type="submit"
                                    class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Edit Data Modal --}}
            @endforeach
        </tbody>
    </table>
    <!-- Table -->

    {{-- Add Data Modal --}}
    <div id="addDataModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="bg-white w-11/12 md:w-1/3 p-5 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-primary">Tambah Mahasiswa</h2>
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                    <input type="text" name="nama" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="number" name="nim" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
                        autocomplete="off" inputmode="numeric">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out">
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non Aktif</option>
                    </select>
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
    {{-- Add Data Modal --}}
    
    <!-- Pagination -->
    <div class="mt-5 flex justify-end">
        <nav aria-label="Pagination" class="flex items-center space-x-2">
            <!-- Tombol Sebelumnya -->
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary"><i
                    class='bx bxs-chevron-left'></i></a>

            <!-- Halaman -->
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary">1</a>
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary">2</a>
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary">...</a>
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary">9</a>
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary">10</a>

            <!-- Tombol Selanjutnya -->
            <a href="#" class="px-2 py-1 border rounded-md outline outline-1 outline-primary"><i
                    class='bx bxs-chevron-right'></i></a>
        </nav>
    </div>
    <!-- Pagination -->

    {{-- JS --}}
    <script>
        document.getElementById('hideNonAktif').addEventListener('change', function() {
            const rows = document.querySelectorAll('tbody tr'); // Ambil semua baris di tabel
            let index = 1; // Inisialisasi nomor urut
    
            rows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(4)'); // Kolom ke-4 untuk status
                if (statusCell && statusCell.textContent.trim() === 'Non Aktif') {
                    if (this.checked) {
                        row.style.display = 'none'; // Sembunyikan baris jika checkbox diaktifkan
                    } else {
                        row.style.display = ''; // Tampilkan kembali jika checkbox dinonaktifkan
                    }
                } else {
                    row.style.display = ''; // Pastikan baris ditampilkan jika bukan "Non Aktif"
                    row.querySelector('td:nth-child(1)').textContent = index++; // Update nomor urut
                }
            });
        });
    </script>
    
    
@endsection
