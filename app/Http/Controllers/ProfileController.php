<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Tampilkan halaman profile
    public function show(Request $request)
    {
        return view('profile.index', ['user' => $request->user()]);
    }

    // Update username
    public function updateName(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'username' => [
                'required',
                'string',
                'min:3',
                'max:30',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
        ]);

        $user->username = $data['username'];
        $user->save();

        return back()->with('success', 'Nama/username berhasil diperbarui.');
    }
}
