<header class="topbar">
  <div class="top-left">
    <form class="search">
      <span class="ico">@svg('search')</span>
      <input type="search" placeholder="Search pages, editors, config…" id="globalSearch">
    </form>
  </div>

  <div class="top-right">
    <button class="icon-btn" id="notifBtn" title="Notifications">
      @svg('bell')
      <span class="dot"></span>
    </button>

    <div class="profile" id="profileMenu">
      <button class="profile-btn">
        <img src="https://i.pravatar.cc/100?img=15" alt="avatar">
        <span class="name">{{ auth()->user()->username }}</span>
      </button>
      <div class="profile-dd">
        <a href="#">Profile</a>
        <a href="{{ route('password.change') }}">Change Password</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </div>
    </div>
  </div>
</header>
