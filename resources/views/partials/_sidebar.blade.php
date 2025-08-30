<aside id="sidebar">
    <div class="brand">
        <span class="logo"><i class="bi bi-lightning-charge-fill"></i></span>
        <span class="brand-text">{{ config('app.name', 'DTO Tools') }}</span>
    </div>

    <nav class="mt-3">
        @if (auth()->user()->is_admin)
            {{-- ADMIN: Dashboard collapsible --}}
            <a href="javascript:void(0)"
                class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs(['dashboard', 'admin.users']) ? 'active' : '' }}"
                data-nav-toggle data-target="#navDashboard"
                aria-expanded="{{ request()->routeIs(['dashboard', 'admin.users']) ? 'true' : 'false' }}"
                aria-controls="navDashboard">
                <i class="nav-icon bi bi-speedometer2"></i>
                <span class="nav-label flex-grow-1 text-start">Dashboard</span>
                <i class="bi bi-caret-down ms-auto"></i>
            </a>

            <div class="nav-collapse {{ request()->routeIs(['dashboard', 'admin.users']) ? 'show' : '' }}"
                id="navDashboard">
                <a href="{{ route('dashboard') }}"
                    class="nav-link ps-5 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-house"></i>
                    <span class="nav-label">Overview</span>
                </a>

                <a href="{{ route('admin.users', ['status' => 'pending']) }}"
                    class="nav-link ps-5 {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-hourglass-split"></i>
                    <span class="nav-label">User Management</span>
                </a>
            </div>
        @else
            {{-- USER BIASA: hanya link dashboard --}}
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer2"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        @endif
    </nav>
</aside>
