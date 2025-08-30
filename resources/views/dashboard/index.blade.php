@extends('layouts.dashboard')

@section('page_title', 'Dashboard')

@section('page_actions')
    <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>New</a>
@endsection

@section('content')
    {{-- … pakai konten Anda yang kemarin (KPI, table, dsb) … --}}
    <div class="alert alert-light border">Ini contoh konten. Ganti dengan KPI + tabel Anda.</div>
@endsection

@push('styles')
    {{-- contoh style khusus halaman (opsional) --}}
    <style>
        .alert {
            background: #fff;
        }
    </style>
@endpush

@push('scripts')
    <script>
        /* JS khusus halaman kalau ada */
    </script>
@endpush
