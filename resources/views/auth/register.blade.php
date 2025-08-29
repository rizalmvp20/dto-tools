@extends('layouts.auth')
@php($showActions = false)

@section('title', 'Register — DTO TOOLS')

@section('right')
@include('partials.brand')

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

    <div class="agree-row">
      <input id="agreement" type="checkbox" name="agreement" value="1" required {{ old('agreement') ? 'checked' : '' }}>
      <label for="agreement">Siap menegakkan solat 5 waktu</label>
    </div>
    @error('agreement')
      <div class="field-error">{{ $message }}</div>
    @enderror

    <button class="btn btn-primary" type="submit" style="margin-top:16px;">Daftar</button>

    <div class="foot">
        Sudah punya akun?
        <a href="{{ route('login.show') }}">Login</a>
    </div>
  </form>
@endsection
