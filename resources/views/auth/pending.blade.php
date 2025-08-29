@extends('layouts.auth')

@section('title', 'Pending Approval')

@section('right')
  <h1>Akun Belum Disetujui</h1>
  <p style="margin:20px 0;">
    Akun kamu masih menunggu persetujuan admin.<br>
    Silakan hubungi admin untuk diaktifkan.
  </p>
  @if(session('status'))
    <div style="color: red; margin-top: 10px;">{{ session('status') }}</div>
  @endif
@endsection
