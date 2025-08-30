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
            'current_password'      => ['required', 'string'],
            'password'              => ['required', 'string', 'min:6', 'confirmed'],
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
        // kalau tidak pakai Policy, kamu bisa hapus baris authorize di bawah
        // $this->authorize('update', $user);

        // cegah reset untuk akun admin
        if ($user->is_admin) {
            return back()->with('error', 'Tidak boleh reset password admin.');
        }

        $new = Str::random(10);          // password baru sementara
        $user->password = $new;          // auto-hash via mutator di model User
        $user->save();

        // tampilkan ke admin; di produksi sebaiknya kirim via email/WA/kanal aman
        return back()->with('success', "Password user '{$user->username}' direset ke: {$new}");
    }
}
