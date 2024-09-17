@extends('layouts.sidebar')

@section('content')
    {{-- Header --}}
    <div class="mb-5">
        <h1 class="text-3xl font-medium uppercase mb-2 text-primary">
            Data Mahasiswa
        </h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <i class="bx bx-chevron-right text-xl"></i>
            <a href="#" class="hover:text-blue-600">Data Mahasiswa</a>
        </p>
    </div>
    {{-- Header --}}

    <!-- Search -->
    <div class="mb-5 relative">
        <img src="{{ asset('images/search.svg') }}" class="absolute top-1 left-2">
        <input type="search"
            class="w-[300px] p-2 pl-10 bg-transparent border border-indigo-900 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
            placeholder="Nama Mahasiswa" />
    </div>
    <!-- Search -->


    {{-- FIlter --}}
    <div class="mb-5 flex gap-4 justify-between items-center">
        <!-- Section for Type and Sort By -->
        <div class="flex gap-4">
            <!-- Type Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-semibold">Type:</p>
                <select class="px-2 py-1 border border-gray-300 rounded-lg">
                    <option value="NIM">NIM</option>
                    <option value="Name">Name</option>
                    <option value="Date">Date</option>
                </select>
            </div>
            <!-- Sort By Dropdown -->
            <div class="flex gap-2 items-center text-sm">
                <p class="font-semibold">Sort By:</p>
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
            <div class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer ">
                <img src="{{ asset('images/view-all.svg') }}" alt="View All Icon" class="w-7">
                <a href="" class="font-medium text-sm text-primary">View All</a>
            </div>
            <!-- Create Button -->
            <div class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer ">
                <img src="{{ asset('images/create.svg') }}" alt="Create Icon" class="w-7">
                <a href="" class="font-medium text-sm text-primary">Create</a>
            </div>
        </div>
    </div>
    {{-- FIlter --}}


    <!-- Table -->
    <table class="min-w-full table-auto bg-white border border-slate-300 rounded-md overflow-hidden shadow-lg">
        <thead>
            <tr class="text-slate-500 border-b">
                <th class="px-4 py-2 text-center font-medium">No</th>
                <th class="px-4 py-2 text-center font-medium">Nama Mahasiswa</th>
                <th class="px-4 py-2 text-center font-medium">NIM</th>
                <th class="px-4 py-2 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td class="px-4 py-2 ">1</td>
                <td class="px-4 py-2 ">Jaydon Passaquindici Arcand</td>
                <td class="px-4 py-2 ">2312010005</td>
                <td class="px-4 py-2  text-center" x-data="{ open: false }" @click.away="open = false">
                    <!-- Button Trigger Dropdown -->
                    <button @click="open = !open">
                        <span>Action</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" class="mt-2 bg-white border border-gray-300 rounded-md shadow-lg absolute right-14">
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
