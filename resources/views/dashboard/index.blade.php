@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        {{-- Baris statistik --}}
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <h2 class="fw-bold">54</h2>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Projects</h5>
                        <h2 class="fw-bold">79</h2>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <h2 class="fw-bold">124</h2>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm text-white" style="background-color:#f46293;">
                    <div class="card-body">
                        <h5 class="card-title">Income</h5>
                        <h2 class="fw-bold">$6k</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Konten utama --}}
        <div class="row g-4">
            {{-- Tabel proyek terbaru --}}
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Projects</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">See all</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td><span class="badge bg-warning">Review</span></td>
                                    </tr>
                                    <tr>
                                        <td>Web Development</td>
                                        <td>Frontend</td>
                                        <td><span class="badge bg-primary">In Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ushop App</td>
                                        <td>Mobile Team</td>
                                        <td><span class="badge bg-secondary">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td><span class="badge bg-warning">Review</span></td>
                                    </tr>
                                    <tr>
                                        <td>Web Development</td>
                                        <td>Frontend</td>
                                        <td><span class="badge bg-primary">In Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ushop App</td>
                                        <td>Mobile Team</td>
                                        <td><span class="badge bg-secondary">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar pelanggan baru --}}
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">New Customer</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">See all</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach (range(1, 4) as $i)
                                <li class="list-group-item d-flex align-items-center">
                                    <img src="https://via.placeholder.com/32" class="rounded-circle me-3" alt="Customer">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">Lewis S. Cunningham</div>
                                        <small class="text-muted">CEO Excerpt</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
