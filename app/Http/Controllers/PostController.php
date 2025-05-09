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
            $imagePath = $request->file('post_image')->store('images/posts', 'public');
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

    // Menampilkan halaman edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // Kirim data postingan ke form edit
    }

    // Mengupdate postingan
    public function update(Request $request, Post $post)
    {
        // Validasi inputan
        $request->validate([
            'post_title' => 'required|max:255',
            'post_content' => 'required',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengupdate data judul dan konten
        $post->update([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
        ]);

        // Mengupdate gambar jika ada
        if ($request->hasFile('post_image')) {
            // Hapus gambar lama jika ada
            if ($post->post_image) {
                Storage::delete('public/' . $post->post_image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('post_image')->store('images/posts', 'public');
            $post->update(['post_image' => $imagePath]);
        }

        // Redirect kembali ke dashboard dengan pesan status
        return redirect()->route('dashboard')->with('status', 'Post updated successfully');
    }

    public function destroy($id_post)
    {
        // Cari postingan berdasarkan ID
        $post = Post::findOrFail($id_post);

        // Hapus gambar jika ada
        if ($post->post_image) {
            Storage::disk('public')->delete($post->post_image);
        }

        // Hapus postingan
        $post->delete();

        // Redirect kembali ke dashboard dengan status
        return redirect()->route('dashboard')->with('status', 'Post deleted successfully');
    }

}
