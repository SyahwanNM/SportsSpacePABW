<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            
            Log::info('Registration attempt with data:', $request->all());

            $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'gender' => ['required', 'string', 'in:Laki laki,Perempuan,-'],
                'tanggal_lahir' => ['required', 'date'],
                'kota' => ['required', 'string', 'max:50'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            Log::info('Validation passed, creating user...');

            $userData = [
                'username' => $request->username,
                'email' => $request->email,
                'gender' => $request->gender,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kota' => $request->kota,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'photo' => '/storage/profile/default.jpeg',
                'total_poin' => 0,
            ];

            Log::info('Attempting to create user with data:', $userData);

            $user = User::create($userData);

            if (!$user) {
                throw new \Exception('Failed to create user');
            }

            Log::info('User created successfully:', ['user_id' => $user->user_id]);

            event(new Registered($user));

            DB::commit();
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation failed:', ['errors' => $e->errors()]);
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()])->withInput();
        }
    }
}
