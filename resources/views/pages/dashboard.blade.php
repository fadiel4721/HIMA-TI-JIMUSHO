@extends('layouts.sidebar')

@section('content')

    {{-- Header --}}
    <div class="mb-5">
        <h1 class="text-3xl font-medium uppercase mb-2 text-primary">
            Dashboard
        </h1>
        <p class="text-slate-500 flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <i class="bx bx-chevron-right text-xl"></i>
        </p>
    </div>
    {{-- Header --}}

    <div class="grid grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="w-full h-auto bg-white rounded-xl space-y-1 p-4 shadow-md">
            <div class="flex items-center gap-2">
                <i class='bx bxs-user text-xl text-primary'></i>
                <p class="text-lg font-medium text-gray-700">Data Mahasiswa</p>
            </div>
            <div class="flex items-center gap-4 mt-2">
                <h1 class="text-3xl font-medium text-primary">1250</h1>
                <p class="outline outline-2 outline-primary px-2 py-1 rounded-full text-sm text-primary flex items-center gap-1">
                    <i class='bx bx-up-arrow-alt'></i>250
                </p>
            </div>
            <p class="text-sm text-gray-500">250 than last month</p>
        </div>
    
        <!-- Card 2 -->
        <div class="w-full h-auto bg-white rounded-xl p-4 shadow-md space-y-1">
            <div class="flex items-center gap-2">
                <i class='bx bxs-user text-xl text-primary'></i>
                <p class="text-lg font-medium text-gray-700">Program Studi</p>
            </div>
            <div class="text-sm">
                <p class="text-blue-500 ">300 <span class="text-slate-500">Bahasa Jepang</span></p>
                <p class="text-blue-500 ">300 <span class="text-slate-500">Teknologi Informasi</span></p>
                <p class="text-blue-500 ">300 <span class="text-slate-500">Mekatronika</span></p>
                <p class="text-blue-500 ">300 <span class="text-slate-500">Bisnis Digital</span></p>
            </div>
        </div>
    
        <!-- Card 3 -->
        <div class="w-full h-auto bg-white rounded-xl p-4 shadow-md space-y-1">
            <div class="flex items-center gap-2">
                <i class='bx bxs-user text-xl text-primary'></i>
                <p class="text-lg font-medium text-gray-700">Kompetensi</p>
            </div>
        </div>
    
        <!-- Card 4 -->
        <div class="w-full h-auto bg-white rounded-xl p-4 shadow-md space-y-1">
            
        </div>
    </div>
    
@endsection