<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class UserProfileController extends Controller
{
    // Menampilkan profil user yang sedang login
    public function index(Request $request)
    {
        return $this->show($request);
    }

    public function show(Request $request)
    {
        $user = $request->user();
        $userData = $user->only(['user_id', 'username', 'email', 'tanggal_lahir', 'gender', 'kota', 'photo']);
        
        // Generate full URL for photo if it exists
        if ($userData['photo'] && $userData['photo'] !== 'null' && $userData['photo'] !== '') {
            // If the photo path doesn't start with http, prepend the app URL with /api/files/
            if (!str_starts_with($userData['photo'], 'http')) {
                // Ensure we get the relative path correctly if it already contains storage/ or api/files/
                $relativePath = $userData['photo'];
                if (str_starts_with($relativePath, 'storage/')) {
                    $relativePath = substr($relativePath, strlen('storage/'));
                }
                $userData['photo'] = Config::get('app.url') . '/api/files/' . $relativePath;
            }
            Log::info('Generated photo URL:', ['url' => $userData['photo']]);
        } else {
            $userData['photo'] = Config::get('app.url') . '/api/files/profile/default.jpeg';
        }

        return response()->json([
            'user' => $userData,
        ]);
    }

    // Memperbarui profil user
    public function update(Request $request)
    {
        try {
            Log::info('Update profile request received', [
                'request_data' => $request->all(),
                'files' => $request->hasFile('photo') ? 'Photo file present' : 'No photo file'
            ]);

            $validator = Validator::make($request->all(), [
                'username' => 'nullable|string|max:255|unique:users,username,' . auth()->id() . ',user_id',
                'email' => 'nullable|email|max:255|unique:users,email,' . auth()->id() . ',user_id',
                'tanggal_lahir' => 'nullable|date',
                'gender' => 'nullable|string|in:Laki laki,Perempuan,-',
                'kota' => 'nullable|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors()]);
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = auth()->user();
            $updateData = [];

            // Only update fields that are present in the request
            if ($request->filled('username')) {
                $updateData['username'] = $request->username;
            }
            if ($request->filled('email')) {
                $updateData['email'] = $request->email;
            }
            if ($request->filled('tanggal_lahir')) {
                $updateData['tanggal_lahir'] = $request->tanggal_lahir;
            }
            if ($request->filled('gender')) {
                $updateData['gender'] = $request->gender;
            }
            if ($request->filled('kota')) {
                $updateData['kota'] = $request->kota;
            }

            Log::info('Updating user data', ['update_data' => $updateData]);

            // Update user data
            if (!empty($updateData)) {
                $user->fill($updateData);
                $user->save();
            }

            // Handle photo upload
            if ($request->hasFile('photo')) {
                Log::info('Processing photo upload');
                
                // Delete old photo if exists
                if ($user->photo) {
                    $oldPhotoPath = str_replace('storage/', '', $user->photo);
                    if (Storage::exists($oldPhotoPath)) {
                        Storage::delete($oldPhotoPath);
                    }
                }

                // Store new photo
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('profile', $filename, 'public');
                
                // Update user photo path
                $user->photo = $path;
                $user->save();
                
                Log::info('Photo uploaded successfully', [
                    'filename' => $filename,
                    'photo_path' => $path
                ]);
            }

            Log::info('Profile updated successfully', ['user_id' => $user->id]);

            // Return updated user data
            $userData = $user->only(['user_id', 'username', 'email', 'tanggal_lahir', 'gender', 'kota', 'photo']);
            
            // Generate full URL for photo if it exists
            if ($userData['photo'] && $userData['photo'] !== 'null' && $userData['photo'] !== '') {
                // If the photo path doesn't start with http, prepend the app URL with /api/files/
                if (!str_starts_with($userData['photo'], 'http')) {
                    // Ensure we get the relative path correctly if it already contains storage/ or api/files/
                    $relativePath = $userData['photo'];
                    if (str_starts_with($relativePath, 'storage/')) {
                        $relativePath = substr($relativePath, strlen('storage/'));
                    }
                    $userData['photo'] = Config::get('app.url') . '/api/files/' . $relativePath;
                }
                Log::info('Generated photo URL:', ['url' => $userData['photo']]);
            } else {
                $userData['photo'] = Config::get('app.url') . '/api/files/profile/default-profile.jpg';
            }

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $userData
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating profile', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'message' => 'Failed to update profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
