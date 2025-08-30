@extends('layouts.dashboard')
@section('page_title', 'JSON Editor · smartCardV2.json')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header fw-semibold">
            <i class="bi bi-filetype-json me-2"></i>smartCardV2.json
        </div>
        <div class="card-body">
            <p class="text-muted mb-3">
                Placeholder halaman editor smartCardV2.json untuk semua user yang sudah login & approved.
            </p>

            <div class="alert alert-info">
                Nanti kita bisa tambahkan editor (textarea + validasi JSON + tombol simpan).
                Untuk sekarang halaman ini hanya penanda rute & menu.
            </div>
        </div>
    </div>
@endsection
