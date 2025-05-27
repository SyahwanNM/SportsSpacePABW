@extends('layouts.sidebar')
@extends('layouts.header')
@extends('layouts.footer')

@section('title', 'Profile')

@section('content')
<main class="pt-20 pb-20">
    <div class="flex justify-end">
        <!-- Main Content -->
        <div class="lg:w-4/5 md:w-4/5 p-4">
            <!-- Profile Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center space-x-6">
                    <img alt="Profile Picture" class="w-24 h-24 rounded-full" height="100" 
                         src="{{ asset('/image/football.jpg') }}" width="100"/>
                    <h2 class="text-xl font-bold">FADIL RAHMAN</h2>
                </div>
                <div class="grid grid-cols-3 gap-10 mt-4">
                    <div>
                        <p>Email</p>
                        <p class="font-semibold">fadil@gmail.com</p>
                    </div>
                    <div>
                        <p>Name</p>
                        <p class="font-semibold">Fadil Rahman</p>
                    </div>
                    <div>
                        <p>Gender</p>
                        <p class="font-semibold">Male</p>
                    </div>
                    <div>
                        <p>City</p>
                        <p class="font-semibold">Bandung</p>
                    </div>
                    <div>
                        <p>Phone Number</p>
                        <p class="font-semibold">0822-5678-9012</p>
                    </div>
                    <div>
                        <p>Favorite Sports</p>
                        <p class="font-semibold">Running</p>
                        <p class="font-semibold">Football</p>
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}"> 
                    <button class="mt-4 px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Edit Profil
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-10">
        <div class="lg:w-4/5 md:w-4/5 p-4">
            <div class="mt-4">
                <div class="text-sm font-medium text-center text-gray-800 border-b w-full border-black mb-4">
                    <ul class="flex justify-center mb-6">
                        <li class="me-2">
                            <a href="#" class="tab-btn p-4 rounded-t-lg hover:text-red-700 border-b-2 border-red-600 text-red-700" data-tab="my-posts">My Post</a>
                        </li>
                        <li class="me-2">
                            <a href="#" class="tab-btn p-4 rounded-t-lg hover:text-red-700 border-b-2 border-transparent text-gray-500" data-tab="friends">Friend</a>
                        </li>
                        <li class="me-2">
                            <a href="#" class="tab-btn p-4 rounded-t-lg hover:text-red-700 border-b-2 border-transparent text-gray-500" data-tab="favorite-venue">Favorite Venue</a>
                        </li>
                    </ul>
                </div>      

                <div id="my-posts" class="tab-content bg-white p-6 rounded-b-lg shadow-md">
                    <!-- Post #1 -->
                    <div class="border border-gray-300 rounded-lg p-4 max-w-md">
                        <div class="flex items-center space-x-4">
                            <img alt="User Profile Picture" class="h-10 w-10 rounded-full" src="{{ asset('/image/football.jpg') }}" />
                            <div>
                                <p class="font-bold">Fadil</p>
                                <p class="text-gray-500">Today 6.59 PM</p>
                            </div>
                        </div>
                        <p class="mt-4">Rutinitas dihari libur!</p>
                        <img alt="Post Image" class="mt-4 max-w-full rounded-lg" src="https://storage.googleapis.com/a1aa/image/j2eYnaJFczzsHC1aZzAyEOWuAIEeteVgrKnucLWeSwGxLWUPB.jpg" />
                    </div>

                    <!-- Post #2 -->
                    <div class="border border-gray-300 rounded-lg p-4 max-w-md mt-6">
                        <div class="flex items-center space-x-4">
                            <img alt="User Profile Picture" class="h-10 w-10 rounded-full" src="{{ asset('/image/football.jpg') }}" />
                            <div>
                                <p class="font-bold">Fadil</p>
                                <p class="text-gray-500">Yesterday, 10.00 AM</p>
                            </div>
                        </div>
                        <p class="mt-4">Sunday Morning Run</p>
                        <img alt="Post Image" class="mt-4 max-w-full rounded-lg" src="https://images.squarespace-cdn.com/content/v1/5cfdd3abcdc28e0001b33b62/1576799688955-G24BLZ3EGYBS018S3NJO/athlete.jpg" />
                    </div>
                </div>

                <div id="friends" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-md">
                    <h2 class="font-bold text-xl mb-4">Friends List</h2>
                    <ul>
                        <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                            <img alt="Friend 1" class="rounded-full w-10 h-10 mr-4" src="https://via.placeholder.com/150" />
                            <div>
                                <p class="font-medium">Wiyah</p>
                                <p class="text-gray-500 text-sm">Online 3 hours ago</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                            <img alt="Friend 2" class="rounded-full w-10 h-10 mr-4" src="https://via.placeholder.com/150" />
                            <div>
                                <p class="font-medium">Madli</p>
                                <p class="text-gray-500 text-sm">Online 2 hours ago</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                            <img alt="Friend 3" class="rounded-full w-10 h-10 mr-4" src="https://via.placeholder.com/150" />
                            <div>
                                <p class="font-medium">Natan</p>
                                <p class="text-gray-500 text-sm">Online 5 hours ago</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div id="favorite-venue" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-md">
                    <h2 class="font-bold text-xl mb-4">Favorite Venues</h2>
                    <ul>
                        <li class="flex items-center mb-4 p-4 hover:bg-gray-100 rounded-lg">
                            <img alt="Venue 1" class="rounded-lg w-20 h-20 object-cover mr-4" src="{{ asset('/image/basketball-court.jpg') }}" />
                            <div>
                                <p class="font-bold">Basketball Telkom</p>
                                <p class="text-gray-500">Location: Bandung</p>
                                <p class="text-yellow-500 flex items-center">★★★★☆ (4.5)</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4 p-4 hover:bg-gray-100 rounded-lg">
                            <img alt="Venue 2" class="rounded-lg w-20 h-20 object-cover mr-4" src="{{ asset('/image/indoors-tennis-court.jpg') }}" />
                            <div>
                                <p class="font-bold">GOR Spontan</p>
                                <p class="text-gray-500">Location: Bandung</p>
                                <p class="text-yellow-500 flex items-center">★★★★★ (5.0)</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4 p-4 hover:bg-gray-100 rounded-lg">
                            <img alt="Venue 3" class="rounded-lg w-20 h-20 object-cover mr-4" src="{{ asset('/image/runway-stadium.jpg') }}" />
                            <div>
                                <p class="font-bold">Lapangan Bola Telkom</p>
                                <p class="text-gray-500">Location: Bandung</p>
                                <p class="text-yellow-500 flex items-center">★★★★☆ (4.2)</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
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
@endpush

@push('scripts')
<script>
   // Select all buttons and tab contents
   const tabButtons = document.querySelectorAll('.tab-btn');
   const tabContents = document.querySelectorAll('.tab-content');

   tabButtons.forEach(button => {
      button.addEventListener('click', () => {
         const targetTab = button.getAttribute('data-tab');

         // Hide all tabs
         tabContents.forEach(content => content.classList.add('hidden'));

         // Remove active class from all buttons
         tabButtons.forEach(btn => {
            btn.classList.remove('border-b-2', 'border-red-600', 'text-red-700');
            btn.classList.add('border-b-2', 'border-transparent', 'text-gray-500');
         });

         // Show the targeted tab
         document.getElementById(targetTab).classList.remove('hidden');

         // Highlight the active button
         button.classList.remove('border-b-2', 'border-transparent', 'text-gray-500');
         button.classList.add('border-b-2', 'border-red-600', 'text-red-700');
      });
   });
</script>
@endpush
