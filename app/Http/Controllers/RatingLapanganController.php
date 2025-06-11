<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RatingLapangan;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RatingLapanganController extends Controller
{
    // Menyimpan review baru
    public function store(Request $request, $id_field)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);

        RatingLapangan::create([
            'id_field' => $id_field,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'komentar' => $request->komentar,
            'tanggalwaktu' => now(),
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
    }
} 