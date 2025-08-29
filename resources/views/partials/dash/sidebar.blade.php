<aside class="side" id="side">
  <div class="side-head">
    <button class="side-toggle" id="sideToggle" title="Toggle sidebar">
      {{-- burger icon --}}
      <svg viewBox="0 0 24 24" width="22" height="22">
        <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
      </svg>
    </button>
    <div class="brand">
      <span class="logo-dot"></span>
      <span class="brand-text">DTO-TOOLS</span>
    </div>
  </div>

  <nav class="side-nav">
    <a href="{{ route('dashboard') }}" class="nav-item active">
      <span class="ico">{!! svg('home') !!}</span><span class="tx">Home</span>
    </a>

    @if(auth()->user()->is_admin)
      <div class="nav-label">Admin</div>
      <a href="{{ route('admin.users') }}" class="nav-item">
        <span class="ico">{!! svg('users') !!}</span><span class="tx">User Approvals</span>
      </a>
    @endif

    <div class="nav-label">Editors</div>
    <a href="{{ url('/app/smart-card') }}" class="nav-item">
      <span class="ico">{!! svg('layers') !!}</span><span class="tx">Smart Card</span>
    </a>
    <a href="{{ url('/app/dashboard-menu') }}" class="nav-item">
      <span class="ico">{!! svg('menu') !!}</span><span class="tx">Dashboard Menu</span>
    </a>
    <a href="{{ url('/app/embedded-url') }}" class="nav-item">
      <span class="ico">{!! svg('link') !!}</span><span class="tx">Embedded URL</span>
    </a>
    <a href="{{ url('/app/payment-method') }}" class="nav-item">
      <span class="ico">{!! svg('credit') !!}</span><span class="tx">Payment Method</span>
    </a>

    <div class="nav-label">Lainnya</div>
    <a href="#" class="nav-item">
      <span class="ico">{!! svg('help') !!}</span><span class="tx">Support</span>
    </a>

    <form method="POST" action="{{ route('logout') }}" class="nav-item as-form">
      @csrf
      <button type="submit">
        <span class="ico">{!! svg('logout') !!}</span><span class="tx">Logout</span>
      </button>
    </form>
  </nav>
</aside>

@once
  @php
    function svg($name){
      $icons = [
        'home' => 'M3 11l9-7 9 7v9a2 2 0 0 1-2 2h-4v-6H9v6H5a2 2 0 0 1-2-2z',
        'users'=> 'M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z',
        'layers'=>'M12 2l9 4-9 4-9-4 9-4zm0 8l9 4-9 4-9-4 9-4zm0 8l9 4-9 4-9-4 9-4z',
        'menu'  =>'M3 6h18M3 12h18M3 18h18',
        'link'  =>'M10 13a5 5 0 0 0 7 0l2-2a5 5 0 1 0-7-7l-1 1M14 11a5 5 0 0 0-7 0l-2 2a5 5 0 1 0 7 7l1-1',
        'credit'=>'M2 7h20v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7zm0-2h20v2H2V5zm4 10h6',
        'help'  =>'M12 18h.01M9 9a3 3 0 1 1 6 0c0 2-3 2-3 4',
        'logout'=>'M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9',
        'bell'  =>'M15 17H9a3 3 0 0 1-3-3V9a6 6 0 1 1 12 0v5a3 3 0 0 1-3 3z M13 21a1 1 0 1 1-2 0',
        'search'=>'M21 21l-4.35-4.35M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16z',
        'user'  =>'M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5zm0 2c-5 0-9 2.5-9 5v1h18v-1c0-2.5-4-5-9-5z',
      ];
      return '<svg viewBox="0 0 24 24" width="18" height="18"><path d="'.$icons[$name].'" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    }
  @endphp
@endonce
