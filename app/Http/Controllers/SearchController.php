<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lapangan;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        try {
            $query = $request->input('query');
            
            if (empty($query)) {
                return response()->json([
                    'users' => [],
                    'lapangans' => [],
                    'komunitas' => []
                ]);
            }

            // Search users
            $users = User::where('username', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%")
                        ->select('user_id', 'username', 'email', 'photo')
                        ->limit(5)
                        ->get()
                        ->map(function ($user) {
                            return [
                                'user_id' => $user->user_id,
                                'username' => $user->username,
                                'email' => $user->email,
                                'photo' => $user->photo ? asset('storage/' . $user->photo) : asset('profile/default.jpeg')
                            ];
                        });

            // Search lapangans with error handling
            try {
                $lapangans = Lapangan::where('nama_lapangan', 'like', "%{$query}%")
                                    ->orWhere('type', 'like', "%{$query}%")
                                    ->orWhere('categori', 'like', "%{$query}%")
                                    ->select('id_field', 'nama_lapangan', 'type', 'categori', 'foto')
                                    ->limit(5)
                                    ->get()
                                    ->map(function ($lapangan) {
                                        return [
                                            'id_field' => $lapangan->id_field,
                                            'nama_lapangan' => $lapangan->nama_lapangan,
                                            'type' => $lapangan->type,
                                            'categori' => $lapangan->categori,
                                            'foto' => $lapangan->foto ? asset('storage/' . $lapangan->foto) : asset('images/default-field.jpg')
                                        ];
                                    });
            } catch (\Exception $e) {
                Log::error('Error searching lapangans: ' . $e->getMessage());
                Log::error($e->getTraceAsString());
                $lapangans = [];
            }

            // Search komunitas with error handling
            try {
                $komunitas = Komunitas::where('nama', 'like', "%{$query}%")
                                    ->orWhere('jns_olahraga', 'like', "%{$query}%")
                                    ->select('id_kmnts', 'nama', 'jns_olahraga', 'foto')
                                    ->limit(5)
                                    ->get()
                                    ->map(function ($komunitas) {
                                        return [
                                            'id_komunitas' => $komunitas->id_kmnts,
                                            'nama' => $komunitas->nama,
                                            'jns_olahraga' => $komunitas->jns_olahraga,
                                            'foto' => $komunitas->foto ? asset('storage/' . $komunitas->foto) : asset('images/default-community.jpg')
                                        ];
                                    });
            } catch (\Exception $e) {
                Log::error('Error searching komunitas: ' . $e->getMessage());
                Log::error($e->getTraceAsString());
                $komunitas = [];
            }

            // Log the results for debugging
            Log::info('Search results:', [
                'query' => $query,
                'users_count' => $users->count(),
                'lapangans_count' => $lapangans->count(),
                'komunitas_count' => $komunitas->count()
            ]);

            return response()->json([
                'users' => $users,
                'lapangans' => $lapangans,
                'komunitas' => $komunitas
            ]);

        } catch (\Exception $e) {
            Log::error('Search error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return response()->json([
                'error' => 'An error occurred while searching',
                'message' => $e->getMessage()
            ], 500);
        }
    }
} 