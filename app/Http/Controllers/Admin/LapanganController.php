<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('admin.lapangan.index', compact('lapangan'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'categori' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'opening_hours' => 'required|string|max:255',
            'closing_hours' => 'required|string|max:255',
            'fasility' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'address' => 'required|string'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $path = $foto->storeAs('lapangans', $filename, 'public');
        }

        Lapangan::create([
            'nama_lapangan' => $request->nama_lapangan,
            'type' => $request->type,
            'categori' => $request->categori,
            'foto' => $path ?? null,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'fasility' => $request->fasility,
            'price' => $request->price,
            'description' => $request->description,
            'address' => $request->address,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil ditambahkan');
    }

    public function edit(Lapangan $lapangan)
    {
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, Lapangan $lapangan)
    {
        $request->validate([
            'nama_lapangan' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'categori' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'opening_hours' => 'required|string|max:255',
            'closing_hours' => 'required|string|max:255',
            'fasility' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'address' => 'required|string'
        ]);

        if ($request->hasFile('foto')) {
            if ($lapangan->foto) {
                Storage::disk('public')->delete($lapangan->foto);
            }
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $path = $foto->storeAs('lapangans', $filename, 'public');
        }

        $lapangan->update([
            'nama_lapangan' => $request->nama_lapangan,
            'type' => $request->type,
            'categori' => $request->categori,
            'foto' => $path ?? $lapangan->foto,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'fasility' => $request->fasility,
            'price' => $request->price,
            'description' => $request->description,
            'address' => $request->address
        ]);

        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil diperbarui');
    }

    public function destroy(Lapangan $lapangan)
    {
        if ($lapangan->foto) {
            Storage::disk('public')->delete($lapangan->foto);
        }
        $lapangan->delete();
        return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil dihapus');
    }
} 