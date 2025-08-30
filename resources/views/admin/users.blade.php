@extends('layouts.dashboard')
@section('page_title', 'User Management')

@section('content')
    <div class="card shadow-sm">
        {{-- Tabs --}}
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link {{ ($status ?? 'pending') === 'pending' ? 'active' : '' }}"
                        href="{{ route('admin.users', ['status' => 'pending']) }}">
                        Pending <span class="badge bg-secondary ms-1">{{ $counts['pending'] ?? 0 }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($status ?? '') === 'active' ? 'active' : '' }}"
                        href="{{ route('admin.users', ['status' => 'active']) }}">
                        Active <span class="badge bg-secondary ms-1">{{ $counts['active'] ?? 0 }}</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Table --}}
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:60px">#</th>
                            <th>Username</th>
                            <th>Created</th>
                            <th class="text-end" style="width:320px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $i => $u)
                            <tr>
                                <td>{{ method_exists($users, 'firstItem') ? $users->firstItem() + $i : $loop->iteration }}
                                </td>
                                <td class="fw-semibold">{{ $u->username }}</td>
                                <td><small class="text-muted">{{ optional($u->created_at)->format('Y-m-d H:i') }}</small>
                                </td>
                                <td class="text-end">
                                    @if (($status ?? 'pending') === 'pending')
                                        {{-- APPROVE --}}
                                        <form action="{{ route('admin.users.approve', $u) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button class="btn btn-success btn-sm">
                                                <i class="bi bi-check2 me-1"></i>Approve
                                            </button>
                                        </form>

                                        {{-- REJECT (hapus user pending) --}}
                                        <form action="{{ route('admin.users.reject', $u) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus pendaftaran user ini?');">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-x-circle me-1"></i>Reject
                                            </button>
                                        </form>
                                    @else
                                        {{-- RESET PASSWORD --}}
                                        <form action="{{ route('admin.users.reset_password', $u) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Reset password user ini?');">
                                            @csrf
                                            <button class="btn btn-warning btn-sm">
                                                <i class="bi bi-arrow-repeat me-1"></i>Reset Password
                                            </button>
                                        </form>

                                        {{-- DELETE USER --}}
                                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Hapus user ini?');">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if (method_exists($users, 'hasPages') && $users->hasPages())
            <div class="card-footer">{{ $users->links() }}</div>
        @endif
    </div>

    {{-- Flash messages --}}
    @php
        $flashType = session('error')
            ? 'danger'
            : (session('info')
                ? 'info'
                : (session('success')
                    ? 'success'
                    : (session('status')
                        ? 'success'
                        : null)));
        $flashMsg = session('error') ?? (session('info') ?? (session('success') ?? session('status')));
    @endphp
    @if ($flashType && $flashMsg)
        <div class="alert alert-{{ $flashType }} mt-3">{{ $flashMsg }}</div>
    @endif
@endsection
