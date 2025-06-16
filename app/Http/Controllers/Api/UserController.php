<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // Transform photo URLs to full URLs using the new API route for files
        $users->transform(function ($user) {
            if ($user->photo && !str_starts_with($user->photo, 'http')) {
                $user->photo = Config::get('app.url') . '/api/files/' . $user->photo;
            }
            return $user;
        });
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // Transform photo URL to full URL if it's not already, using the new API route
        if ($user->photo && !str_starts_with($user->photo, 'http')) {
            $user->photo = Config::get('app.url') . '/api/files/' . $user->photo;
        }
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->user_id !== $user->user_id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',user_id',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id . ',user_id',
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:user,admin',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                // Get the relative path from the stored full URL, assuming old URL used /api/files/ or /storage/
                $oldPath = str_replace(Config::get('app.url') . '/api/files/', '', $user->photo);
                if (str_starts_with($user->photo, Config::get('app.url') . '/storage/')) {
                    $oldPath = str_replace(Config::get('app.url') . '/storage/', '', $user->photo);
                }
                Storage::disk('public')->delete($oldPath);
            }
            // Store new photo and get relative path
            $path = $request->file('photo')->store('profile', 'public');
            $validated['photo'] = $path; // Store relative path
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        // Return full URL after update using the new API route
        if ($user->photo) {
            $user->photo = Config::get('app.url') . '/api/files/' . $user->photo;
        }
        return response()->json($user);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->user_id !== $user->user_id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($user->photo) {
            // Get the relative path from the stored full URL, assuming URL used /api/files/ or /storage/
            $path = str_replace(Config::get('app.url') . '/api/files/', '', $user->photo);
            if (str_starts_with($user->photo, Config::get('app.url') . '/storage/')) {
                $path = str_replace(Config::get('app.url') . '/storage/', '', $user->photo);
            }
            Storage::disk('public')->delete($path);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
} 