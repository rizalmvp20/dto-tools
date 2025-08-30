@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Route;

    // 1) Ambil judul dari section jika ada
    $explicitTitle = trim($__env->yieldContent('page_title'));

    // 2) Atau dari config route->label
    $routeName = Route::currentRouteName();
    $map = config('navigation.titles', []);
    $mappedTitle = $map[$routeName] ?? null;

    // 3) Fallback terakhir: rapikan nama route jadi judul
    $fallbackTitle = $routeName ? Str::headline(Str::after($routeName, '.') ?: $routeName) : 'Dashboard';

    $pageTitle = $explicitTitle ?: ($mappedTitle ?: $fallbackTitle);

    $username = auth()->user()->username ?? 'User';
@endphp

<header id="topbar">
    <button id="btnSidebar" class="btn btn-outline-secondary">
        <i class="bi bi-list"></i>
    </button>

    <div class="fw-semibold">{{ $pageTitle }}</div>

    <div class="search-wrap">
        <form class="search-box input-group" method="GET" action="{{ route('dashboard') }}">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input name="q" class="form-control" type="search" placeholder="Search pages, tools…"
                value="{{ request('q') }}">
        </form>
    </div>

    <div class="dropdown ms-auto">
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{-- Avatar placeholder (ikon Bootstrap), anti-broken --}}
            <span class="avatar-36 bg-secondary-subtle text-secondary me-2">
                <i class="bi bi-person-fill"></i>
            </span>
            <div class="text-end d-none d-md-block">
                <div class="fw-semibold">{{ $username }}</div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                    Logout
                </a>
                <form id="logout-form-top" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
        </ul>
    </div>
</header>
