<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }}</title>

    {{-- Memuat CSS/JS yang dibangun oleh Vite. Bootstrap dimasukkan melalui app.js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Pengaturan sidebar */
        #wrapper {
            min-height: 100vh;
        }

        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            transition: all .3s;
        }

        #sidebar-wrapper.toggled {
            margin-left: -250px;
        }

        .nav-link.active {
            background-color: #f8f9fa;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        {{-- Sidebar kiri --}}
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom py-4 px-3 text-center fw-bold">
                {{ config('app.name', 'DTO-TOOLS') }}
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}"
                    class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.users') }}"
                    class="list-group-item list-group-item-action {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users me-2"></i> User Approvals
                </a>
                {{-- Menu perencanaan (nonaktif sementara) --}}
                <a href="#" class="list-group-item list-group-item-action disabled">
                    <i class="fa-solid fa-file-code me-2"></i> JSON Editor
                </a>
                <a href="#" class="list-group-item list-group-item-action disabled">
                    <i class="fa-solid fa-keyboard me-2"></i> Config Editor
                </a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Logout
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>

        {{-- Konten halaman --}}
        <div id="page-content-wrapper">
            {{-- Navbar atas --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-outline-primary" id="sidebarToggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    {{-- Search bar --}}
                    <form class="d-none d-md-flex ms-3 w-50" role="search">
                        <input class="form-control" type="search" placeholder="Search">
                    </form>
                    {{-- Dropdown profil di kanan --}}
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/32" alt="Avatar" class="rounded-circle me-2">
                                {{ auth()->user()->name ?? 'User' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">Logout</a>
                                    <form id="logout-form2" action="{{ route('logout') }}" method="POST"
                                        style="display:none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- Tempat konten utama --}}
            <main class="container-fluid py-4">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Script toggle sidebar --}}
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar-wrapper').classList.toggle('toggled');
        });
    </script>
</body>

</html>
