<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApprovalController extends Controller
{
    public function index(Request $request)
    {
        // ?status=pending|active (default: pending)
        $status = $request->query('status', 'pending');

        $base = User::query()->where('is_admin', false);

        $pendingQ = (clone $base)->where('is_approved', false)->orderByDesc('created_at');
        $activeQ  = (clone $base)->where('is_approved', true)->orderBy('username');

        $counts = [
            'pending' => $pendingQ->count(),
            'active'  => $activeQ->count(),
        ];

        $users = $status === 'active'
            ? $activeQ->paginate(10)->withQueryString()
            : $pendingQ->paginate(10)->withQueryString();

        // view lama kamu: resources/views/admin/users.blade.php
        return view('admin.users', compact('users', 'status', 'counts'));
    }

    public function approve(User $user)
    {
        if ($user->is_admin) return back()->with('error', 'Tidak boleh mengubah admin.');
        if ($user->is_approved) return back()->with('info', 'User sudah active.');

        $user->is_approved = true;
        $user->save();

        return back()->with('success', "User {$user->username} di-approve.");
    }

    // Baru: reject = hapus user yang masih pending
    public function reject(User $user)
    {
        if ($user->is_admin) return back()->with('error', 'Tidak boleh menghapus admin.');
        if ($user->is_approved) return back()->with('error', 'User active tidak bisa di-reject.');

        $name = $user->username;
        $user->delete();

        return back()->with('success', "User {$name} dihapus (rejected).");
    }

    // Baru: delete = hapus user yang sudah active (misal sudah tidak bekerja)
    public function destroy(User $user)
    {
        if ($user->is_admin) return back()->with('error', 'Tidak boleh menghapus admin.');

        $name = $user->username;
        $user->delete();

        return back()->with('success', "User {$name} dihapus.");
    }
}
