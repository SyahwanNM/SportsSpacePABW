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
             @if($komunitas)
                <div class="max-w-5xl mx-auto bg-white rounded-lg overflow-hidden mt-4 shadow">
                    <!-- Header Image -->
                    <div class="relative">
                        <img src="{{ $komunitas->sampul }}" class="w-full h-32 object-cover" alt="Sampul Komunitas">
                    </div>

                    <!-- Profil Foto -->
                    <div class="flex items-center justify-center -mt-12">
                        <img src="{{ $komunitas->foto }}" alt="Logo Komunitas" class="w-32 h-32 rounded-full border-4 border-white shadow-md z-10">
                    </div>

                    <!-- Informasi Komunitas -->
                    <div class="text-center mt-4 mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $komunitas->nama }}</h2>
                        <p class="text-gray-600">{{ $komunitas->jns_olahraga }} • {{ $komunitas->kota }} • 0/{{ $komunitas->max_members }}</p>
                    </div>
                    <div class="flex justify-between items-center px-6 mb-6">
                        <a href="{{ route('komunitas.edit', $komunitas->id_kmnts)}}">
                            <button class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg">
                                Edit Komunitas
                            </button>
                        </a>    
                        <a href="detailMyKomunitas.html">
                            <button class="bg-red-600 text-white w-24 px-4 py-2 rounded-lg hover:bg-red-700">
                                JOIN
                            </button>
                        </a>
                  </div>
            </div>

                <!-- Tab Menu -->
                <div class="mt-6">
                    <div class="flex space-x-4">
                    <!-- Buttons -->
                    <button class="tab-btn bg-red-500 text-white px-4 py-2 rounded-t-lg" data-tab="About-community">About Community</button>
                    <button class="tab-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-t-lg" data-tab="Members">Members</button>
                    </div>
                </div>

                <div id="About-community" class="tab-content bg-white p-6 rounded-b-lg">
                    <div class="p-6">
                        <h3 class="text-lg  text-gray-800 mb-2">{{ $komunitas->deskripsi }}</h3>
                    </div>
                </div>

                <div id="Members" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-md">
                    <div class="grid grid-cols-2 gap-4 p-6">
                        <div>
                            <ul>
                                <!-- Friend 1 -->
                                <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <img alt="Friend 1" class="rounded-full w-10 h-10 mr-4" src="https://media.glamour.com/photos/5e8262bb259e2e0008c4082a/master/w_1600%2Cc_limit/Serena_Williams_GettyImages-1201566206.jpg" />
                                <div>
                                    <p class="font-medium">Wiyah</p>
                                    <p class="text-gray-500 text-sm">Online 3 hours ago</p>
                                </div>
                                <div class="ml-12">
                                 <i class="fa-solid fa-user-plus"></i>
                                </div>
                                </li>
                                
                                <!-- Friend 2 -->
                                <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <img alt="Friend 2" class="rounded-full w-10 h-10 mr-4" src="https://staticbiassets.in/thumb/msid-52209639,width-700,height-525,imgsize-95233/no-1-cristiano-ronaldo.jpg" />
                                <div>
                                    <p class="font-medium">Madli</p>
                                    <p class="text-gray-500 text-sm">Online 2 hours ago</p>
                                </div>
                                <div class="ml-12">
                                 <i class="fa-solid fa-user-plus"></i>
                                </div>
                                </li>
                                
                                <!-- Friend 3 -->
                                <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <img alt="Friend 3" class="rounded-full w-10 h-10 mr-4" src="https://media.istockphoto.com/id/1367872098/photo/full-length-shot-of-a-handsome-young-male-athlete-running-on-an-outdoor-track.jpg?s=612x612&w=0&k=20&c=imRu7XY3ObDjdy33ksq9MWYrzY1mj_-kfk4f5GknAsU=" />
                                <div>
                                    <p class="font-medium">Natan</p>
                                    <p class="text-gray-500 text-sm">Online 5 hours ago</p>
                                </div>
                                <div class="ml-12">
                                 <i class="fa-solid fa-user-plus"></i>
                                </div>
                                </li>
                            </ul>
                         </div>
                         <div>
                            <ul>
                                <!-- Friend 1 -->
                                <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <img alt="Friend 1" class="rounded-full w-10 h-10 mr-4" src="https://cdn.bleacherreport.net/images_root/slides/photos/001/035/856/117080847_original.jpg?1308673450" />
                                <div>
                                    <p class="font-medium">Adit</p>
                                    <p class="text-gray-500 text-sm">Online 3 hours ago</p>
                                </div>
                                <div class="ml-12">
                                 <i class="fa-solid fa-user-plus"></i>
                                </div>
                                </li>
                                
                                <!-- Friend 2 -->
                                <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <img alt="Friend 2" class="rounded-full w-10 h-10 mr-4" src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg" />
                                <div>
                                    <p class="font-medium">Dion</p>
                                    <p class="text-gray-500 text-sm">Online 2 hours ago</p>
                                </div>
                                <div class="ml-12">
                                 <i class="fa-solid fa-user-plus"></i>
                                </div>
                                </li>
                                
                                <!-- Friend 3 -->
                                <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                                <img alt="Friend 3" class="rounded-full w-10 h-10 mr-4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4cXdyD8JaA2V9NyT62jvDwgzS4CV2cmWdfA&s" />
                                <div>
                                    <p class="font-medium">Maria</p>
                                    <p class="text-gray-500 text-sm">Online 5 hours ago</p>
                                </div>
                                <div class="ml-12">
                                 <i class="fa-solid fa-user-plus"></i>
                                </div>
                                </li>
                            </ul>
                         </div>
                    </div>
                </div>
                <script>
                    // Select all buttons and tab contents
                    const tabButtons = document.querySelectorAll('.tab-btn');
                    const tabContents = document.querySelectorAll('.tab-content');
                 
                    // Add click event to each button
                    tabButtons.forEach(button => {
                       button.addEventListener('click', () => {
                          const targetTab = button.getAttribute('data-tab');
                 
                          // Hide all tabs
                          tabContents.forEach(content => content.classList.add('hidden'));
                 
                          // Remove active class from all buttons
                          tabButtons.forEach(btn => {
                             btn.classList.remove('bg-red-500', 'text-white');
                             btn.classList.add('bg-gray-200', 'text-gray-700');
                          });
                 
                          // Show the targeted tab
                          document.getElementById(targetTab).classList.remove('hidden');
                 
                          // Highlight the active button
                          button.classList.add('bg-red-500', 'text-white');
                          button.classList.remove('bg-gray-200', 'text-gray-700');
                       });
                    });
                 </script>
            @else
            <p class="text-center text-gray-500">Tidak ada data komunitas tersedia.</p>
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