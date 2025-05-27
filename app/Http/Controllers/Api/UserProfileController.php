<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // Menampilkan profil user yang sedang login
    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'user' => [
                'username' => $user->username,
                'email' => $user->email,
                'gender' => $user->gender,
                'kota' => $user->kota,
                'photo_url' => $user->photo ? asset($user->photo) : null,
            ]
        ]);
    }


    // Memperbarui data profil user yang sedang login
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'username' => 'required|string|unique:users,username,' . $user->user_id . ',user_id',
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'gender' => 'required|string',
            'kota' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['username', 'email', 'gender', 'kota']);

        // Proses upload foto jika ada
        if ($request->hasFile('photo')) {
            // ✅ Buat folder jika belum ada
            if (!file_exists(public_path('uploads/profile'))) {
                mkdir(public_path('uploads/profile'), 0777, true);
            }

            // ✅ Hapus foto lama jika ada
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/profile'), $photoName);
            $data['photo'] = 'uploads/profile/' . $photoName;
        }

        $user->update($data);

        return response()->json([
            'message' => 'Profil berhasil diperbarui',
            'user' => [
                'user_id' => $user->user_id,
                'username' => $user->username,
                'email' => $user->email,
                'gender' => $user->gender,
                'kota' => $user->kota,
                'tanggal_lahir' => $user->tanggal_lahir,
                'photo_url' => $user->photo ? asset($user->photo) : null,
                'role' => $user->role,
                'total_poin' => $user->total_poin,
            ]
        ]);
    }
}
