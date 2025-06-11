<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Menampilkan semua postingan di dashboard
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan postingan baru
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->created_at = now();

        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->put('posts/' . $imageName, file_get_contents($image));
            $post->post_image = 'posts/' . $imageName;
        }

        $post->save();

        // Reload the user data to get the updated photo URL if any
        $user = Auth::user();
        
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Post created successfully!',
                'post' => $post->load('user'), // Load user relationship for the new post
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Menampilkan halaman edit
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this post.');
        }
        return view('posts.edit', compact('post'));
    }

    // Mengupdate postingan
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to update this post.');
        }

        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;

        if ($request->hasFile('post_image')) {
            // Delete old image if exists
            if ($post->post_image) {
                Storage::disk('public')->delete($post->post_image);
            }
            
            $image = $request->file('post_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->put('posts/' . $imageName, file_get_contents($image));
            $post->post_image = 'posts/' . $imageName;
        }

        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this post.');
        }

        if ($post->post_image) {
            Storage::disk('public')->delete($post->post_image);
        }

        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }
}
