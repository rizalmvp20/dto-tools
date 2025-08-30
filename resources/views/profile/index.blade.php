@extends('layouts.dashboard')
@section('page_title', 'Profile')

@section('content')
    @php $me = auth()->user(); @endphp

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Ganti Nama / Username</div>
                <div class="card-body">
                    <form action="{{ route('profile.update_name') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" value="{{ old('username', $me?->username) }}"
                                class="form-control @error('username') is-invalid @enderror" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Ganti Password</div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Password Saat Ini</label>
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button class="btn btn-warning">
                            <i class="bi bi-arrow-repeat me-1"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $msg = session('success') ?? (session('status') ?? session('error'));
        $type = session('error') ? 'danger' : 'success';
    @endphp
    @if ($msg)
        <div class="alert alert-{{ $type }} mt-3">{{ $msg }}</div>
    @endif
@endsection
