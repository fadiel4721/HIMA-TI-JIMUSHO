@extends('layouts.sidebar')

@section('content')
    {{-- Header --}}
    <div class="mb-5">
        <h1 class="text-3xl font-medium uppercase mb-2 text-primary">
            Dashboard
        </h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
        </p>
    </div>
    {{-- Header --}}

    <div class="grid grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="w-full h-auto bg-white rounded-xl space-y-2 p-4 shadow-md">
            <div class="flex items-center gap-2">
                {{-- <i class='bx bxs-user text-xl text-primary'></i> --}}
                <img src="{{ asset('images/icon=mahasiswa.svg') }}" width="25">
                <p class="text-lg font-medium text-gray-700">Data Mahasiswa</p>
            </div>
            <div class="flex items-center gap-4 mt-2">
                <h1 class="text-3xl font-medium text-blue-500">1250</h1>
                <p
                    class="outline outline-2  outline-blue-500 px-2 py-1 rounded-full text-sm text-blue-500 flex items-center gap-1">
                    <i class='bx bx-up-arrow-alt'></i>250
                </p>
            </div>
            <p class="text-sm text-blue-500">250 <span class="text-gray-500">than last month</span></p>
        </div>

        <!-- Card 2 -->
        <div class="w-full h-auto bg-white rounded-xl p-4 shadow-md space-y-1">
            <div class="flex items-center gap-2">
                {{-- <i class='bx bxs-user text-xl text-primary'></i> --}}
                <img src="{{ asset('images/icon=prodi.svg') }}" width="25">
                <p class="text-lg font-medium text-gray-700">Program Studi</p>
            </div>
            <div class="flex items-center gap-2">
                <ul class="text-sm text-blue-500">
                    <li>110</li>
                    <li>90</li>
                    <li>100</li>
                    <li>70</li>
                </ul>
                <ul class="text-sm">
                    <li>Bahasa Jepang</li>
                    <li>Teknologi Informasi</li>
                    <li>Mekatronika</li>
                    <li>Bisnis Digital</li>
                </ul>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="w-full h-auto bg-white rounded-xl p-4 shadow-md space-y-2">
            <div class="flex items-center gap-2">
                {{-- <i class='bx bxs-user text-xl text-primary'></i> --}}
                <img src="{{ asset('images/icon=kompetensi.svg') }}" width="25">
                <p class="text-lg font-medium text-gray-700">Kompetensi</p>
            </div>
            <div class="flex items-center gap-4 mt-2">
                <h1 class="text-3xl font-medium text-blue-500">1020</h1>
                <p
                    class="outline outline-2 outline-blue-500 px-2 py-1 rounded-full text-sm text-primary flex items-center gap-1">
                    <i class='bx bx-up-arrow-alt'></i>20
                </p>
            </div>
            <p class="text-sm text-gray-500">+20 than last month</p>
        </div>

        <!-- Card 4 -->
        <div class="w-full h-auto bg-white rounded-xl p-4 shadow-md space-y-2">
            <div class="flex items-center gap-2">
                {{-- <i class='bx bxs-user text-xl text-primary'></i> --}}
                <img src="{{ asset('images/icon=keahlian.svg') }}" width="25">
                <p class="text-lg font-medium text-gray-700">Keahlian</p>
            </div>
            <div class="flex items-center gap-4 mt-2">
                <h1 class="text-3xl font-medium text-blue-500">1010</h1>
                <p
                    class="outline outline-2 outline-blue-500 px-2 py-1 rounded-full text-sm text-primary flex items-center gap-1">
                    <i class='bx bx-up-arrow-alt'></i>10
                </p>
            </div>
            <p class="text-sm text-gray-500">+10 than last month</p>
        </div>
    </div>

    {{-- Main Statistik --}}
    <div class="grid grid-cols-2 gap-6 mt-6">
        <div class="w-full h-[350px] bg-white rounded-xl p-4">
            <h1 class="text-xl font-medium text-primary">Data Mahasiswa</h1>
            <div class="flex justify-between items-center">
                <div class="mt-2">
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('images/biru.svg') }}" alt="">
                        <p>Mahasiswa aktif</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('images/merah.svg') }}" alt="">
                        <p>Mahasiswa non aktif</p>
                    </div>
                </div>
                <div class="relative">
                    <select name="" id=""
                        class="w-full p-2 pr-8 rounded bg-slate-100 text-black appearance-none">
                        <option value="" class="text-primary">Tahunan</option>
                        <option value="" class="text-primary">Bulanan</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Grafik --}}
            <div class="mt-4">
                <canvas id="mahasiswaChart" width="400" height="200"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="p-3 w-full bg-white rounded-xl">
                <h1 class="text-xl font-medium text-primary">Program Studi</h1>
            </div>
            <div class="p-3 w-full bg-white rounded-xl">
                <h1 class="text-xl font-medium text-primary">Kompetensi Bahasa</h1>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('mahasiswaChart').getContext('2d');   
        var mahasiswaChart = new Chart(ctx, {
            type: 'bar', // jenis grafik
            data: {
                labels: ['Mahasiswa Aktif', 'Mahasiswa Non-Aktif'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [100, 10], // contoh data
                    backgroundColor: ['#4A90E2', '#E74C3C'], // warna grafik
                    borderColor: ['#357ABD', '#C0392B'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // grafik dimulai dari 0
                    }
                }
            }
        });
    </script>
@endsection
