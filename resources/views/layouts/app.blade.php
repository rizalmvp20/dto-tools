<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'DTO-TOOLS' }}</title>

  {{-- Vite assets (pastikan npm run dev/jit jalan) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Font Awesome (ikon) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-M9uU4y9gZRhqUWLWyd4InENcy+XK6u+YIY7qDpiRnbV0wOYAV/QXp1S8MaqkOawxjUY8ailqXF/w3vGN9VOGIA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="antialiased text-slate-800 bg-gray-50">
  @yield('content')
</body>
</html>
