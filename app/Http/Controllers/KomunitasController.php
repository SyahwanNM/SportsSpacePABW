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

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'nama' => 'required|string',
            'jns_olahraga' => 'required|string',
            'max_members' => 'required|integer',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'deskripsi' => 'required|string',
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
            'deskripsi' => $validated['deskripsi'],
            'foto' => $fotoPath,
            'sampul' => $sampulPath, 
            'user_id' => auth()->id() ?? 1 ,  // Menyimpan user_id yang sedang login  
        ]);

        // Redirect setelah berhasil
        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dibuat!');
    }



    // Menampilkan satu data komunitas
    public function show($id_kmnts)
    {
        $komunitas = Komunitas::findOrFail($id_kmnts);
        if (!$komunitas) {
            return response()->json(['error' => 'Komunitas tidak ditemukan.'], 404);
        }
    
        // Debugging: Tampilkan data komunitas dan id_user
        dd($komunitas, $komunitas->user);
        $user = $komunitas->user; 
        return response()->json([
            'komunitas' => $komunitas,
            'user' => $user
        ]);
    }

    // Menampilkan form edit (jika pakai view)
    public function edit($id_kmnts)
    {
    // Gunakan kolom 'id_kmnts' sebagai primary key
    $komunitas = Komunitas::where('id_kmnts', $id_kmnts)->firstOrFail();
    
    // Kirim data komunitas ke view edit
    return view('komunitas.edit_komunitas', compact('komunitas'));
    }


    public function update(Request $request, $id_kmnts)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|max:255',
            'jns_olahraga' => 'required',
            'max_members' => 'required|integer',
            'provinsi' => 'required',
            'kota' => 'required',
            'deskripsi' => 'required|string', // pastikan deskripsi valid
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Ambil data komunitas yang akan diupdate
        $komunitas = Komunitas::findOrFail($id_kmnts);

        // Update data komunitas
        $komunitas->update([
            'nama' => $request->nama,
            'jns_olahraga' => $request->jns_olahraga,
            'max_members' => $request->max_members,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'deskripsi' => $request->deskripsi, // Pastikan ini adalah nama kolom yang tepat
            'foto' => $request->hasFile('foto') ? $request->file('foto')->store('komunitas/foto') : $komunitas->foto,
            'sampul' => $request->hasFile('sampul') ? $request->file('sampul')->store('komunitas/sampul') : $komunitas->sampul,
        ]);

        // Redirect setelah sukses update
        return redirect()->route('komunitas.index')->with('success', 'Data komunitas berhasil diupdate!');
    }



    // Hapus data komunitas
    public function destroy($id)
    {
        $komunitas = Komunitas::findOrFail($id);
        $komunitas->delete();
        return response()->json(null, 204);
    }
}
