<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SportsGroup;
use Illuminate\Support\Facades\Validator;

class SportsGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = SportsGroup::all();
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'kapasitas_maksimal' => 'required|integer|min:1',
            'current_members' => 'nullable|integer|min:0',
            'jenis_olahraga' => 'required|string|max:255',
            'payment_method' => 'required|in:cash,transfer',
            'payment_amount' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $group = SportsGroup::create($data);
        return response()->json($group, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = SportsGroup::find($id);
        if (!$group) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = SportsGroup::find($id);

        if (!$group) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        // Cek apakah user yang login adalah pembuat data
        if ($group->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'event_date' => 'sometimes|date',
            'start_time' => 'sometimes',
            'end_time' => 'sometimes',
            'city' => 'sometimes|string|max:100',
            'address' => 'sometimes|string|max:255',
            'kapasitas_maksimal' => 'sometimes|integer|min:1',
            'current_members' => 'nullable|integer|min:0',
            'jenis_olahraga' => 'sometimes|string|max:255',
            'payment_method' => 'sometimes|in:cash,transfer',
            'payment_amount' => 'sometimes|integer|min:0',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $group->update($request->all());
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = SportsGroup::find($id);

        if (!$group) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        if ($group->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $group->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
