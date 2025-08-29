<aside class="side" id="side">
    {{-- Header logo & toggle --}}
    <div class="side-head">
        <button class="side-toggle" id="sideToggle" title="Toggle sidebar">
            <svg viewBox="0 0 24 24" width="22" height="22">
                <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    fill="none" />
            </svg>
        </button>
        <div class="brand">
            <span class="logo-dot"></span>
            <span class="brand-text">DTO‑TOOLS</span>
        </div>
    </div>

    <nav class="side-nav">
        {{-- Home --}}
        <a href="{{ route('dashboard') }}"
            class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="ico"><i class="fa-solid fa-house"></i></span>
            <span class="tx">Home</span>
        </a>

        {{-- Admin --}}
        @if (auth()->user()->is_admin)
            <div class="nav-label">Admin</div>
            <a href="{{ route('admin.users') }}"
                class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <span class="ico"><i class="fa-solid fa-users"></i></span>
                <span class="tx">User Approvals</span>
            </a>
        @endif

        {{-- Editors --}}
        <div class="nav-label">Editors</div>
        <a href="{{ url('/app/smart-card') }}"
            class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->is('app/smart-card*') ? 'active' : '' }}">
            <span class="ico"><i class="fa-solid fa-layer-group"></i></span>
            <span class="tx">Smart Card</span>
        </a>
        <a href="{{ url('/app/dashboard-menu') }}"
            class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->is('app/dashboard-menu*') ? 'active' : '' }}">
            <span class="ico"><i class="fa-solid fa-bars"></i></span>
            <span class="tx">Dashboard Menu</span>
        </a>
        <a href="{{ url('/app/embedded-url') }}"
            class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->is('app/embedded-url*') ? 'active' : '' }}">
            <span class="ico"><i class="fa-solid fa-link"></i></span>
            <span class="tx">Embedded URL</span>
        </a>
        <a href="{{ url('/app/payment-method') }}"
            class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->is('app/payment-method*') ? 'active' : '' }}">
            <span class="ico"><i class="fa-solid fa-credit-card"></i></span>
            <span class="tx">Payment Method</span>
        </a>

        {{-- Lainnya --}}
        <div class="nav-label">Lainnya</div>
        <a href="{{ url('/support') }}"
            class="nav-item flex items-center gap-3 px-3 py-2 rounded-md transition {{ request()->is('support*') ? 'active' : '' }}">
            <span class="ico"><i class="fa-solid fa-circle-question"></i></span>
            <span class="tx">Support</span>
        </a>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}" class="nav-item as-form">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-3 py-2 rounded-md">
                <span class="ico"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                <span class="tx">Logout</span>
            </button>
        </form>
    </nav>
</aside>
