<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Sports Space</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
                    <a href="{{ route('sports-group.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
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
            @if($groups)
            <div class="h-auto bg-white rounded-lg p-4 shadow-xl">
                <!-- Flex container untuk back button dan title -->
                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('sports-group.index') }}" class="flex items-center text-gray-500 hover:text-red-700 transition-colors">
                        <i class="fi fi-rs-arrow-left"></i>
                        <p class="text-lg mt-0.5 ml-1"><-- Back</p>
                    </a>

                    <h1 id="title" class="font-bold text-red-700 text-2xl text-center flex-grow">
                        {{ $groups->title }}
                    </h1>

                    <div class="w-28"></div>
                </div>
            </div>

            <!-- Flex container untuk Date & Time dan Organizer -->
            <div class="pt-10 flex gap-4">
                <!-- Date and Time -->
                <div class="w-1/2 h-auto bg-white rounded-lg p-4 shadow-xl">
                    <h2 class="text-lg font-semibold mb-4">Date and Time</h2>
                    <div class="flex items-center mb-2">
                        <i class="fa-regular fa-calendar" style="color: #D60505;"></i>
                        <p id="event-date" class="text-sm ml-4">{{ $groups->event_date }}</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-regular fa-clock" style="color: #D60505;"></i>
                        <p id="event-time" class="text-sm ml-4">{{ $groups->start_time }} - {{ $groups->end_time }}</p>
                    </div>
                    <h2 class="text-lg font-semibold my-4">Venue</h2>
                    <div class="flex items-center">
                        <i class="fi fi-rs-court-sport" style="color: #D60505;"></i>
                        <p id="venue-name" class="text-sm ml-4">{{ $groups->address }}</p>
                    </div>
                </div>

                <!-- Organizer -->
                <div class="w-1/2 h-auto bg-white rounded-lg p-4 shadow-xl">
                <h2 class="text-lg font-semibold mb-4">Group Members</h2>

                @foreach ($groups->members as $member)
                    <div class="flex items-center mb-3">
                        <img src="{{ Auth::user()->photo }}" alt="Member Photo" class="w-10 h-10 rounded-full">
                        <div class="ml-4">
                            <p class="text-sm font-semibold">{{ $member->user->username }}</p>
                            <p class="text-xs text-gray-500">{{ $member->user->email }}</p>
                            @if ($member->user_id == $groups->user_id)
                                <span class="text-xs text-blue-600 font-semibold">(Organizer)</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            </div>

            <!-- Section bawah: Join/Edit, Lokasi dan Maps -->
            <div class="h-auto bg-white rounded-lg p-4 shadow-xl mt-6">
                <h1 id="price" class="text-xl text-red-700 font-bold text-center">{{ $groups->current_members }} / {{ $groups->kapasitas_maksimal }}</h1>

                @php
                    $isCreator = Auth::id() === $groups->user_id;
                    $isMember = \App\Models\MemberSportsgroup::where('id', $groups->id)->where('user_id', Auth::id())->exists();
                @endphp

                @if ($isCreator)
                    <a href="{{ route('sports-group.edit', $groups->id) }}" class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">Edit Group</a>
                @elseif ($isMember)
                    <form action="{{ route('sports-group.leave', $groups->id) }}" method="POST" onsubmit="return confirm('Yakin ingin keluar dari grup?');">
                        @csrf
                        <button type="submit" class="w-full bg-orange-600 text-white py-2 rounded hover:bg-orange-700">Leave Group</button>
                    </form>
                @else
                    <form action="{{ route('sports-group.join', $groups->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-red-700 text-white py-2 rounded hover:bg-red-800">Join Group</button>
                    </form>
                @endif

                <div class="flex mt-4 items-center">
                    <i class="fa-solid fa-map-location-dot fa-lg" style="color: #d60505;"></i>
                    <p class="text-lg font-semibold ml-4">Location</p>
                </div>
                <p id="full-address" class="text-sm ml-10">{{ $groups->address }}</p>

                <iframe class="w-full h-80 mt-4"
                    src="https://www.google.com/maps?q=Jl.%20Banda%20No.28,%20Citarum,%20Bandung&output=embed"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            @else
            <p class="text-center text-gray-500">Tidak ada data sportsgroup tersedia.</p>
            @endif
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