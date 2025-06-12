@extends('layouts.header')

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
                        <span class="ml-3">add Sports Group</span>
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
            <div class="bg-white p-4 rounded-lg shadow mb-4">
                <h1 class="text-center font-extrabold text-xl text-red-700 mb-6">SPORTS GROUP</h1>
                @if(isset($groups) && $groups->count() > 0)
                <div class="grid grid-cols-3 gap-8">
                     @foreach($groups as $item)
                     <a href="{{ route('sports-group.show', $item->id) }}" class="no-underline">
                    <div class="my-2 p-2 bg-gray-100 relative rounded-lg shadow ">
                        <div class=" p-2 bg-red-700  rounded-md absolute -right-3 -top-3  ">
                           <i class="fa-solid fa-volleyball" style="color:white"></i>
                        </div>
                        <p class="font-semibold text-center mb-4">{{ $item->title }}</p>
                        <div class="flex items-center my-2">
                           <i class="fa-solid fa-calendar-days mx-2" style="color: #D60505;"></i>
                           <p class="sm: text-none md: text-xs font-medium lg: text-md font-medium">{{ $item->event_date }}</p>
                        </div>
                        <div class="flex items-center my-2">
                           <i class="fa-solid fa-clock mx-2" style="color: #D60505;"></i>
                           <p class="md: text-xs font-medium lg: text-md font-medium">{{ $item->start_time }} - {{$item->end_time}}</p>
                        </div>
                        <div class="flex items-center my-2 mb-10">
                           <i class="fa-solid fa-location-dot mx-2" style="color: #D60505;"></i>
                           <p class="md: text-xs font-medium lg: text-md font-medium">{{ $item->city }}</p>
                        </div>
                        <div class="py-2 items-center justify-between bg-red-700 absolute bottom-0 right-0 left-0 rounded-b-lg flex">
                           <div class="items-center mx-2 flex">
                              <i class="fa-solid fa-user-group fa-xs" style="color:white;"></i>
                              <p class="text-xs text-white">{{ $item->current_members }}/{{ $item->kapasitas_maksimal }}</p>
                           </div>
                           <div class="flex mx-2">
                              <!-- <img class="rounded-full w-6" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4cXdyD8JaA2V9NyT62jvDwgzS4CV2cmWdfA&s" alt="">
                              <img class="rounded-full w-6" src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg" alt=""> -->
                           </div>
                        </div>
                    </div>
                    </a>
                     @endforeach 
                </div>
                  @else
                  <div class="bg-white p-4 rounded-lg shadow">
                     <p class="text-center text-gray-500">No sports groups available.</p>
                  </div>
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