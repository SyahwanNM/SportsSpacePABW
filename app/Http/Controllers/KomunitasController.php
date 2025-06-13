<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\MemberKomunitas;
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

        $komunitas = Komunitas::create([
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

        MemberKomunitas::create([
            'id_kmnts' => $komunitas->id_kmnts,
            'user_id' => Auth::id(),
            'join_at' => now(),
        ]);

        return redirect()->route('komunitas.index')->with('status', 'Komunitas berhasil dibuat.');
    }

    // Menampilkan detail komunitas
    public function show(Komunitas $komunitas)
    {
        $userId = Auth::id();

        $isMember = MemberKomunitas::where('id_kmnts', $komunitas->id_kmnts)
            ->where('user_id', $userId)
            ->exists();

        return view('komunitas.show', compact('komunitas', 'isMember'));
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

    // Bergabung dengan komunitas
    public function join($id_kmnts)
    {
        $komunitas = Komunitas::findOrFail($id_kmnts);

        // Cek apakah sudah menjadi anggota
        $alreadyMember = MemberKomunitas::where('id_kmnts', $id_kmnts)
            ->where('user_id', Auth::user()->user_id)
            ->exists();

        if ($alreadyMember) {
            return redirect()->route('komunitas.show', $id_kmnts)->with('status', 'Kamu sudah bergabung dengan komunitas ini.');
        }

        // Cek kapasitas
        $currentCount = MemberKomunitas::where('id_kmnts', $id_kmnts)->count();
        if ($currentCount >= $komunitas->max_members) {
            return redirect()->route('komunitas.show', $id_kmnts)->with('status', 'Komunitas sudah penuh.');
        }

        MemberKomunitas::create([
            'id_kmnts' => $id_kmnts,
            'user_id' => Auth::user()->user_id,
            'join_at' => now(),
        ]);

        return redirect()->route('komunitas.show', $id_kmnts)->with('status', 'Berhasil bergabung ke komunitas.');
    }

    // Meninggalkan komunitas
    public function leave($id_kmnts)
    {
        $komunitas = Komunitas::findOrFail($id_kmnts);
        $userId = Auth::user()->user_id;

        // Cek jika pembuat komunitas tidak boleh keluar
        if ($komunitas->user_id == $userId) {
            return redirect()->route('komunitas.show', $id_kmnts)->with('status', 'Kamu adalah pembuat komunitas, tidak bisa keluar. Hapus komunitas jika ingin mengakhiri.');
        }

        $membership = MemberKomunitas::where('id_kmnts', $id_kmnts)
            ->where('user_id', $userId)
            ->first();

        if (!$membership) {
            return redirect()->route('komunitas.show', $id_kmnts)->with('status', 'Kamu belum tergabung di komunitas ini.');
        }

        $membership->delete();

        return redirect()->route('komunitas.show', $id_kmnts)->with('status', 'Berhasil keluar dari komunitas.');
    }
}
