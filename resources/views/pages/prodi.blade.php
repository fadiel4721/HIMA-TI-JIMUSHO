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
            Data Program Studi
        </h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <i class="bx bx-chevron-right text-xl"></i>
            <a href="#" class="hover:text-blue-600">Data Prodi</a>
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
            <div onclick="document.getElementById('createDataModal').classList.remove('hidden')"
                class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer">
                <img src="{{ asset('images/create.svg') }}" alt="Create Icon" class="w-7">
                <a href="#" class="font-medium text-sm text-primary">Create</a>
            </div>
        </div>
    </div>
    {{-- Filter --}}

    <!-- Table -->
    <table class="min-w-full table-auto bg-white border border-slate-300 rounded-md overflow-hidden shadow-lg">
        <thead>
            <tr class="text-slate-500 border-b">
                <th class="px-4 py-2 text-center font-medium">No</th>
                <th class="px-4 py-2 text-center font-medium">Nama Prodi</th>
                <th class="px-4 py-2 text-center font-medium">Tingkat</th>
                <th class="px-4 py-2 text-center font-medium">Semester</th>
                <th class="px-4 py-2 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodis as $index => $prodi)
                <tr class="text-center">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $prodi['prodi'] }}</td>
                    <td class="px-4 py-3">{{ $prodi['tingkat'] }}</td>
                    <td class="px-4 py-3">{{ $prodi['semester'] }}</td>
                    <td class="px-4 py-3">
                        <a onclick="document.getElementById('editDataModal{{ $prodi['id'] }}').classList.remove('hidden')"
                            href="#" class="">
                            <i class='bx bxs-edit text-xl'></i>
                        </a>
                    </td>
                </tr>

                {{-- Edit Data Modal --}}
                <div id="editDataModal{{ $prodi['id'] }}"
                    class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
                    <div class="bg-white w-1/3 p-5 rounded-lg shadow-lg">
                        <h2 class="text-xl font-semibold mb-4 text-primary">Edit Program Studi</h2>
                        <form action="{{ route('prodi.update', $prodi['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nama Prodi</label>
                                <input type="text" name="nama" value="{{ old('nama', $prodi['prodi']) }}" required
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Tingkat</label>
                                <input type="number" name="tingkat" value="{{ old('tingkat', $prodi['tingkat']) }}" required
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Semester</label>
                                <input type="number" name="semester" value="{{ old('semester', $prodi['semester']) }}"
                                    required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                            </div>
                            <div class="flex justify-end">
                                <button type="button"
                                    onclick="document.getElementById('editDataModal{{ $prodi['id'] }}').classList.add('hidden')"
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

    {{-- Create Data Modal --}}
    <div id="createDataModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="bg-white w-1/3 p-5 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-primary">Tambah Program Studi</h2>
            <form action="{{ route('prodi.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Prodi</label>
                    <input type="text" name="nama" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tingkat</label>
                    <input type="number" name="tingkat" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Semester</label>
                    <input type="number" name="semester" required
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="document.getElementById('createDataModal').classList.add('hidden')"
                        class="px-4 py-2 bg-red-500 rounded-md text-white">Batal</button>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Create Data Modal --}}




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
@endsection
