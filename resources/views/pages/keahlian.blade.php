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
            <div class="px-5 py-1 outline outline-2 outline-primary rounded-lg flex gap-2 items-center cursor-pointer">
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
                <th class="px-4 py-2 text-center font-medium">Linkup</th>
                <th class="px-4 py-2 text-center font-medium">Keahlian</th>
                <th class="px-4 py-2 text-center font-medium">Sertifikat</th>
                <th class="px-4 py-2 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">123456</td>
                <td class="px-4 py-2">456789</td>
                <td class="px-4 py-2">Internasional</td>
                <td class="px-4 py-2">Komputer</td>
                <td class="px-4 py-2">
                    <a href="javascript:void(0)" onclick="openModal('modal-sertifikat')" class="flex justify-center">
                        <img src="{{ asset('images/sertifikat.png') }}" alt="Sertifikat" width="50">
                    </a>
                </td>
                <td class="px-4 py-2 text-center" x-data="{ open: false }" @click.away="open = false">
                    <!-- Button Trigger Dropdown -->
                    <button @click="open = !open">
                        <span>Action</span>
                        <i class='bx bxs-chevron-down'></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" class="mt-2 bg-white border border-gray-300 rounded-md shadow-lg absolute right-5">
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

            {{-- Jika Tidak Ada Data --}}
            {{-- <tr >
                <td colspan="7" class="px-4 py-2 text-center text-gray-500">No Data</td>
            </tr> --}}
        </tbody>
    </table>
    <!-- Table -->

    <!-- Modal -->
    <div id="modal-sertifikat" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-5 rounded-lg">
            <button onclick="closeModal('modal-sertifikat')" class="flex items-center mb-2 text-xl"><i class='bx bx-arrow-back pe-2 text-3xl '></i>Kembali</button>
            <img src="{{ asset('images/sertifikat.png') }}" alt="Sertifikat" class="w-full max-w-lg">
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-5 flex justify-end">
        <nav aria-label="Pagination" class="flex items-center space-x-2">
            <!-- Previous Button -->
            <a href="#" class="px-3 py-2 border rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700"><i
                    class='bx bxs-chevron-left'></i></a>

            <!-- Page Numbers -->
            <a href="#" class="px-3 py-2 border rounded-md bg-blue-500 text-white">1</a>
            <a href="#" class="px-3 py-2 border rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700">2</a>
            <a href="#" class="px-3 py-2 border rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700">...</a>
            <a href="#" class="px-3 py-2 border rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700">9</a>
            <a href="#" class="px-3 py-2 border rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700">10</a>

            <!-- Next Button -->
            <a href="#" class="px-3 py-2 border rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700"><i
                    class='bx bxs-chevron-right'></i></a>
        </nav>
    </div>
    <!-- Pagination -->

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
