<aside class="sidebar w-64 bg-slate-900 text-white flex flex-col">
  {{-- Header --}}
  <div class="flex items-center justify-between px-6 py-4 border-b border-slate-700">
    <a href="{{ route('dashboard') }}" class="font-bold text-lg tracking-wide">DTO-TOOLS</a>
    <button type="button" class="text-slate-300 hover:text-white" title="Collapse sidebar" data-toggle-sidebar>
      <i class="fa-solid fa-angles-left chev"></i>
    </button>
  </div>

  @php
    // active helper: cocokkan route name atau path
    $is = function(array $rules) {
      foreach ($rules as $r) {
        if (request()->routeIs($r) || request()->is($r)) return true;
      }
      return false;
    };
    // class item menu (aktif vs tidak)
    function itemClass($active) {
      return 'item group flex items-center gap-3 px-3 py-2 rounded-md transition '
           . ($active
              ? 'bg-slate-800 text-indigo-300 border-l-4 border-indigo-500'
              : 'text-slate-300 hover:text-white hover:bg-slate-800');
    }
  @endphp

  <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
    {{-- Home --}}
    @php $active = $is(['dashboard', '/', 'home', 'dashboard*']); @endphp
    <a href="{{ route('dashboard') }}"
       class="{{ itemClass($active) }}" title="Home">
      <i class="fa-solid fa-house w-5 text-base"></i>
      <span class="label">Home</span>
    </a>

    {{-- Admin --}}
    @if(auth()->user()?->is_admin)
      <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400 label">Admin</div>
      @php $active = $is(['admin.users*','admin/users*']); @endphp
      <a href="{{ (Route::has('admin.users') ? route('admin.users') : url('/admin/users')) }}"
         class="{{ itemClass($active) }}" title="User Approvals">
        <i class="fa-solid fa-users-gear w-5 text-base"></i>
        <span class="label">User Approvals</span>
      </a>
    @endif

    {{-- Editors --}}
    <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400 label">Editors</div>

    @php $active = $is(['editors.smartcard*','smartcard*']); @endphp
    <a href="{{ Route::has('editors.smartcard') ? route('editors.smartcard') : url('/editors/smartcard') }}"
       class="{{ itemClass($active) }}" title="Smart Card">
      <i class="fa-solid fa-id-card-clip w-5 text-base"></i>
      <span class="label">Smart Card</span>
    </a>

    @php $active = $is(['editors.menu*','dashboard-menu*','menu*']); @endphp
    <a href="{{ Route::has('editors.menu') ? route('editors.menu') : url('/editors/menu') }}"
       class="{{ itemClass($active) }}" title="Dashboard Menu">
      <i class="fa-solid fa-table-cells-large w-5 text-base"></i>
      <span class="label">Dashboard Menu</span>
    </a>

    @php $active = $is(['editors.embedded*','embedded*']); @endphp
    <a href="{{ Route::has('editors.embedded') ? route('editors.embedded') : url('/editors/embedded-url') }}"
       class="{{ itemClass($active) }}" title="Embedded URL">
      <i class="fa-solid fa-link w-5 text-base"></i>
      <span class="label">Embedded URL</span>
    </a>

    @php $active = $is(['editors.payment*','payment*']); @endphp
    <a href="{{ Route::has('editors.payment') ? route('editors.payment') : url('/editors/payment-method') }}"
       class="{{ itemClass($active) }}" title="Payment Method">
      <i class="fa-solid fa-credit-card w-5 text-base"></i>
      <span class="label">Payment Method</span>
    </a>

    {{-- Lainnya --}}
    <div class="mt-4 mb-1 uppercase tracking-wider text-[11px] text-slate-400 label">Lainnya</div>

    @php $active = $is(['support*']); @endphp
    <a href="{{ Route::has('support') ? route('support') : url('/support') }}"
       class="{{ itemClass($active) }}" title="Support">
      <i class="fa-regular fa-circle-question w-5 text-base"></i>
      <span class="label">Support</span>
    </a>

    <form action="{{ Route::has('logout') ? route('logout') : url('/logout') }}" method="POST" class="mt-1">
      @csrf
      <button type="submit" class="w-full text-left {{ itemClass(false) }}" title="Logout">
        <i class="fa-solid fa-right-from-bracket w-5 text-base"></i>
        <span class="label">Logout</span>
      </button>
    </form>
  </nav>
</aside>
