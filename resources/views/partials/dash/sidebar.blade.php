<aside class="w-64 bg-slate-900 text-white flex flex-col">
  <div class="flex items-center justify-between px-6 py-4 border-b border-slate-700">
    <span class="font-bold text-lg">DTO-TOOLS</span>
  </div>

  <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
      <i class="fa-solid fa-house w-5"></i> <span>Home</span>
    </a>

    @if(auth()->user() && auth()->user()->is_admin)
      <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400">Admin</div>
      <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
        <i class="fa-solid fa-users w-5"></i> <span>User Approvals</span>
      </a>
    @endif

    <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400">Editors</div>
    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
      <i class="fa-solid fa-layer-group w-5"></i> <span>Smart Card</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
      <i class="fa-solid fa-bars-progress w-5"></i> <span>Dashboard Menu</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
      <i class="fa-solid fa-link w-5"></i> <span>Embedded URL</span>
    </a>
    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
      <i class="fa-solid fa-credit-card w-5"></i> <span>Payment Method</span>
    </a>

    <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400">Lainnya</div>
    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
      <i class="fa-regular fa-circle-question w-5"></i> <span>Support</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-md hover:bg-slate-800">
        <i class="fa-solid fa-right-from-bracket w-5"></i> <span>Logout</span>
      </button>
    </form>
  </nav>
</aside>
