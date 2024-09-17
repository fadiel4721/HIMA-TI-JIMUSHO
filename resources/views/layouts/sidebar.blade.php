<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logo-mini.png') }}" type="image/x-icon">
    <title>Jimusho - Admin</title>

    <!-- Boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Aset CSS menggunakan Laravel Mix atau Vite -->
    @vite('resources/css/app.css')

    <style>
        #sidebar {
            transition: width 0.3s;
        }

        #sidebar.collapsed {
            width: 60px;
        }

        #main-content {
            transition: margin-left 0.3s;
        }

        #main-content.collapsed {
            margin-left: 60px;
        }

        .nav-item.collapsed h1 {
            display: none;
        }

        .nav-item i {
            transition: font-size 0.3s;
        }

        .nav-item.collapsed i {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="fixed">
        <div id="sidebar" class="w-[223px] h-[100vh] bg-white">
            <!-- Sidebar Header -->
            <div class="p-5 text-center border-b-2 relative">
                <div id="sidebar-title" class="flex gap-2">
                    <img src="{{ asset('images/logo-mini.png') }}" width="30">
                    <img id="sidebar-logo" src="{{ asset('images/logo.png') }}" width="150" alt="Logo" />
                </div>
                <div>
                    <i id="toggle-button" class="bx bx-chevron-left text-2xl absolute -right-4 px-1 rounded-full shadow bg-white cursor-pointer"></i>
                </div>
            </div>

            <!-- Sidebar Links -->
            <div class="py-5">
                <nav id="nav-links" class="space-y-3">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="nav-item flex items-center gap-[16px] px-4 py-2 rounded-l-3xl 
                        {{ request()->routeIs('dashboard') ? 'bg-[#F6F6F8]' : 'text-slate-600' }}">
                        <i class='bx bxs-dashboard text-2xl text-primary'></i>
                        <h1 class="text-[16px]">Dashboard</h1>
                    </a>
                
                    <!-- Mahasiswa -->
                    <a href="{{ route('mahasiswa') }}" class="nav-item flex items-center gap-[16px] px-4 py-2 rounded-l-3xl 
                        {{ request()->routeIs('mahasiswa') ? 'bg-[#F6F6F8] text-primary' : 'text-slate-600' }}">
                        <i class='bx bxs-user text-2xl text-primary'></i>
                        <h1 class="text-[16px]">Mahasiswa</h1>
                    </a>
                
                    <!-- Program Studi -->
                    <a href="{{ route('prodi') }}" class="nav-item flex items-center gap-[16px] px-4 py-2 rounded-l-3xl 
                        {{ request()->routeIs('prodi') ? 'bg-[#F6F6F8] text-primary' : 'text-slate-600' }}">
                        <i class='bx bxs-graduation text-2xl text-primary'></i>
                        <h1 class="text-[16px]">Program Studi</h1>
                    </a>
                
                    <!-- Kompetensi -->
                    <a href="{{ route('kompetensi') }}" class="nav-item flex items-center gap-[16px] px-4 py-2 rounded-l-3xl 
                        {{ request()->routeIs('kompetensi') ? 'bg-[#F6F6F8] text-primary' : 'text-slate-600' }}">
                        <i class='bx bxs-certification text-2xl text-primary'></i>
                        <h1 class="text-[16px]">Kompetensi</h1>
                    </a>
                
                    <!-- Keahlian -->
                    <a href="{{ route('keahlian') }}" class="nav-item flex items-center gap-[16px] px-4 py-2 rounded-l-3xl 
                        {{ request()->routeIs('keahlian') ? 'bg-[#F6F6F8] text-primary' : 'text-slate-600' }}">
                        <i class='bx bxs-briefcase text-2xl text-primary'></i>
                        <h1 class="text-[16px]">Keahlian</h1>
                    </a>
                </nav>
                
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div id="main-content" class="ml-[230px] p-5">
        @yield('content')
    </div>

    @vite('resources/js/sidebar.js')
</body>

</html>
