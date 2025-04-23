<?php

namespace App\Http\Controllers;

use App\Models\komunitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    // Menampilkan semua komunitas
    public function index()
    {
        $komunitas = Komunitas::all(); // Ambil semua data komunitas
        return view('komunitas.indexkomunitas', compact('komunitas'));
    }

    // Menampilkan form untuk membuat komunitas baru (jika pakai view)
    public function create()
    {
        return view('komunitas.create_komunitas');
    }

    // Menyimpan data komunitas baru
    public function store(Request $request  )
    {
        // Validasi
        $validated = $request->validate([
            'nama' => 'required|string',
            'jns_olahraga' => 'required|string',
            'max_members' => 'required|integer',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'Deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'sampul' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Upload file
        $fotoPath = $request->file('foto')->store('komunitas/foto', 'public');
        $sampulPath = $request->file('sampul')->store('komunitas/sampul', 'public');

        // Simpan data ke database
        $komunitas = Komunitas::create([
            'nama' => $validated['nama'],
            'jns_olahraga' => $validated['jns_olahraga'],
            'max_members' => $validated['max_members'],
            'provinsi' => $validated['provinsi'],
            'kota' => $validated['kota'],
            'Deskripsi' => $validated['Deskripsi'],
            'foto' => $fotoPath,  // path disimpan di DB
            'sampul' => $sampulPath,
            'user_id' => auth()->id() ?? 1, // ganti sesuai auth login, default user_id 1 untuk testing
        ]);

        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dibuat!');
    }

    // Menampilkan satu data komunitas
    public function show($id)
    {
        $komunitas = Komunitas::findOrFail($id);
        return response()->json($komunitas);
    }

    // Menampilkan form edit (jika pakai view)
    public function edit($id)
    {
        //
    }

    // Update data komunitas
    public function update(Request $request, $id)
    {
        $komunitas = Komunitas::findOrFail($id);
        $komunitas->update($request->all());
        return response()->json($komunitas);
    }

    // Hapus data komunitas
    public function destroy($id)
    {
        $komunitas = Komunitas::findOrFail($id);
        $komunitas->delete();
        return response()->json(null, 204);
    }
}
