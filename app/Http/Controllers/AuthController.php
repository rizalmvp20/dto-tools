<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // === HALAMAN LOGIN & REGISTER ===
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    // === AKSI LOGIN ===
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Pastikan user ada & sudah di-approve
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan.'])->withInput();
        }
        if (!$user->is_approved) {
            return back()->withErrors(['username' => 'Akun belum di-approve admin.'])->withInput();
        }

        $remember = (bool) $request->input('remember', false);

        if (Auth::attempt($credentials, $remember)) {
            // Amankan sesi
            $request->session()->regenerate();

            // Paksa SELALU ke dashboard (jangan pakai intended)
            $request->session()->forget('url.intended');

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'Password salah.'])->withInput();
    }

    // === AKSI REGISTER ===
    public function register(Request $request)
    {
        $data = $request->validate([
            'username'  => ['required', 'string', 'min:3', 'max:30', 'unique:users,username'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
            'agreement' => ['accepted'],
        ], [
            'agreement.accepted' => 'Centang pernyataan “Siap menegakkan solat 5 waktu”.',
        ]);

        User::create([
            'username'    => $data['username'],
            'password'    => bcrypt($data['password']),
            'is_admin'    => false,
            'is_approved' => false,
        ]);

        return redirect()->route('pending')->with('status', 'Registrasi berhasil. Tunggu approval admin.');
    }

    // === AKSI LOGOUT ===
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show');
    }
}
