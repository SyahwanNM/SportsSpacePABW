<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportsGroup;
use App\Models\MemberSportsgroup;
use Illuminate\Support\Facades\Auth;

class SportsGroupController extends Controller
{
    // List semua sportsgroup
    public function index()
    {
        $groups = SportsGroup::all();
        return view('sport-group.index', compact('groups'));
    }

    // Detail satu sportsgroup
    public function show($id)
    {
        $groups = SportsGroup::with(['members.user', 'user'])->find($id);

        if (!$groups) {
            return redirect()->route('sports-group.index')->with('error', 'Group not found');
        }

        return view('sport-group.show', compact('groups'));
    }


    public function create()
    {
        return view('sport-group.create');
    }

    // Membuat sportsgroup
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required|string',
            'address' => 'required|string',
            'kapasitas_maksimal' => 'required|integer|min:1',
            'jenis_olahraga' => 'required|string',
            'payment_method' => 'nullable|string',
            'payment_amount' => 'nullable|numeric',
        ]);

        $group = SportsGroup::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'event_date' => $request->event_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'city' => $request->city,
            'address' => $request->address,
            'kapasitas_maksimal' => $request->kapasitas_maksimal,
            'current_members' => 1,
            'jenis_olahraga' => $request->jenis_olahraga,
            'payment_method' => $request->payment_method,
            'payment_amount' => $request->payment_amount,
            'created_at' => now(),
        ]);

        MemberSportsgroup::create([
            'id' => $group->id,
            'user_id' => Auth::id(),
            'join_at' => now(),
        ]);

        return redirect()->route('sports-group.index')->with('status', 'Sportsgroup berhasil dibuat.');
    }

    public function edit(SportsGroup $group)
    {
        if ($group->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit group ini.');
        }

        return view('sport-group.edit', compact('group'));
    }

    // Update sportsgroup
    public function update(Request $request, $id)
    {
        $group = SportsGroup::findOrFail($id);

        if ($group->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $group->update($request->only([
            'title', 'event_date', 'start_time', 'end_time',
            'city', 'address', 'kapasitas_maksimal', 'jenis_olahraga',
            'payment_method', 'payment_amount'
        ]));

        return redirect()->route('sports-group.index')->with('status', 'SportsGroup berhasil diperbarui.');

    }

    // Hapus sportsgroup
    public function destroy($id)
    {
        $group = SportsGroup::findOrFail($id);

        if ($group->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $group->delete();
        return response()->json(['message' => 'Sports group deleted']);
    }

    // Bergabung ke sportsgroup
    public function join($id)
    {
        $group = SportsGroup::findOrFail($id);

        // Cek apakah user sudah join
        $alreadyMember = MemberSportsgroup::where('id', $id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($alreadyMember) {
            return redirect()->route('sports-group.index')->with('status', 'Kamu Sudah Bergabung di grup ini.');
        }

        // Cek apakah sudah penuh
        if ($group->current_members >= $group->kapasitas_maksimal) {
            return response()->json(['message' => 'Group is full'], 400);
        }

        // Tambahkan member
        MemberSportsgroup::create([
            'id' => $id,
            'user_id' => Auth::id(),
            'join_at' => now(),
        ]);

        $group->increment('current_members');

        return redirect()->route('sports-group.show', $id)
        ->with('status', 'Berhasil bergabung grup.');
    }

    // Keluar dari sportsgroup
    public function leave($id)
    {
        $group = SportsGroup::findOrFail($id);

        // Cek apakah user adalah pembuat grup
        if ($group->user_id === Auth::id()) {
            return redirect()->route('sports-group.index')
                ->with('status', 'Kamu adalah pembuat grup dan tidak bisa keluar. Hapus grup jika ingin mengakhiri.');
        }

        // Cari keanggotaan user
        $membership = MemberSportsgroup::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$membership) {
            return redirect()->route('sports-group.index')
                ->with('status', 'Kamu belum tergabung dalam grup ini.');
        }

        // Hapus keanggotaan
        $membership->delete();

        // Kurangi jumlah anggota (pastikan tidak negatif)
        if ($group->current_members > 0) {
            $group->decrement('current_members');
        }

        return redirect()->route('sports-group.show', $id)
        ->with('status', 'Berhasil keluar dari grup.');
    }



}
