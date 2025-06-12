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
                    <a href="{{ route('komunitas.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-group-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Komunitas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('komunitas.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-group-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Add Community</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lapangan.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('lapangan.*') ? 'bg-gray-100' : '' }}">
                        <i class="ri-map-pin-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Lapangan</span>
                     </a>
                  </li>
                  <li>
                    <a href="{{ route('sports-group.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="ri-basketball-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Sports Group</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('profile') ? 'bg-gray-100' : '' }}">
                        <i class="ri-user-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                        <span class="ml-3">Profile</span>
                     </a>
                </li>
                
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64 pt-20">
        <div class="p-4 rounded-lg">
            <h2 class="text-2xl font-bold text-red-700 mb-2 mt-4 text-center">Create Your Own Community</h2>

            <!-- Form Create Komunitas -->
            <form action="{{ route('komunitas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
                @csrf

                <a href="{{ route('komunitas.index') }}">
                    <div class="flex w-full">
                        <i class="fi fi-rs-arrow-left"></i>
                        <p class="text-xs text-gray-500 mt-0.5 ml-1">Back </p>
                    </div>
                </a>

                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <div class="mb-2">
                            <label class="block text-gray-700 font-bold text-center mr-20">Community Profile</label>
                            <img src="/asset login/img/addFoto.png" class="w-24 h-24 rounded-full items-center ml-20">
                            <input type="file" name="foto" class="w-64 h-9 border border-red-600 rounded-xl p-0 mt-2">
                        </div>
                        <div class="mb-2">
                            <label class="block text-gray-700 font-bold text-center mr-20">Cover Community</label>
                            <img src="/asset login/img/addFoto2.png" class="w-64 h-24">
                            <input type="file" name="sampul" class="w-64 h-9 border border-red-600 rounded-xl p-0 mt-2">
                        </div>
                    </div>

                    <div class="w-1/2">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Type of Sports:</label>
                            <select name="jns_olahraga" class="w-full border border-red-600 rounded-xl h-8 p-1" required>
                                <option value="" disabled selected>Choose the type of sport</option>
                                <option value="Futsal">Futsal</option>
                                <option value="Basket">Basket</option>
                                <option value="Badminton">Badminton</option>
                                <option value="Volly">Volly</option>
                                <option value="Tennis">Tennis</option>
                                <option value="Table Tennis">Table Tennis</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Community Name:</label>
                            <input type="text" name="nama" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="Enter the community name" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Maximum Members:</label>
                            <input type="number" name="max_members" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="Enter the maximum members" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Province:</label>
                            <input type="text" name="provinsi" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="Province" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">City:</label>
                            <input type="text" name="kota" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="City" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Description:</label>
                            <textarea name="deskripsi" class="w-full border border-red-600 rounded p-2 h-24" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">status</label>
                            <select name="status" class="w-full border border-red-600 rounded-xl h-8 p-1" required>
                                <option value="" disabled selected>pilih status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800" name="btnSubmit" value="Create">
                </div>
            </form>
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