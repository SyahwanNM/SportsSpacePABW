<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        try {
            Log::info('Login attempt', ['email' => $request->email]);
            
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                Log::info('Login successful', [
                    'user_id' => Auth::id(),
                    'email' => Auth::user()->email
                ]);

                return redirect()->intended('/dashboard');
            }

            Log::warning('Login failed', [
                'email' => $request->email
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided credentials are incorrect.',
                ]);

        } catch (\Exception $e) {
            Log::error('Login error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'An error occurred. Please try again later.',
                ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Log::info('User logged out successfully');

            return redirect('/');

        } catch (\Exception $e) {
            Log::error('Logout error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect('/')
                ->with('error', 'An error occurred during logout.');
        }
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            Auth::login($user);

            Log::info('User registered successfully', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            Log::error('Registration error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput($request->except('password'))
                ->withErrors([
                    'email' => 'An error occurred during registration. Please try again.',
                ]);
        }
    }
} 