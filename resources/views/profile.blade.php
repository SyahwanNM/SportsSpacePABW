@extends('layouts.app')

@section('content')

<body class="bg-gray-50">
    <div class="p-4 sm:ml-64 pt-20">
        <div class="p-4 rounded-lg">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ Auth::user()->photo }}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        <p></p>
                        <button class="absolute bottom-0 right-0 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition-colors">
                            <i class="ri-camera-line"></i>
                        </button>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900">{{ Auth::user()->username }}</h1>
                        <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        <div class="flex items-center space-x-4 mt-2">
                            <span class="text-sm text-gray-500">
                                <i class="ri-map-pin-line mr-1"></i>
                                {{ Auth::user()->kota ?? 'Not set' }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="ri-calendar-line mr-1"></i>
                                {{ Auth::user()->tanggal_lahir ? Auth::user()->tanggal_lahir->format('d M Y') : 'Not set' }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="ri-user-line mr-1"></i>
                                {{ Auth::user()->gender ?? 'Not set' }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            <i class="ri-edit-line mr-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Points</p>
                            <h3 class="text-2xl font-bold text-gray-900">{{ Auth::user()->total_poin ?? 0 }}</h3>
                        </div>
                        <div class="p-3 bg-red-100 rounded-full">
                            <i class="ri-star-line text-xl text-red-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Posts</p>
                            <h3 class="text-2xl font-bold text-gray-900">{{ Auth::user()->posts->count() }}</h3>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="ri-file-list-line text-xl text-blue-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Communities</p>
                            <h3 class="text-2xl font-bold text-gray-900">0</h3>
                        </div>
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="ri-group-line text-xl text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2">
                    <!-- Recent Activity -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
                        <div class="space-y-4">
                            @if(Auth::user()->posts->count() > 0)
                                @foreach(Auth::user()->posts->take(3) as $post)
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                                            <p class="font-medium text-gray-900">{{ $post->post_title }}</p>
                                        </div>
                                        <a href="{{ route('posts.show', ['post' => $post->id_post]) }}" class="text-red-600 hover:text-red-700">
                                            <i class="ri-arrow-right-line"></i>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 text-center py-4">No recent activity</p>
                            @endif
                        </div>
                    </div>

                    <!-- Posts -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-900">My Posts</h2>
                            <a href="{{ route('dashboard') }}" class="text-sm text-red-600 hover:text-red-700">
                                Create New Post
                            </a>
                        </div>
                        <div class="space-y-4">
                            @if(Auth::user()->posts->count() > 0)
                                @foreach(Auth::user()->posts as $post)
                                    <div class="border border-gray-200 rounded-lg p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $post->post_title }}</h3>
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('posts.edit', ['post' => $post->id_post]) }}" class="text-gray-600 hover:text-red-600">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <form action="{{ route('posts.destroy', ['post' => $post->id_post]) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-600 hover:text-red-600" onclick="return confirm('Are you sure you want to delete this post?')">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mb-2">{{ Str::limit($post->post_content, 150) }}</p>
                                        @if($post->post_image)
                                            <img src="{{ asset('storage/' . $post->post_image) }}" alt="Post image" class="w-full h-48 object-cover rounded-lg mb-2">
                                        @endif
                                        <div class="flex items-center justify-between text-sm text-gray-500">
                                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                                            <div class="flex items-center space-x-4">
                                                <span class="flex items-center">
                                                    <i class="ri-heart-line mr-1"></i>
                                                    {{ $post->likes_count ?? 0 }}
                                                </span>
                                                <span class="flex items-center">
                                                    <i class="ri-message-2-line mr-1"></i>
                                                    {{ $post->comments_count ?? 0 }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8">
                                    <i class="ri-file-list-line text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-500">You haven't created any posts yet</p>
                                    <a href="{{ route('dashboard') }}" class="inline-block mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                        Create Your First Post
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- About -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">About</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-2">
                                <i class="ri-map-pin-line text-gray-500"></i>
                                <span class="text-gray-600">{{ Auth::user()->kota ?? 'Not set' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="ri-calendar-line text-gray-500"></i>
                                <span class="text-gray-600">Joined {{ Auth::user()->created_at ? Auth::user()->created_at->format('M Y') : 'Not set' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="ri-user-line text-gray-500"></i>
                                <span class="text-gray-600">{{ Auth::user()->gender ?? 'Not set' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Communities -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">My Communities</h2>
                        <div class="space-y-4">
                            <p class="text-gray-500 text-center py-4">No communities joined yet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu-btn');
            const dropdownUser = document.getElementById('dropdown-user');
            
            if (menuBtn && dropdownUser) {
                menuBtn.addEventListener('click', function() {
                    dropdownUser.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html> 