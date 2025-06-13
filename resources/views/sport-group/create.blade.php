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
            <div class="flex bg-white mx-2 p-2 w-full shadow-lg rounded-lg ">
                <div class="ml-2">
                    <a href="{{ route('sports-group.index') }}" class="">
                        <i class="fi fi-rs-arrow-left">Back</i>
                    </a>
                    <!-- <p class="text-xs text-gray-500 mt-0.5">Back </p> -->
                    <p class="text-xl font-semibold">Add Sports Group</p>
                </div>
            </div>
            <form action="{{ route('sports-group.store') }}" method="POST" class="bg-white shadow-md rounded-lg m-2 p-2 w-full">
            @csrf
                <h1 class="text-xl font-semibold mb-2">General Information</h1>
                <hr class="mb-2">

                <label for="title">Group Name</label><br>
                <input type="text" name="title" id="title" placeholder="Group name..." required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="event_date">Event Date</label>
                <input type="date" name="event_date" id="event_date" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" id="start_time" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="end_time">End Time</label>
                <input type="time" name="end_time" id="end_time" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="City" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Detail location..." required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="kapasitas_maksimal">Maximum Members</label>
                <input type="number" name="kapasitas_maksimal" id="kapasitas_maksimal" placeholder="0" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <label for="jenis_olahraga">Sports Type</label>
                <select name="jenis_olahraga" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300 p-2">
                    <option value="">-- Choose One --</option>
                    <option value="badminton">Badminton</option>
                    <option value="basket">Basketball</option>
                    <option value="voli">Volleyball</option>
                    <option value="futsal">Futsal</option>
                </select>

                <label>Payment Method</label><br>
                <input type="radio" name="payment_method" value="cash" required>
                <span class="text-xs ml-2">Cash</span>
                <input type="radio" name="payment_method" value="transfer" required class="ml-6">
                <span class="text-xs ml-2">Transfer</span>

                <br><label for="payment_amount" class="mt-2 block">Payment Amount</label>
                <input type="number" name="payment_amount" id="payment_amount" placeholder="0" required class="mt-1 mb-2 text-xs w-full rounded-md shadow-md border-gray-300">

                <div class="flex justify-end">
                    <button type="submit" class="bg-red-700 hover:bg-red-400 text-white font-bold py-2 px-4 mt-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>
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