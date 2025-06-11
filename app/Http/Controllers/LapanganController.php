<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('lapangan.index', compact('lapangan'));
    }

    public function show(Lapangan $lapangan)
    {
        $reviews = $lapangan->ratingLapangans()->with('user')->latest('tanggalwaktu')->get();
        return view('lapangan.show', compact('lapangan', 'reviews'));
    }
} 