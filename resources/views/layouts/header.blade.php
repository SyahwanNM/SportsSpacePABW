<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">SportsSpace</span>
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
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crypto-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <div class="p-4 md:p-5">
                <p class="text-sm font-normal text-gray-500">Latest notification.</p>
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
                  <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline">
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
                  <img id="headerProfileImage" class="w-10 h-10 rounded-full" src="{{ asset('storage/profile/default-profile.jpg') }}" alt="user photo">
                  </button>
               </div>
               <div class="z-50 hidden my-4 text-base list-none bg-white divide-y" id="dropdown-user">
                  <div class="px-4 py-3" role="none">
                     <p id="userName" class="text-sm text-black" role="none"></p>
                     <p id="userEmail" class="text-sm font-medium text-black truncate" role="none"></p>
                  </div>
                  <script>
                     (function(){
                        const token = localStorage.getItem('auth_token');
                        if (!token) {
                           // Kalau belum login, redirect ke login page
                           return window.location.href = "{{ route('login') }}";
                        }

                        // Function to update profile image
                        function updateProfileImage(photoUrl) {
                           const headerImage = document.getElementById('headerProfileImage');
                           if (photoUrl && photoUrl !== 'null' && photoUrl !== '') {
                              // Add timestamp to prevent caching
                              const timestamp = new Date().getTime();
                              const imageUrl = photoUrl.startsWith('http') ? photoUrl : `{{ asset('') }}${photoUrl}`;
                              headerImage.src = `${imageUrl}?t=${timestamp}`;
                              
                              // Add error handling for image loading
                              headerImage.onerror = function() {
                                 console.error('Error loading profile image:', imageUrl);
                                 this.src = "{{ asset('storage/profile/default-profile.jpg') }}";
                              };
                           } else {
                              headerImage.src = "{{ asset('storage/profile/default-profile.jpg') }}";
                           }
                        }

                        // 1. Ambil data user dan isi header
                        fetch('/api/user', {
                           headers: {
                              'Authorization': `Bearer ${token}`,
                              'Accept': 'application/json',
                              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                           }
                        })
                        .then(res => {
                           if (!res.ok) throw new Error('Not authenticated');
                           return res.json();
                        })
                        .then(user => {
                           document.getElementById('userName').textContent = user.nama_user || user.username;
                           document.getElementById('userEmail').textContent = user.email;
                           
                           // Update profile image
                           if (user.photo) {
                              updateProfileImage(user.photo);
                           }

                           // Listen for profile updates
                           window.addEventListener('profileUpdated', function(e) {
                              if (e.detail && e.detail.photo) {
                                 updateProfileImage(e.detail.photo);
                              }
                           });
                        })
                        .catch(() => {
                           // Token invalid atau expired
                           localStorage.removeItem('auth_token');
                           window.location.href = "{{ route('login') }}";
                        });
                     })();
                  </script>
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
            <button
               type="button"
               data-modal-target="logout-modal"
               data-modal-toggle="logout-modal"
               class="text-red-900 hover:bg-red-600 hover:text-white font-medium rounded-full text-sm ml-2 px-5 py-2.5"
               >
               Log Out
            </button>


               <div id="logout-modal" tabindex="-1" class="hidden …">
                  <div class="…">
                     <div class="…">
                        <!-- Tombol Close "×" -->
                        <button type="button" data-modal-hide="logout-modal">×</button>
                        <div class="p-4 text-center">
                        <h3>Are you sure you want to log out?</h3>
                        <!-- Tombol konfirmasi logout -->
                        <button
                           id="logoutConfirmBtn"
                           data-modal-hide="logout-modal"
                           class="text-white bg-red-600 … px-5 py-2.5"
                        >
                           Yes, log out
                        </button>
                        <!-- Tombol Batal -->
                        <button
                           data-modal-hide="logout-modal"
                           type="button"
                           class="py-2.5 px-5 …"
                        >
                           No, cancel
                        </button>
                        </div>
                     </div>
                  </div>
                  </div>

               <script>
                  (function(){
                  const btn = document.getElementById('logoutConfirmBtn');
                  btn.addEventListener('click', async () => {
                     const token = localStorage.getItem('auth_token');
                     try {
                        await fetch('/api/logout', {
                        method: 'POST',
                        headers: {
                           'Authorization': `Bearer ${token}`,
                           'Accept': 'application/json',
                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                        });
                     } catch (e) {
                        console.error('Logout API error', e);
                     }
                     localStorage.removeItem('auth_token');
                     window.location.href = "{{ route('login') }}";
                  });
                  })();
               </script>
            </div>
         </div>
      </div>
   </nav>