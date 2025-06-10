<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Sports Space</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    


<!-- commit pertama di branch -->
<style>
   body {
      font-family: 'Plus Jakarta Sans', sans-serif;
   }
   
  #crypto-modal {
    max-width: 300px;
    margin-top: 10px;
    transform: translateX(-100px);
  }
</style>
@stack('scripts')
<body class="bg-gray-100 min-h-screen">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="logo-sidebar" class="fixed top-0 left-6 z-40 lg:w-64 md:w-48 sm:w-32 h-[87vh] pt-20 transition-transform -translate-x-full bg-white border-r sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
               <ul class="space-y-2 text-sm">
                  <li>
                     <a href="{{ route('dashboard') }}" class="flex items-center w-full p-2 text-sm text-black hover:bg-red-700 hover:bg-red-700 hover:text-white duration-75 rounded-lg group" >
                        <i class="fi fi-rs-home">
                        </i>
                        <span class="ms-3">Dashboard</span>
                     </a>
                  </li>
      
                  <li>
                     <a href="{{ route('komunitas.index') }}" class="flex items-center w-full p-2 text-sm text-black hover:bg-red-700 hover:bg-red-700 hover:text-white duration-75 rounded-lg group" 
                        aria-controls="dropdown-example" 
                        data-collapse-toggle="dropdown-example">
                        <i class="fi fi-rs-users-alt"></i>   
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Community</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                     </a>
                     <ul id="dropdown-example" class="hidden py-2 space-y-2">
                           <li>
                              <a href="/komunitas/myKomunitas.html" class="flex items-center w-full p-2 text-black hover:bg-red-700 hover:text-white transition duration-75 rounded-lg pl-11">My Community</a>
                           </li>
                           <li>
                              <a href="{{ route('komunitas.create') }}" class="flex items-center w-full p-2 text-black hover:bg-red-700 hover:text-white transition duration-75 rounded-lg pl-11">Add Community</a>
                           </li>
                     </ul>
                  </li>
                  
                  <script>
                     document.addEventListener('DOMContentLoaded', () => {
                        const menuButton = document.querySelector('[data-collapse-toggle="dropdown-example"]');
                        const submenu = document.getElementById('dropdown-example');
                        const dropdownIcon = menuButton.querySelector('svg');
                  
                        // Klik pada menu utama (bukan ikon dropdown) akan membuka halaman
                        menuButton.addEventListener('click', (event) => {
                           if (event.target === dropdownIcon || dropdownIcon.contains(event.target)) {
                              event.preventDefault(); // Hanya cegah navigasi jika ikon diklik
                              submenu.classList.toggle('hidden');
                           }
                        });
                  
                        // Cegah submenu menutup ketika salah satu opsinya diklik
                        submenu.addEventListener('click', (event) => {
                           event.stopPropagation(); // Hindari penutupan submenu
                        });
                     });
                  </script>
                  <li>
                     <a href="{{ route('fields.index') }}" class="flex text-sm items-center w-full p-2 text-black hover:bg-red-700 text-black hover:text-white rounded-lg group" 
                        aria-controls="dropdown-fields" 
                        data-collapse-toggle="dropdown-fields">
                        <i class="fi fi-rs-court-sport">
                        </i>   
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Fields</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                     </a>
                     <ul id="dropdown-fields" class="hidden py-2 space-y-2">
                           <li>
                              <a href="{{ route('fields.index') }}" class="flex items-center w-full p-2 text-black hover:bg-red-600 hover:text-white transition duration-75 rounded-lg pl-11">Add Fields</a>
                           </li>
                     </ul>
                  </li>
                  
                  <script>
                     document.addEventListener('DOMContentLoaded', () => {
                        const menuButton = document.querySelector('[data-collapse-toggle="dropdown-fields"]');
                        const submenu = document.getElementById('dropdown-fields');
                        const dropdownIcon = menuButton.querySelector('svg');
                  
                        // Klik pada menu utama (bukan ikon dropdown) akan membuka halaman
                        menuButton.addEventListener('click', (event) => {
                           if (event.target === dropdownIcon || dropdownIcon.contains(event.target)) {
                              event.preventDefault(); // Hanya cegah navigasi jika ikon diklik
                              submenu.classList.toggle('hidden');
                           }
                        });
                  
                        // Cegah submenu menutup ketika salah satu opsinya diklik
                        submenu.addEventListener('click', (event) => {
                           event.stopPropagation(); // Hindari penutupan submenu
                        });
                     });
                  </script>
                  <li>
                     <a href="/ .html" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                        <i class="fi fi-rs-trophy-star"></i>
                        </i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Reward</span>
                     </a>
                  </li>
                  <li>
                     <a href="/sports-group/sports-group.html" class="flex items-center p-2 text-sm text-black rounded-lg hover:bg-red-700 hover:text-white group" 
                        aria-controls="dropdown-sportsgroup" 
                        data-collapse-toggle="dropdown-sportsgroup">
                        <i class="fi fi-rs-users-alt"></i>   
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Sports Group</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                     </a>
                     <ul id="dropdown-sportsgroup" class="hidden py-2 space-y-2">
                           <li>
                              <a href="/sports-group/add-sportsgroup.html" class="flex items-center p-2 text-sm text-black rounded-lg hover:bg-red-700 hover:text-white group">Add Sports Group</a>
                           </li>
                     </ul>
                  </li>
                  
                  <script>
                     document.addEventListener('DOMContentLoaded', () => {
                        const menuButton = document.querySelector('[data-collapse-toggle="dropdown-sportsgroup"]');
                        const submenu = document.getElementById('dropdown-sportsgroup');
                        const dropdownIcon = menuButton.querySelector('svg');
                  
                        // Klik pada menu utama (bukan ikon dropdown) akan membuka halaman
                        menuButton.addEventListener('click', (event) => {
                           if (event.target === dropdownIcon || dropdownIcon.contains(event.target)) {
                              event.preventDefault(); // Hanya cegah navigasi jika ikon diklik
                              submenu.classList.toggle('hidden');
                           }
                        });
                  
                        // Cegah submenu menutup ketika salah satu opsinya diklik
                        submenu.addEventListener('click', (event) => {
                           event.stopPropagation(); // Hindari penutupan submenu
                        });
                     });
                  </script>
                  <li>
                     <a href="{{ route('profile.index') }}" class="flex items-center p-2 text-sm text-black rounded-lg hover:bg-red-700 hover:text-white group">
                        <i class="fi fi-rs-user"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                     </a>
                  </li>
               </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="lg:w-4/5 md:w-4/5 p-4">
            <div class="flex justify-end">
                <div class="lg:w-4/5 md:w-4/5 p-4">
                    @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

</body>

</html>