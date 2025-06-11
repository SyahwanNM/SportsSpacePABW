@extends('layouts.app')

@section('title', $post->title)

@section('content')
<main class="sm:ml-64 pt-20 pb-20">
    <div class="rounded-lg p-4">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Post Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/' . ($post->user->photo ?? 'profile/default-profile.jpg')) }}" 
                         alt="{{ $post->user->username }}" 
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">{{ $post->user->username }}</h2>
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @if(Auth::id() === $post->user_id)
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('posts.edit', $post) }}" class="text-gray-600 hover:text-red-600">
                            <i class="ri-edit-line"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-600 hover:text-red-600" 
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Post Content -->
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $post->title }}</h3>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $post->content }}</p>
            </div>

            <!-- Post Image -->
            @if($post->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         alt="Post image" 
                         class="w-full rounded-lg">
                </div>
            @endif

            <!-- Post Actions -->
            <div class="flex items-center space-x-6 border-t border-gray-200 pt-4">
                <button class="flex items-center space-x-2 text-gray-600 hover:text-red-600">
                    <i class="ri-heart-line"></i>
                    <span>Like</span>
                </button>
                <button class="flex items-center space-x-2 text-gray-600 hover:text-red-600">
                    <i class="ri-message-2-line"></i>
                    <span>Comment</span>
                </button>
                <button class="flex items-center space-x-2 text-gray-600 hover:text-red-600">
                    <i class="ri-share-line"></i>
                    <span>Share</span>
                </button>
            </div>
        </div>
    </div>
</main>
@endsection 