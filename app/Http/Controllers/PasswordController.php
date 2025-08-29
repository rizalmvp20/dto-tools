<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    // Halaman info: “Hubungi admin”
    public function showForgot()
    {
        return view('auth.forgot');
    }

    // USER: Form ganti password
    public function showChange()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'current_password'      => ['required','string'],
            'password'              => ['required','string','min:6','confirmed'],
        ]);

        $user = $request->user();

        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.'])->withInput();
        }

        $user->password = $data['password']; // akan otomatis di-hash oleh mutator
        $user->save();

        return back()->with('status', 'Password berhasil diubah.');
    }

    // ADMIN: Reset password user (set random/temporary)
    public function adminReset(Request $request, User $user)
    {
        $this->authorize('update', $user); // optional kalau pakai policy

        $new = Str::random(8); // atau set ke default tertentu
        $user->password = $new; // auto-hash via mutator
        $user->save();

        // TODO: tampilkan ke admin agar bisa diinformasikan ke user
        return back()->with('status', "Password user '{$user->username}' direset ke: {$new}");
    }
}
