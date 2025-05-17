@extends('layouts.sidebar')
@extends('layouts.header')
@extends('layouts.footer')

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
    
</head>
<style>
     #logo-sidebar {
    width: 250px; /* Sesuaikan dengan lebar sidebar yang diinginkan */
    transition: transform 0.3s ease-in-out;
}

@media (max-width: 768px) {
    #logo-sidebar {
        width: 200px; /* Sesuaikan ukuran sidebar di perangkat mobile */
    }
}
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
   <main class="py-16 pr-16">
      <div class="flex justify-end">
         <!-- Main Content -->
         <div class="lg:w-3/5 md:w-3/5 p-4 ">  
            <h2 class="text-2xl font-bold text-red-700 mb-2">Preferred Community</h2>
            <div class="flex space-x-4 overflow-x-auto gap-4 pb-4 pr-4">
               <!-- Card 1 -->
               @foreach ($komunitas as $item)
               <div class="bg-white shadow-lg rounded-lg p-4 m-1 w-45 hover:bg-gray-300 flex-shrink-0 relative">
                  <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded-lg mb-3 w-32 h-32 border-2 border-gray-300">
                  <h4 class="font-bold text-md">{{ $item->nama }}</h4>
                  <div class="flex items-center text-sm text-gray-600">
                     <span>{{ $item->jns_olahraga }}</span>
                  </div>
                  <p class="text-sm text-gray-500">{{ $item->kota }}</p>
                  <div class="flex justify-between items-center mt-2 text-sm text-gray-600">
                     <p>0/{{ $item->max_members }}</p>
                     <i class="fas fa-user"></i>
                  </div>

                  <!-- Menambahkan status komunitas -->
                  <div class="mt-2">
                     <span class="text-sm {{ $item->status == 'aktif' ? 'text-green-600' : 'text-red-600' }}">
                           {{ ucfirst($item->status) }}
                     </span>
                  </div>

                  <a href="{{ route('komunitas.edit', $item->id_kmnts)}}" class="absolute top-2 right-2 text-sm text-blue-500 hover:text-blue-700">
                     <i class="fas fa-edit"></i> Edit
                  </a>
               </div>
               @endforeach
            </div>
            
            <h2 class="text-2xl font-bold text-red-700 mb-2 mt-4">Community in Your City</h2>
            <div class="flex space-x-4 overflow-x-auto gap-4 pb-4 pr-4">
               <!-- Card 1 -->
               
            </div>   
         </div>
         <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4">
            <div class="fixed md:relative sm:relative">
               <!-- Friends List -->
               <div class="bg-white p-4 rounded-lg shadow mb-4">
                  <h3 class="text-md font-bold mb-4">Friend</h3>
                  <ul>
                     <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                        <img alt="Friend 1" class="rounded-full mr-2 w-8 h-8" src="https://storage.googleapis.com/a1aa/image/oDJoEMVqSvYhGBkeGM3OOYudbjHWHZwNX96KKC7DZwRfiF1TA.jpg""/>
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
                        <p class="text-sm">Badminton</p>
                        <p class="text-gray-500 text-sm">14.00 - 16.00</p>
                        <p class="text-gray-500 text-sm">Fun Game Bersama</p>
                     </div>
                  </div>
                  <div class="flex items-center mb-2 hover:bg-gray-100 hover:scale-105 transform p-2 rounded-lg">
                     <div class="bg-red-700 text-white rounded-full w-10 h-10 flex items-center justify-center mr-2">
                        <p class="font-bold">20</p>
                     </div>
                     <div>
                        <p class="text-sm">Futsal</p>
                        <p class="text-gray-500 text-sm">08.00 - 10.00</p>
                        <p class="text-gray-500 text-sm">Sisfo Fun</p>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
   </div>
   </main>
</body>
</html>