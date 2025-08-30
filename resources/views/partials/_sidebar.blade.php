@php
    // Helper sederhana untuk status "active" di menu
    function is_active($patterns)
    {
        foreach ((array) $patterns as $p) {
            if (request()->routeIs($p)) {
                return 'active';
            }
        }
        return '';
    }
@endphp

<aside id="sidebar">
    <div class="brand">
        <span class="logo"><i class="bi bi-lightning-charge-fill"></i></span>
        <span class="brand-text">{{ config('app.name', 'Accusoft') }}</span>
    </div>

    <nav class="mt-3">
        <a href="{{ route('dashboard') }}" class="nav-link {{ is_active('dashboard') }}">
            <i class="nav-icon bi bi-speedometer2"></i>
            <span class="nav-label">Dashboard</span>
        </a>

        <a href="{{ route('customers.index') }}" class="nav-link {{ is_active('customers.*') }}">
            <i class="nav-icon bi bi-people"></i>
            <span class="nav-label">Customers</span>
        </a>

        <a href="{{ route('projects.index') }}" class="nav-link {{ is_active('projects.*') }}">
            <i class="nav-icon bi bi-kanban"></i>
            <span class="nav-label">Projects</span>
        </a>

        <a href="{{ route('orders.index') }}" class="nav-link {{ is_active('orders.*') }}">
            <i class="nav-icon bi bi-bag-check"></i>
            <span class="nav-label">Orders</span>
        </a>

        <a href="{{ route('inventory.index') }}" class="nav-link {{ is_active('inventory.*') }}">
            <i class="nav-icon bi bi-box-seam"></i>
            <span class="nav-label">Inventory</span>
        </a>

        <a href="{{ route('accounts.index') }}" class="nav-link {{ is_active('accounts.*') }}">
            <i class="nav-icon bi bi-wallet2"></i>
            <span class="nav-label">Accounts</span>
        </a>

        <a href="{{ route('tasks.index') }}" class="nav-link {{ is_active('tasks.*') }}">
            <i class="nav-icon bi bi-check2-square"></i>
            <span class="nav-label">Tasks</span>
        </a>
    </nav>
</aside>
