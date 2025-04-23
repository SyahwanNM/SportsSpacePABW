<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index(Request $request)
    {
        $fields = session('fields', []);
        return view('fields.index', compact('fields'));
    }

    public function create()
    {
        return view('fields.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'sport_type' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048',
    ]);

    $fields = session('fields', []);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('fields', 'public');
    }

    $field = $request->only(['name', 'location', 'sport_type', 'description', 'price']);
    $field['image'] = $imagePath;

    $fields[] = $field;
    session(['fields' => $fields]);

    return redirect()->route('fields.index')->with('success', 'Field berhasil ditambahkan!');
}


    public function show($index)
    {
        $fields = session('fields', []);
        if (!isset($fields[$index])) {
            abort(404);
        }

        $field = $fields[$index];
        return view('fields.show', compact('field'));
    }

    public function edit($index)
{
    $fields = session('fields', []);
    if (!isset($fields[$index])) {
        abort(404);
    }

    $field = $fields[$index];
    return view('fields.edit', compact('field', 'index'));
}

public function update(Request $request, $index)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'sport_type' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048',
    ]);

    $fields = session('fields', []);
    if (!isset($fields[$index])) {
        abort(404);
    }

    $field = $fields[$index];

    // Jika ada file baru, simpan dan ganti
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('fields', 'public');

        // Optional: Hapus gambar lama
        if (!empty($field['image']) && file_exists(public_path('storage/' . $field['image']))) {
            unlink(public_path('storage/' . $field['image']));
        }

        $field['image'] = $imagePath;
    }

    $field['name'] = $request->name;
    $field['location'] = $request->location;
    $field['sport_type'] = $request->sport_type;
    $field['description'] = $request->description;
    $field['price'] = $request->price;

    $fields[$index] = $field;
    session(['fields' => $fields]);

    return redirect()->route('fields.index')->with('success', 'Field berhasil diperbarui!');
}


public function destroy($index)
{
    $fields = session('fields', []);
    if (!isset($fields[$index])) {
        abort(404);
    }

    unset($fields[$index]);
    session(['fields' => array_values($fields)]); // reset index array

    return redirect()->route('fields.index')->with('success', 'Field berhasil dihapus!');
}


    
}