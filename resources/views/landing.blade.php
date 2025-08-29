<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>DTO Tools — Welcome</title>
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
  <!-- BACKGROUND bergambar & rounded di tepi layar -->
  <div class="viewport-bg"></div>

  <main class="outer">
    <div class="card">
      <!-- LEFT -->
      <section class="left-hero" id="leftHero">
        <div class="hero-frame">
          <header class="hero-top">
            <div class="hero-title">Selected Works</div>
            <nav class="hero-actions">
              <a class="chip ghost" href="{{ route('register.show') }}">Sign Up</a>
              <a class="chip solid" href="{{ route('register.show') }}">Join Us</a>
            </nav>
          </header>

          <footer class="hero-bottom">
            <div class="profile">
              <div class="avatar"></div>
              <div>
                <strong>Andrew.ui</strong>
                <small>UI &amp; Illustration</small>
              </div>
            </div>
            <div class="slider">
              <button class="dot" id="prevBtn" aria-label="Prev">‹</button>
              <button class="dot" id="nextBtn" aria-label="Next">›</button>
            </div>
          </footer>
        </div>
      </section>

      <!-- RIGHT -->
      <section class="right-auth overlap">
        <div class="brand-row">
          <div class="brand">DTO-TOOLS</div>
          <div class="lang-pill">🌐 <span>SERKUH!</span></div>
        </div>

        <h1>Punten Ser!</h1>
        <p class="sub">Welcome to DTO-TOOLS</p>

        <form class="auth-form" method="POST" action="{{ url('/login') }}">
          @csrf

          <div class="field">
            <input type="email" name="email" placeholder="Email" autocomplete="username" required>
          </div>

          <div class="field">
            <div class="with-hint">
              <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
              <a class="hint" href="{{ route('login.show') }}">Forgot password ?</a>
            </div>
          </div>

          <button class="btn btn-primary" type="submit">Login</button>

          <p class="foot">
            Don’t have an account?
            <a href="{{ route('register.show') }}">Sign up</a>
          </p>
        </form>
      </section>
    </div>
  </main>

  <script>
  (function(){
    const hero = document.getElementById('leftHero');
    const imgs = [
      "https://images.unsplash.com/photo-1535223289827-42f1e9919769?q=80&w=1600&auto=format&fit=crop",
      "https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1600&auto=format&fit=crop",
      "https://images.unsplash.com/photo-1472214103451-9374bd1c798e?q=80&w=1600&auto=format&fit=crop"
    ];
    let i=0;
    function setBg(){ hero.style.setProperty('--hero-img', `url("${imgs[i]}")`); }
    setBg();
    document.getElementById('prevBtn').onclick = () => { i=(i-1+imgs.length)%imgs.length; setBg(); };
    document.getElementById('nextBtn').onclick = () => { i=(i+1)%imgs.length; setBg(); };
  })();
  </script>
</body>
</html>
