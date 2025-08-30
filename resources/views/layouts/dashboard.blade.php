<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @hasSection('page_title')
            @yield('page_title') - {{ config('app.name') }}
        @else
            {{ config('navigation.titles')[\Illuminate\Support\Facades\Route::currentRouteName()] ?? 'Dashboard' }}
            - {{ config('app.name') }}
        @endif
    </title>

    {{-- Asset utama + CSS/JS dashboard + entry page (opsional via stack) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dashboard.css', 'resources/js/dashboard.js'])

    {{-- Tambahan style khusus halaman --}}
    @stack('styles')
</head>

<body class="{{ session('sidebar_collapsed') ? 'sidebar-collapsed' : '' }}">
    <div id="wrapper">
        @include('partials._sidebar')

        <div id="content">
            @include('partials._topbar')

            <main class="container-body">
                {{-- judul halaman opsional --}}
                @hasSection('page_title')
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="mb-0">@yield('page_title')</h4>
                        @hasSection('page_actions')
                            <div>@yield('page_actions')</div>
                        @endif
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Tambahan script khusus halaman --}}
    @stack('scripts')
</body>

</html>
