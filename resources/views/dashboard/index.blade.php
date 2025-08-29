@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col">
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-700">
                <span class="font-bold text-lg">DTO‑TOOLS</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
                <!-- Home -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->routeIs('dashboard') ? 'bg-slate-800' : '' }}">
                    <i class="fa-solid fa-house w-5"></i>
                    <span>Home</span>
                </a>
                <!-- User Approvals (hanya admin) -->
                @if (auth()->user()?->is_admin)
                    <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400">Admin</div>
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->routeIs('admin.users') ? 'bg-slate-800' : '' }}">
                        <i class="fa-solid fa-users w-5"></i>
                        <span>User Approvals</span>
                    </a>
                @endif
                <!-- Editors -->
                <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400">Editors</div>
                <a href="{{ url('/app/smart-card') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/smart-card*') ? 'bg-slate-800' : '' }}">
                    <i class="fa-solid fa-layer-group w-5"></i>
                    <span>Smart Card</span>
                </a>
                <a href="{{ url('/app/dashboard-menu') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/dashboard-menu*') ? 'bg-slate-800' : '' }}">
                    <i class="fa-solid fa-bars w-5"></i>
                    <span>Dashboard Menu</span>
                </a>
                <a href="{{ url('/app/embedded-url') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/embedded-url*') ? 'bg-slate-800' : '' }}">
                    <i class="fa-solid fa-link w-5"></i>
                    <span>Embedded URL</span>
                </a>
                <a href="{{ url('/app/payment-method') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/payment-method*') ? 'bg-slate-800' : '' }}">
                    <i class="fa-solid fa-credit-card w-5"></i>
                    <span>Payment Method</span>
                </a>
                <!-- Lainnya -->
                <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400">Lainnya</div>
                <a href="{{ url('/support') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('support*') ? 'bg-slate-800' : '' }}">
                    <i class="fa-solid fa-circle-question w-5"></i>
                    <span>Support</span>
                </a>
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                        <i class="fa-solid fa-arrow-right-from-bracket w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main area -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="flex justify-between items-center px-6 py-4 bg-white border-b">
                <div class="flex items-center w-full max-w-md">
                    <i class="fa-solid fa-magnifying-glass text-gray-500 mr-2"></i>
                    <input type="text" placeholder="Search pages, editors..."
                        class="w-full border border-gray-200 rounded-md px-3 py-1.5 focus:ring focus:ring-indigo-200 focus:border-indigo-400">
                </div>
                <div class="flex items-center gap-5">
                    <button class="relative">
                        <i class="fa-regular fa-bell w-6 h-6 text-gray-600"></i>
                        <span class="absolute -top-0.5 -right-0.5 block w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-2">
                        <img src="https://i.pravatar.cc/40" alt="profile" class="w-8 h-8 rounded-full">
                        <span class="text-sm text-gray-700">{{ auth()->user()->username ?? 'Admin' }}</span>
                    </div>
                </div>
            </header>

            <!-- Konten utama, salin dari tampilan sebelumnya -->
            <div class="p-6 flex-1 overflow-y-auto">
                <div class="page-title">
                    <h1>My Bookings</h1>
                    <div class="actions">
                        <input type="date" value="{{ now()->format('Y-m-d') }}">
                        <button class="btn">Download report</button>
                    </div>
                </div>

                <section class="card">
                    <div class="card-head">
                        <h3>Period overview</h3>
                        <div class="tabs">
                            <button class="tab active">Today</button>
                            <button class="tab">Earned</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">[Chart placeholder]</div>
                </section>

                <section class="grid-2">
                    <div class="card">
                        <h3>Arriving today</h3>
                        <ul class="list">
                            <li><span class="badge green">Approved</span> Valencia apartment · $580 · 12:00</li>
                            <li><span class="badge yellow">Pending</span> Night swimming pool · $1000 · 22:00</li>
                            <li><span class="badge green">Approved</span> Unique & Cozy studio · $384 · 16:40</li>
                        </ul>
                        <a href="#" class="link">Show all →</a>
                    </div>
                    <div class="card promo">
                        <div class="promo-box">
                            <div class="promo-title">Low occupancy?</div>
                            <div class="promo-sub">Create a last minute promotion to maximize</div>
                            <button class="btn">Create</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
