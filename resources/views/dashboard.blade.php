@extends('layouts.auth')

@section('title','Dashboard')

@section('right')
  <div class="brand-row">
    <div class="brand">DTO-TOOLS</div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="chip solid" type="submit">Logout</button>
    </form>
  </div>

  <h1>Halo, {{ auth()->user()->username }}</h1>
  <p class="sub">Selamat datang di dashboard.</p>

  <div style="margin-top:20px;padding:16px;border:1px solid #eee;border-radius:12px;">
    <b>Status:</b>
    @if(auth()->user()->is_admin)
      Admin ✔
    @else
      Member
    @endif
    · Approved: {{ auth()->user()->is_approved ? 'Ya' : 'Belum' }}
  </div>
@endsection
