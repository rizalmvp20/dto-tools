<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>@yield('title', 'DTO TOOLS')</title>
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
  @stack('head')
</head>
<body>
  {{-- Background luar --}}
  <div class="viewport-bg"></div>

  <main class="outer">
    <div class="card">
      {{-- PANEL KIRI (gambar+frame) --}}
      @include('partials.left-hero', ['showActions' => $showActions ?? true])

      {{-- PANEL KANAN (diisi halaman masing-masing) --}}
      <section class="right-auth overlap">
        @yield('right')
      </section>
    </div>
  </main>

  {{-- Slider gambar kiri --}}
  <script>
    (function(){
      const hero = document.getElementById('leftHero');
      if(!hero) return;
      const imgs = [
        "https://images.unsplash.com/photo-1535223289827-42f1e9919769?q=80&w=1600&auto=format&fit=crop",
        "https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1600&auto=format&fit=crop",
        "https://images.unsplash.com/photo-1472214103451-9374bd1c798e?q=80&w=1600&auto=format&fit=crop"
      ];
      let i=0;
      function setBg(){ hero.style.setProperty('--hero-img', `url("${imgs[i]}")`); }
      setBg();
      const prev=document.getElementById('prevBtn'), next=document.getElementById('nextBtn');
      if(prev) prev.onclick = () => { i=(i-1+imgs.length)%imgs.length; setBg(); };
      if(next) next.onclick = () => { i=(i+1)%imgs.length; setBg(); };
    })();
  </script>

  @stack('body')
</body>
</html>
