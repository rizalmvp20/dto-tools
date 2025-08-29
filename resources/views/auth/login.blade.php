@extends('layouts.auth')

@section('title', 'Login — DTO TOOLS')

@section('right')
@include('partials.brand')

  <h1>Punten Ser!</h1>
  <p class="sub">Welcome to DTO-TOOLS</p>

  @if (session('status'))
    <div style="color:#16a34a;margin-bottom:10px;font-size:14px;">{{ session('status') }}</div>
  @endif
  @if ($errors->any())
    <div style="color:#ef4444;margin-bottom:10px;font-size:14px;">
      @foreach ($errors->all() as $e)• {{ $e }}<br>@endforeach
    </div>
  @endif

  <form class="auth-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
      <input type="text" name="username" placeholder="Username" autocomplete="username" required>
    </div>
    <div class="field with-hint">
      <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
      <a class="hint" href="{{ route('password.forgot') }}">Forgot password ?</a>
    </div>

    <button class="btn btn-primary" type="submit">Login</button>

    <p class="foot">Don’t have an account? <a href="{{ route('register.show') }}">Sign up</a></p>
  </form>
@endsection
