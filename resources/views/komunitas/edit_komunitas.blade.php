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
   
   </div>
   <main class="pt-20">
    <div class="flex justify-end">
        <div class="lg:w-3/5 md:w-3/5 p-4">
            <h2 class="text-2xl font-bold text-red-700 mb-2 mt-4 text-center">Create Your Own Community</h2>

            <!-- Form Create Komunitas -->
            <form action="{{ route('komunitas.update', $komunitas->id_kmnts) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
                @csrf
                @method('PUT')

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
                            <img src="{{ asset('storage/' . $komunitas->foto) }}" class="w-24 h-24 rounded-full items-center ml-20">
                            <input type="file" name="foto" class="w-64 h-9 border border-red-600 rounded-xl p-0 mt-2">
                        </div>
                        <div class="mb-2">
                            <label class="block text-gray-700 font-bold text-center mr-20">Cover Community</label>
                            <img src="{{ asset('storage/' . $komunitas->sampul) }}" class="w-64 h-24">
                            <input type="file" name="sampul" class="w-64 h-9 border border-red-600 rounded-xl p-0 mt-2">
                        </div>
                    </div>

                    <div class="w-1/2">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Type of Sports:</label>
                            <select name="jns_olahraga" class="w-full border border-red-600 rounded-xl h-8 p-1" required>
                                <option value="" disabled>Choose the type of sport</option>
                                @foreach (['Futsal', 'Basket', 'Badminton', 'Volly', 'Tennis', 'Table Tennis'] as $sport)
                                    <option value="{{ $sport }}" {{ $komunitas->jns_olahraga == $sport ? 'selected' : '' }}>{{ $sport }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Community Name:</label>
                            <input type="text" name="nama" class="w-full h-8 border border-red-600 rounded-xl p-2" value="{{ $komunitas->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Maximum Members:</label>
                            <input type="number" name="max_members" class="w-full h-8 border border-red-600 rounded-xl p-2" value="{{ $komunitas->max_members }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">Province:</label>
                            <input type="text" name="provinsi" class="w-full h-8 border border-red-600 rounded-xl p-2" value="{{ $komunitas->provinsi }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold">City:</label>
                            <input type="text" name="kota" class="w-full h-8 border border-red-600 rounded-xl p-2" value="{{ $komunitas->kota }}" required>
                        </div>

                        <div class="mb-3">
                           <label class="block text-gray-700 font-bold">Description:</label>
                           <textarea name="deskripsi" class="w-full border border-red-600 rounded p-2 h-24" required>{{ old('deskripsi', $komunitas->deskripsi) }}</textarea>
                       </div>  
                       <div class="mb-4">
                        <label for="status" class="block font-medium text-gray-700">Status Komunitas</label>
                        <select name="status" id="status" class="w-full border-gray-300 rounded-lg px-4 py-2">
                            <option value="aktif" {{ old('status', $komunitas->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ old('status', $komunitas->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>                     
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800" value="Update">
                </div>
            </form>

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
</main>
</body>
</html>