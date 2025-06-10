<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Space - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background-color: rgba(220, 5, 5, 0.1);
        }
        .sidebar-item.active {
            background-color: rgba(220, 5, 5, 0.1);
            border-left: 4px solid #d60505;
        }
        .post-card {
            transition: all 0.3s ease;
        }
        .post-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 bg-white border-b border-gray-200 z-50">
        <div class="flex items-center justify-between px-6 py-3">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
                </a>
            </div>

            <!-- Search Bar -->
            <div class="flex-1 max-w-2xl mx-8">
                <div class="relative">
                    <input type="text" placeholder="Search posts, events, or users..." 
                           class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                    <button class="absolute right-3 top-2.5">
                        <i class="ri-search-line text-gray-400"></i>
                    </button>
                </div>
            </div>

            <!-- User Profile -->
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
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        @if(auth()->user()->profile_photo_path)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" 
                                 alt="{{ auth()->user()->name }}" 
                                 class="w-10 h-10 rounded-full object-cover border-2 border-red-500">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=fff&background=d60505" 
                                 alt="{{ auth()->user()->name }}" 
                                 class="w-10 h-10 rounded-full object-cover border-2 border-red-500">
                        @endif
                        <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                        <i class="ri-arrow-down-s-line text-gray-400"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" 
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="ri-user-line mr-2"></i> Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="ri-settings-3-line mr-2"></i> Settings
                        </a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="ri-logout-box-line mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="flex min-h-screen pt-16">
        <!-- Sidebar -->
        <aside class="fixed left-0 top-16 w-64 h-[calc(100vh-4rem)] bg-white border-r border-gray-200">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="sidebar-item active flex items-center px-4 py-3 text-gray-700 rounded-lg">
                            <i class="ri-home-5-line mr-3 text-xl"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                            <i class="ri-group-line mr-3 text-xl"></i>
                            <span>Komunitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                            <i class="ri-map-pin-line mr-3 text-xl"></i>
                            <span>Fields</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center px-4 py-3 text-gray-700 rounded-lg">
                            <i class="ri-team-line mr-3 text-xl"></i>
                            <span>Sports Group</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="ml-64 flex-1 p-8">
            <!-- Create Post -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex items-center space-x-4">
                    @if(auth()->user()->profile_photo_path)
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" 
                             alt="{{ auth()->user()->name }}" 
                             class="w-12 h-12 rounded-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=fff&background=d60505" 
                             alt="{{ auth()->user()->name }}" 
                             class="w-12 h-12 rounded-full object-cover">
                    @endif
                    <div class="flex-1">
                        <input type="text" placeholder="What's on your mind?" 
                               class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                    </div>
                    <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Post
                    </button>
                </div>
            </div>

            <!-- Posts Feed -->
            <div class="space-y-6">
                <!-- Sample Post -->
                <div class="post-card bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="User" 
                             class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h3 class="font-medium text-gray-900">John Doe</h3>
                            <p class="text-sm text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        Just had an amazing game of basketball! Looking for players to join our weekly games. 
                        Anyone interested?
                    </p>
                    <img src="https://images.unsplash.com/photo-1546519638-68e109acd27b" 
                         alt="Post image" class="w-full h-64 object-cover rounded-lg mb-4">
                    <div class="flex items-center space-x-4 text-gray-500">
                        <button class="flex items-center space-x-2 hover:text-red-600">
                            <i class="ri-heart-line"></i>
                            <span>Like</span>
                        </button>
                        <button class="flex items-center space-x-2 hover:text-red-600">
                            <i class="ri-chat-1-line"></i>
                            <span>Comment</span>
                        </button>
                        <button class="flex items-center space-x-2 hover:text-red-600">
                            <i class="ri-share-line"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>

                <!-- Add more sample posts here -->
            </div>
        </main>
    </div>

    <!-- Alpine.js for dropdown functionality -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
