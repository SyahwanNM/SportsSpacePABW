<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sports Space</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-red-600">Sports Space</h1>
                <p class="text-gray-600 text-sm">Admin Panel</p>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ request()->routeIs('admin.dashboard') ? 'bg-red-50 text-red-600' : '' }}">
                    <i class="ri-dashboard-line mr-3"></i>
                    Dashboard
                </a>
                <li>
                    <a href="{{ route('admin.lapangan.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-football-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Fields</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-user-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Users</span>
                    </a>
                </li>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600">
                        <i class="ri-logout-box-line mr-3"></i>
                        Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html> 