<aside class="w-64 bg-slate-900 text-white flex flex-col">
    <div class="flex items-center justify-between px-6 py-4 border-b border-slate-700">
        <span class="font-bold text-lg">DTO‑TOOLS</span>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->routeIs('dashboard') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
            <i class="fa-solid fa-house w-5 h-5"></i><span>Home</span>
        </a>
        @if (auth()->user()?->is_admin)
            <a href="{{ route('admin.users') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->routeIs('admin.users') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
                <i class="fa-solid fa-users w-5 h-5"></i><span>User Approvals</span>
            </a>
        @endif
        <a href="{{ url('/app/smart-card') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/smart-card*') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
            <i class="fa-solid fa-layer-group w-5 h-5"></i><span>Smart Card</span>
        </a>
        <a href="{{ url('/app/dashboard-menu') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/dashboard-menu*') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
            <i class="fa-solid fa-bars w-5 h-5"></i><span>Dashboard Menu</span>
        </a>
        <a href="{{ url('/app/embedded-url') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/embedded-url*') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
            <i class="fa-solid fa-link w-5 h-5"></i><span>Embedded URL</span>
        </a>
        <a href="{{ url('/app/payment-method') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('app/payment-method*') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
            <i class="fa-solid fa-credit-card w-5 h-5"></i><span>Payment Method</span>
        </a>
        <a href="{{ url('/support') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800 {{ request()->is('support*') ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500' : '' }}">
            <i class="fa-solid fa-circle-question w-5 h-5"></i><span>Support</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="flex">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
                <i class="fa-solid fa-arrow-right-from-bracket w-5 h-5"></i><span>Logout</span>
            </button>
        </form>
    </nav>
</aside>
