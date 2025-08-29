@extends('layouts.auth')

@section('title','Lupa Password')

@php($showActions = false) {{-- sembunyikan tombol Sign Up/Join Us di panel kiri --}}

@section('right')
@include('partials.brand')

  <h1>Lupa Password?</h1>
  <p class="sub">Karena aplikasi internal ini tidak memakai email, pemulihan password dilakukan lewat admin.</p>

  <div style="border:1px solid #e5e7eb; border-radius:14px; padding:16px; margin-top:10px;">
    <ol style="margin:0; padding-left:18px; line-height:1.7;">
      <li>Catat <b>username</b> kamu.</li>
      <li>Hubungi admin untuk <b>reset password</b>.</li>
      <li>Admin akan memberikan password baru sementara.</li>
      <li>Setelah login, segera ganti password di <b>Menu &gt; Ganti Password</b>.</li>
    </ol>
  </div>

  <div style="display:flex; gap:12px; margin-top:16px;">
    {{-- Opsional: CTA WA/Slack internal --}}
    <a class="btn" href="{{ url('/') }}">Kembali ke Login</a>
    {{-- <a class="btn btn-primary" href="https://wa.me/62xxxxxxxxxx" target="_blank">Chat Admin</a> --}}
  </div>
@endsection
