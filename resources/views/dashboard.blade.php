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
</head>
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
<body class="bg-gray-100">
   <nav class="fixed top-0 z-50 w-full bg-white border-red-700">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-black rounded-lg sm:hidden hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
            <a href="#" class="flex ms-2 md:me-24">
            <img src="/images/logo.png" class="h-10 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SportsSpace</span>
            </a>
         </div>
         
         <div class="flex items-center w-1/2 mr-40">
            <div class="rounded-full bg-gray-200 hover:bg-red-500 mr-2">
               <button class="p-2 rounded-full bg-gray-200 hover:bg-red-500">
                  <i class="fi fi-rs-bars-filter"></i>
               </button>
            </div>
            <input class="border rounded-full px-6 py-2 w-full" placeholder="Search Here" type="text" />
            <button class="ml-2 p-2 rounded-full bg-gray-200 hover:bg-gray-300">
               <i class="fi fi-rs-search"></i>
            </button>
         </div>
         
         <div class="relative">
            <button id="bellButton" class="p-2 rounded-full bg-gray-200 hover:bg-red-500">
              <i class="fi fi-rs-bell"></i>
            </button>
            <div id="crypto-modal" tabindex="-1" aria-hidden="true" class="hidden absolute top-full left-0 z-50 bg-white rounded-lg shadow w-64">
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                  Notification
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crypto-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <div class="p-4 md:p-5">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Latest notification.</p>
                <ul>
                  <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                     <img alt="Friend 1" class="rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/oDJoEMVqSvYhGBkeGM3OOYudbjHWHZwNX96KKC7DZwRfiF1TA.jpg" width="30"/>
                     <div>
                        <p class="text-sm">Permintaan berteman</p>
                        <p class="text-gray-500 text-sm">Aizen</p>
                     </div>
                  </li>
                  <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                     <img alt="Friend 1" class="rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/oDJoEMVqSvYhGBkeGM3OOYudbjHWHZwNX96KKC7DZwRfiF1TA.jpg" width="30"/>
                     <div>
                        <p class="text-sm">Permintaan berteman</p>
                        <p class="text-gray-500 text-sm">Ikbal</p>
                     </div>
                  </li>
                  <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                     <img alt="Friend 1" class="rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/oDJoEMVqSvYhGBkeGM3OOYudbjHWHZwNX96KKC7DZwRfiF1TA.jpg" width="30"/>
                     <div>
                        <p class="text-sm">Permintaan berteman</p>
                        <p class="text-gray-500 text-sm">mr.pulltea</p>
                     </div>
                  </li>
      
               </ul>
                <div>
                  <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    More information</a>
                </div>
              </div>
            </div>
          </div>
          
          <script>
            const bellButton = document.getElementById('bellButton');
            const cryptoModal = document.getElementById('crypto-modal');
          
            bellButton.addEventListener('click', () => {
              cryptoModal.classList.toggle('hidden');
            });
          
            const closeModalButton = cryptoModal.querySelector('[data-modal-toggle="crypto-modal"]');
            closeModalButton.addEventListener('click', () => {
              cryptoModal.classList.add('hidden');
            });
          </script>

            <div class="flex items-center ms-3">
               <div>
                  <button type="button" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-red-500" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-10 h-10 rounded-full" src="/image/football.jpg" alt="user photo">
                  </button>
               </div>
               <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-red-200 rounded shadow" id="dropdown-user">
                  <div class="px-4 py-3" role="none">
                  <p class="text-sm text-black" role="none">
                     Fadil Rahman
                  </p>
                  <p class="text-sm font-medium text-black truncate" role="none">
                     Fadilrahman@gmail.com
                  </p>
                  </div>
                  <ul class="py-1" role="none">
                     <li>
                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-red-700 hover:text-white" role="menuitem">About Us</a>
                     </li>
                     <li>
                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-red-700 hover:text-white" role="menuitem">Contact Us</a>
                     </li>
                     <li>
                        <a href="#" class="block px-4 py-2 text-black hover:bg-red-700 hover:text-white" role="menuitem">Settings</a>
                     </li>
                  </ul>
               </div>
            </div>
            <button data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="text-red-900 hover:bg-red-600 hover:text-white font-medium rounded-full text-sm ml-2 px-5 py-2.5 text-center" type="button">
               Log Out
            </button>

               <div id="logout-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                     <div class="relative bg-white rounded-lg shadow dark:bg-white">
                        <!-- Tombol Close -->
                        <button type="button" class="absolute top-3 end-2.5 text-red-600 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-red-700 dark:hover:text-white" data-modal-hide="logout-modal">
                           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                           </svg>
                           <span class="sr-only">Close modal</span>
                        </button>
                           
                           <!-- Konten Modal -->
                        <div class="p-4 md:p-5 text-center">
                           <h3 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-900">Are you sure you want to log out?</h3>
                              
                           <!-- Tombol Yes -->
                           <a href="/landingpage/firstpage.html" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                              Yes, log out
                           </a>
                              
                           <!-- Tombol No -->
                           <button data-modal-hide="logout-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                              No, cancel
                           </button>
                        </div>
                     </div>
                  </div>
               </div>  
            </div>
         </div>
      </div>
   </nav>
   
   <aside id="logo-sidebar" class="fixed top-0 left-6 z-40 lg:w-64 md:w-48 sm:w-32 h-[87vh] pt-20 transition-transform -translate-x-full bg-white border-r sm:translate-x-0" aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
         <ul class="space-y-2 text-sm">
            <li>
               <a href="#" class="flex items-center p-2 text-white bg-red-700 rounded-lg  group">
                  <i class="fi fi-rs-home">
                  </i>
                  <span class="ms-3">Dashboard</span>
               </a>
            </li>

            <li>
               <a href="/komunitas/komunitas.html" class="flex items-center w-full p-2 text-sm text-black hover:bg-red-700 hover:bg-red-700 hover:text-white duration-75 rounded-lg group" 
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
                        <a href="/komunitas/addKomunitas.html" class="flex items-center w-full p-2 text-black hover:bg-red-700 hover:text-white transition duration-75 rounded-lg pl-11">Add Community</a>
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
               <a href="/fields/fields.html" class="flex text-sm items-center w-full p-2 text-black hover:bg-red-700 text-black hover:text-white rounded-lg group" 
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
                        <a href="/fields/add-fields.html" class="flex items-center w-full p-2 text-black hover:bg-red-600 hover:text-white transition duration-75 rounded-lg pl-11">Add Fields</a>
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
               <a href="/rewards/rewards.html" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
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
               <a href="/profile/profile.html" class="flex items-center p-2 text-sm text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-user">
                  </i>
                  <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
               </a>
            </li>
         </ul>
      </div>
   </aside>

    <main class="pt-20 pb-20">
        <div class="flex justify-end">
            <!-- Main Content -->
            <div class="lg:w-4/5 md:w-4/5 p-4">
                <!-- Banner -->
                <div class="flex mb-4">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-60 overflow-hidden md:h-75">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/image/basketball-court.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/image/indoors-tennis-court.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/image//runway-stadium.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/image/futsal-yogya1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="w-1/3 h-60 bg-red-700 text-white flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-xl font-bold">MAKE YOUR FUN</p>
                        <p class="text-4xl font-bold">DOING SPORTS</p>
                        <p class="text-sm">ANYWHERE YOU WANT</p>
                    </div>
                </div>
                </div>
                <!-- Weekly Activity -->
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                <h2 class="text-2xl font-bold text-red-700 mb-2">Weekly Activity</h2>
                <p class="text-gray-500 mb-4">Activity Feed</p>
                <button id="createPostBtn" class="text-blue-500 flex items-center hover:text-blue-700">
                        Buat Postingan
                        <i class="fas fa-plus ml-2"></i>
                    </button>
                
                    <!-- Form to add a post, initially hidden -->
                    <div id="postForm" class="hidden mt-4">
                        <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data" class="bg-gray-100 p-4 rounded-lg shadow">
                        @csrf
                        <div class="mb-4">
                            <label for="post_title" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" id="post_title" name="post_title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="post_content" class="block text-sm font-medium text-gray-700">Konten</label>
                            <textarea id="post_content" name="post_content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="post_image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                            <input type="file" id="post_image" name="post_image" accept="image/*" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
                        </form>
                    </div>
                    
                    <script>
                        // JavaScript to toggle form visibility
                        document.getElementById('createPostBtn').addEventListener('click', function() {
                        const form = document.getElementById('postForm');
                        form.classList.toggle('hidden');
                        });
                    </script>
                </div>
          
                <!-- Post Content -->
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <div class="flex items-center mb-4">
                        <img alt="User Profile" class="rounded-full w-12 h-12" src="/image/football.jpg" />
                        <div class="ml-3">
                        <p class="font-bold">Fadil</p>
                        <p class="text-gray-500 text-sm">Hari ini 6.59 PM</p>
                        </div>
                    </div>
                    <p class="mb-4">Rutinitas di hari libur!</p>
                    <div
                        class="w-full h-64 bg-cover bg-center rounded-lg mb-4 cursor-pointer"
                        style="background-image: url('https://storage.googleapis.com/a1aa/image/j2eYnaJFczzsHC1aZzAyEOWuAIEeteVgrKnucLWeSwGxLWUPB.jpg');"
                        data-popup-target="image-popup-1"
                    >
                    </div>
                    <!-- Popup Gambar -->
                    <div id="image-popup-1" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
                        <div class="relative bg-white p-6 rounded-lg shadow-lg max-w-3xl w-full">
                        <!-- Tombol Close -->
                        <button
                            class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl"
                            data-popup-close
                        >
                            &times;
                        </button>
                        <!-- Gambar -->
                        <div class="flex justify-center mb-4">
                            <img
                            src="https://storage.googleapis.com/a1aa/image/j2eYnaJFczzsHC1aZzAyEOWuAIEeteVgrKnucLWeSwGxLWUPB.jpg"
                            alt="Full Image"
                            class="max-w-full max-h-96 rounded-lg"
                            />
                        </div>
                        <!-- Tombol Keluar -->
                        <div class="flex justify-center">
                            <button
                            class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600"
                            data-popup-close
                            >
                            Keluar
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <button 
                            class="flex items-center text-gray-500 hover:text-red-500">
                            <i class="fi fi-rs-heart mr-1"></i>
                            Like
                        </button>
                        <button 
                            id="comment-btn-1" 
                            class="flex items-center text-gray-500 hover:text-green-500"
                            onclick="toggleCommentSection('comment-section-1')">
                            <i class="fi fi-rs-comment-alt mr-1"></i>
                            Comment
                        </button>
                    </div>
                    <div id="comment-section-1" class="hidden mt-4">
                        <textarea 
                            class="w-full border border-gray-300 rounded-lg p-2 mb-2 focus:ring focus:ring-blue-300" 
                            placeholder="Write your comment..."></textarea>
                        <div class="flex justify-end">
                            <button 
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                            onclick="submitComment('comment-section-1')">
                            Submit
                            </button>
                        </div>
                        </div>
                    </div>
                    <!-- Sidebar -->
                    <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4">
                        <div class="fixed md:relative sm:relative">
                            <!-- Friends List -->
                            <div class="bg-white p-4 rounded-lg shadow mb-4">
                            <h3 class="text-md font-bold mb-4">Friend</h3>
                            <ul>
                                <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                                    <img alt="Friend 1" class="rounded-full mr-2 w-8 h-8" src="https://storage.googleapis.com/a1aa/image/oDJoEMVqSvYhGBkeGM3OOYudbjHWHZwNX96KKC7DZwRfiF1TA.jpg"/>
                                    <div>
                                        <p class="text-sm">Wiyah</p>
                                        <p class="text-gray-500 text-sm">Online 3 hours ago</p>
                                    </div>
                                </li>
                                <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                                    <img alt="Friend 1" class="rounded-full mr-2 w-8 h-8" src="https://images.ctfassets.net/szez98lehkfm/owPUbtQc7an5ZEJhpHR6O/ae13d4541082f75d1bdba669f42487bb/MyIC_Article_98642"/>
                                    <div>
                                        <p class="text-sm">Jamson</p>
                                        <p class="text-gray-500 text-sm">Online yesterday</p>
                                    </div>
                                </li>
                                <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                                    <img alt="Friend 1" class="rounded-full mr-2 w-8 h-8"src="https://www.snexplores.org/wp-content/uploads/2020/05/1030_sports_science_numbers-1030x579.jpg"/>
                                    <div>
                                        <p class="text-sm">Andreas</p>
                                        <p class="text-gray-500 text-sm" w-8 h-8>Online 5 hours ago</p>
                                    </div>
                                </li>
                            </ul>
                            </div>
                            <!-- Incoming Activity -->
                            <div class="bg-white p-4 rounded-lg shadow">
                            <h3 class="text-md text-red-700 font-bold mb-4">Incoming Activity</h3>
                            <div class="flex items-center mb-2 hover:bg-gray-100 hover:scale-105 transform p-2 rounded-lg">
                                <div class="bg-red-700 text-white rounded-full w-10 h-10 flex items-center justify-center mr-2">
                                    <p class="font-bold">20</p>
                                </div>
                                <div>
                                    <p class="text-sm">Futsal</p>
                                    <p class="text-gray-500 text-sm">18.00 - 20.00</p>
                                    <p class="text-gray-500 text-sm">Fun Game Bersama</p>
                                </div>
                            </div>
                            <div class="flex items-center mb-2 hover:bg-gray-100 hover:scale-105 transform p-2 rounded-lg">
                                <div class="bg-red-700 text-white rounded-full w-10 h-10 flex items-center justify-center mr-2">
                                    <p class="font-bold">20</p>
                                </div>
                                <div>
                                    <p class="text-sm">Badminton</p>
                                    <p class="text-gray-500 text-sm">14.00 - 16.00</p>
                                    <p class="text-gray-500 text-sm">Fun Game Bersama</p>
                                </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </main>
  
    <script>
  
      // JavaScript to toggle comment section visibility
      function toggleCommentSection(id) {
        const commentSection = document.getElementById(id);
        commentSection.classList.toggle('hidden');
      }
  
      // JavaScript to show image popup
      function showImagePopup() {
        document.getElementById('image-popup').classList.remove('hidden');
      }
  
      // JavaScript to close image popup
      function closeImagePopup() {
        document.getElementById('image-popup').classList.add('hidden');
      }
  
      // JavaScript to handle comment submission
      function submitComment(id) {
        const commentSection = document.getElementById(id);
        // Handle comment submission logic here
        toggleCommentSection(id); // Hide comment section after submission
      }
    </script>
</body>

<footer class="bg-white rounded-lg shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-1 xl:p-2 antialiased fixed bottom-0 w-full">
   <p class="mb-4 text-sm text-center text-gray-500 sm:mb-0">
       &copy; 2024 <a href="# class="hover:underline target="_blank">Sports Space</a>. All rights reserved.
   </p>
   <div class="flex justify-center items-center space-x-1">
     <a href="#" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
         <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
             <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
         </svg>
         <span class="sr-only">Facebook</span>
     </a>
     <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
         Like us on Facebook
         <div class="tooltip-arrow" data-popper-arrow></div>
     </div>
     <a href="#" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
         <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
             <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
         </svg>
         <span class="sr-only">Twitter</span>
     </a>
     <div id="tooltip-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
         Follow us on Twitter
         <div class="tooltip-arrow" data-popper-arrow></div>
     </div>
     <a href="#" data-tooltip-target="tooltip-github" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
         <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
             <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
         </svg>
         <span class="sr-only">Github</span>
     </a>
     <div id="tooltip-github" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
         Star us on GitHub
         <div class="tooltip-arrow" data-popper-arrow></div>
     </div>
     <a href="#" data-tooltip-target="tooltip-dribbble" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
         <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
             <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
         </svg>
         <span class="sr-only">Dribbble</span>
     </a>
     <div id="tooltip-dribbble" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
         Follow us on Dribbble
         <div class="tooltip-arrow" data-popper-arrow></div>
     </div>
 </div>
</footer>
</html>
