<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Hanya statistik user non-admin
        $pendingCount = User::where('is_admin', false)->where('is_approved', false)->count();
        $activeCount  = User::where('is_admin', false)->where('is_approved', true)->count();

        // ⬇️ PENTING: kembalikan view 'dashboard.index'
        return view('dashboard.index', compact('pendingCount', 'activeCount'));
    }
}
