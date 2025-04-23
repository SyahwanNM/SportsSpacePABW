<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Menampilkan semua postingan di dashboard
    public function index()
    {
        $posts = Post::all(); // Ambil semua postingan
        return view('dashboard', compact('posts')); // Kirim data postingan ke view
    }

    // Menyimpan postingan baru
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'post_title' => 'required|max:255',
            'post_content' => 'required',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengatur path gambar jika ada
        $imagePath = null;
        if ($request->hasFile('post_image')) {
            $imagePath = $request->file('post_image')->store('posts', 'public');
        }

        // Menyimpan postingan baru ke database
        Post::create([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_image' => $imagePath,
            'created_at' => now(),
        ]);

        // Redirect kembali ke dashboard
        return redirect()->route('dashboard')->with('status', 'Post created successfully');
    }
}
