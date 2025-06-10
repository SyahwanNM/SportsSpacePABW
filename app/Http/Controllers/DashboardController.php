<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('user')->latest()->get();
        return view('dashboard', compact('user', 'posts'));
    }
} 