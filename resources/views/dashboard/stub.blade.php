@extends('layouts.dashboard')

@section('page_title',
    ucfirst(
    str($title ?? request()->path())->after('/')->value() ?:
    'Page',
    ))

@section('content')
    <div class="p-5 bg-white border rounded-3">
        <h5 class="mb-1">Placeholder Page</h5>
        <div class="text-muted">Silakan ganti file ini dengan konten halaman Anda.</div>
    </div>
@endsection
