<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Sports Space</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="ri-arrow-left-line text-xl"></i>
                    </a>
                    <h1 class="ml-4 text-xl font-semibold text-gray-900">Post Detail</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Post Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/' . ($post->user->photo ?? 'profile/default.jpeg')) }}" 
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
    </main>
</body>
</html> 