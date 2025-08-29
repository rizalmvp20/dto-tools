<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'DTO-TOOLS' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind (via Vite). Biarkan kedua baris ini jika kamu pakai Vite/npm run dev --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FONT AWESOME (ikon) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkfUco8S3vfsa+4r0u8L4CkzjXQ0C5X3Qol0QfZ7T4O2H5mC8mZ8wSx9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="antialiased text-slate-800 bg-gray-50">
    @yield('content')
</body>

</html>
