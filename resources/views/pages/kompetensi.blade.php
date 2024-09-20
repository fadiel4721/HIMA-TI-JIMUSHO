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
                <th class="px-4 py-2 text-center font-medium">ID Mahasiswa</th>
                <th class="px-4 py-2 text-center font-medium">ID Prodi</th>
                <th class="px-4 py-2 text-center font-medium">Bahasa</th>
                <th class="px-4 py-2 text-center font-medium">Jenis</th>
                <th class="px-4 py-2 text-center font-medium">Level</th>
                <th class="px-4 py-2 text-center font-medium">Skor</th>
                <th class="px-4 py-2 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">123456</td>
                <td class="px-4 py-2">7890</td>
                <td class="px-4 py-2">Bahasa Jepang</td>
                <td class="px-4 py-2">Listening</td>
                <td class="px-4 py-2">N4</td>
                <td class="px-4 py-2">85</td>
                <td class="px-4 py-2 text-center" x-data="{ open: false }" @click.away="open = false">
                    <!-- Button Trigger Dropdown -->
                    <button @click="open = !open" class="relative">
                        <span>Action</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" class="mt-2 bg-white border border-gray-300 rounded-md shadow-lg absolute right-8">
                        <ul class="px-2 py-2 space-y-1">
                            <!-- Edit Item -->
                            <li
                                class="text-left rounded-md transition-colors duration-200 hover:bg-green-600 hover:text-white">
                                <a href="#" class="flex items-center gap-2 px-3 py-1 text-gray-700 hover:text-white">
                                    <i class='bx bxs-edit text-xl'></i>
                                    <span>Edit</span>
                                </a>
                            </li>
                            <!-- Delete Item -->
                            <li
                                class="text-left rounded-md transition-colors duration-200 hover:bg-red-600 hover:text-white">
                                <a href="#" class="flex items-center gap-2 px-3 py-1 text-gray-700 hover:text-white">
                                    <i class='bx bxs-trash-alt text-xl'></i>
                                    <span>Delete</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Table -->

    {{-- Create Data Modal --}}
    <div id="createDataModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="bg-white w-1/2 p-5 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-primary">Tambah Kompetensi</h2>
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">ID Kompetensi</label>
                            <input type="text" name="id_kompetensi" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">ID Prodi</label>
                            <input type="number" name="id_prodi" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Bahasa</label>
                            <input type="text" name="bahasa" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Jenis</label>
                            <input type="text" name="jenis" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Level</label>
                            <input type="text" name="level" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Skor</label>
                            <input type="number" name="skor" required
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button"
                        onclick="document.getElementById('createDataModal').classList.add('hidden')"
                        class="px-4 py-2 bg-red-500 text-white rounded-md mr-2">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Create Data Modal --}}
@endsection
