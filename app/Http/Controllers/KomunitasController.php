<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KomunitasController extends Controller
{
    // Menampilkan semua komunitas
    public function index()
    {
        $komunitas = Komunitas::all();
        return view('komunitas.index', compact('komunitas'));
    }

    // Menampilkan form membuat komunitas
    public function create()
    {
        return view('komunitas.create');
    }

    // Menyimpan komunitas baru
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'jns_olahraga' => 'required|string|max:100',
            'max_members' => 'required|integer|min:1',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $fotoPath = $request->hasFile('foto') ? $request->file('foto')->store('images/komunitas/foto', 'public') : null;
        $sampulPath = $request->hasFile('sampul') ? $request->file('sampul')->store('images/komunitas/sampul', 'public') : null;

        Komunitas::create([
            'nama' => $request->nama,
            'jns_olahraga' => $request->jns_olahraga,
            'max_members' => $request->max_members,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'sampul' => $sampulPath,
            'status' => 'aktif',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('komunitas.index')->with('status', 'Komunitas berhasil dibuat.');
    }

    // Menampilkan detail komunitas
    public function show(Komunitas $komunitas)
    {
        return view('komunitas.show', compact('komunitas'));
    }

    // Menampilkan form edit komunitas (hanya pemilik)
    public function edit(Komunitas $komunitas)
    {
        if ($komunitas->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit komunitas ini.');
        }

        return view('komunitas.edit', compact('komunitas'));
    }

    // Memperbarui data komunitas (hanya pemilik)
    public function update(Request $request, Komunitas $komunitas)
    {
        if ($komunitas->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk memperbarui komunitas ini.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'jns_olahraga' => 'required|string|max:100',
            'max_members' => 'required|integer|min:1',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = $request->only([
            'nama', 'jns_olahraga', 'max_members', 'provinsi', 'kota', 'deskripsi'
        ]);

        if ($request->hasFile('foto')) {
            if ($komunitas->foto) {
                Storage::disk('public')->delete($komunitas->foto);
            }
            $data['foto'] = $request->file('foto')->store('images/komunitas/foto', 'public');
        }

        if ($request->hasFile('sampul')) {
            if ($komunitas->sampul) {
                Storage::disk('public')->delete($komunitas->sampul);
            }
            $data['sampul'] = $request->file('sampul')->store('images/komunitas/sampul', 'public');
        }

        $komunitas->update($data);

        return redirect()->route('komunitas.index')->with('status', 'Komunitas berhasil diperbarui.');
    }

    // Menghapus komunitas (hanya pemilik)
    public function destroy(Komunitas $komunitas)
    {
        if ($komunitas->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus komunitas ini.');
        }

        if ($komunitas->foto) {
            Storage::disk('public')->delete($komunitas->foto);
        }

        if ($komunitas->sampul) {
            Storage::disk('public')->delete($komunitas->sampul);
        }

        $komunitas->delete();

        return redirect()->route('komunitas.index')->with('status', 'Komunitas berhasil dihapus.');
    }
}
