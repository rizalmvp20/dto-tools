@extends('layouts.auth')

@section('title', 'Register — DTO TOOLS')

@section('right')
  <div class="brand-row">
    <div class="brand">DTO-TOOLS</div>
    <div class="lang-pill">🌐 <span>ID</span></div>
  </div>

  <h1>Buat Akun</h1>
  <p class="sub">Selamat datang di DTO-TOOLS</p>

  {{-- error global --}}
  @if ($errors->any())
    <div style="color:#ef4444;margin-bottom:10px;font-size:14px;">
      @foreach ($errors->all() as $e)
        • {{ $e }}<br>
      @endforeach
    </div>
  @endif

  <form class="auth-form" method="POST" action="{{ route('register') }}">
    @csrf

    <div class="field">
      <input type="text" name="username" value="{{ old('username') }}"
             placeholder="Username" autocomplete="username" required>
      @error('username')<div style="color:#ef4444;font-size:12px;margin-top:4px;">{{ $message }}</div>@enderror
    </div>

    <div class="field">
      <input type="password" name="password" placeholder="Password"
             autocomplete="new-password" required>
      @error('password')<div style="color:#ef4444;font-size:12px;margin-top:4px;">{{ $message }}</div>@enderror
    </div>

    <div class="field">
      <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
             autocomplete="new-password" required>
    </div>

    <div class="row" style="align-items:center; gap:10px; margin-top:6px;">
      <label class="remember" style="display:flex;align-items:center;gap:10px;">
        <input type="checkbox" name="agreement" value="1" {{ old('agreement') ? 'checked' : '' }} required>
        <span>Siap menegakkan solat 5 waktu</span>
      </label>
      @error('agreement')<div style="color:#ef4444;font-size:12px;">{{ $message }}</div>@enderror
      <span style="flex:1"></span>
      <a class="a" href="{{ route('login.show') }}">Sudah punya akun? Login</a>
    </div>

    <button class="btn btn-primary" type="submit" style="margin-top:16px;">Daftar</button>
  </form>
@endsection
