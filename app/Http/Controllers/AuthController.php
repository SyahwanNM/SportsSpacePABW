<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek apakah kredensial valid
        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            // Simpan session pengguna
            Auth::login($user);
    
            // Log user yang berhasil login
            Log::info('User logged in:', ['user' => $user]);

            // Redirect ke dashboard
            return redirect()->route('dashboard');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
