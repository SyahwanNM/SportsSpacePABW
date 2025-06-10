<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Sports Space</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200">
        <div class="px-4 py-3 lg:px-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="{{ route('landingpage') }}" class="flex ml-2 md:mr-24">
                        <img src="{{ asset('images/logo.png') }}" class="h-8 mr-3" alt="Sports Space Logo" />
                    </a>
                </div>

                <!-- Search and Filter -->
                <div class="flex-1 max-w-2xl mx-8">
                    <div class="flex items-center space-x-4">
                        <div class="relative flex-1">
                            <input type="text" placeholder="Search posts, events, or users..." 
                                   class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                            <button class="absolute right-3 top-2.5">
                                <i class="ri-search-line text-gray-400"></i>
                            </button>
                        </div>
                        <button class="p-2 text-gray-600 hover:text-red-600 transition-colors">
                            <i class="ri-filter-3-line text-xl"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-600 hover:text-red-600 transition-colors">
                        <i class="ri-notification-3-line text-xl"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-600 rounded-full"></span>
                    </button>

                    <!-- Messages -->
                    <button class="relative p-2 text-gray-600 hover:text-red-600 transition-colors">
                        <i class="ri-message-3-line text-xl"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-600 rounded-full"></span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="flex items-center ml-3 relative">
                        <div>
                            <button type="button" id="menu-btn" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="user photo">
                            </button>
                        </div>
                        <div class="menu-links hidden absolute right-0 top-12 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900" role="none">
                                    {{ Auth::user()->username }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        <i class="ri-user-line mr-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        <i class="ri-settings-3-line mr-2"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" role="menuitem">
                                            <i class="ri-logout-box-line mr-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0 bg-white border-r border-gray-200" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-home-5-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-group-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Komunitas</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-map-pin-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Fields</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-basketball-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Sports Group</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64 pt-20">
        <div class="p-4 rounded-lg">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ asset('storage/' . (Auth::user()->photo ?? 'profile/default.jpeg')) }}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
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
            const menuLinks = document.querySelector('.menu-links');

            menuBtn.addEventListener('click', function() {
                menuLinks.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!menuBtn.contains(event.target) && !menuLinks.contains(event.target)) {
                    menuLinks.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html> 