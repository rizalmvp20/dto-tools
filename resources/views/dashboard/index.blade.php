@extends('layouts.dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div class="row g-3 mb-4">
        {{-- Pending --}}
        <div class="col-12 col-md-6">
            <a href="{{ route('admin.users', ['status' => 'pending']) }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 kpi-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-muted d-block mb-1">Users waiting approval</small>
                            <h2 class="display-6 fw-bold mb-0">{{ $pendingCount }}</h2>
                        </div>
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>
            </a>
        </div>

        {{-- Active --}}
        <div class="col-12 col-md-6">
            <a href="{{ route('admin.users', ['status' => 'active']) }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 kpi-card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-muted d-block mb-1">Active users</small>
                            <h2 class="display-6 fw-bold mb-0">{{ $activeCount }}</h2>
                        </div>
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
