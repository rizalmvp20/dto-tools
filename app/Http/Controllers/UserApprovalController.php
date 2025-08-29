<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApprovalController extends Controller
{
    public function index()
    {
        // daftar user yang belum di-approve (bukan admin)
        $pending = User::where('is_approved', false)
                       ->where('is_admin', false)
                       ->get();

        // sementara, balikin teks sederhana biar cepat
        // return response()->json($pending);
        return view('admin.users', compact('pending'));
    }

    public function approve(User $user)
    {
        $user->update(['is_approved' => true]);
        return back()->with('status', 'User approved.');
    }
}
