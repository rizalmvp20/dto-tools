<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // optional kalau mau ganti bcrypt() -> Hash::make()

class AuthController extends Controller
{
    // === HALAMAN LOGIN & REGISTER ===
    public function showLogin()
    {
        // Pakai facade biar IDE senang
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

        // cek user approved dulu
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan.'])->withInput();
        }
        if (!$user->is_approved) {
            return back()->withErrors(['username' => 'Akun belum di-approve admin.'])->withInput();
        }

        // Hindari garis merah pada boolean()
        $remember = (bool) $request->input('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate(); // penting untuk keamanan sesi
            return redirect()->intended('/dashboard');
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
            // bcrypt() oke; kalau mau ganti:
            // 'password' => Hash::make($data['password']),
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
        $request->session()->invalidate();     // hapus sesi lama
        $request->session()->regenerateToken(); // ganti CSRF token

        return redirect()->route('login.show');
    }
}
