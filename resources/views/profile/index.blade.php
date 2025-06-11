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
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="flex flex-col md:flex-row items-start md:items-center space-y-6 md:space-y-0 md:space-x-8">
                    <!-- Profile Image -->
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-red-600">
                        <img id="profile-image" src="{{ Auth::user()->photo }}" alt="Profile Picture" class="w-full h-full object-cover" onerror="this.src='{{ asset('storage/profile/default.jpeg') }}'">
                        <p>Debug path: {{ Auth::user()->photo }}</p>
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="flex-1">
                        <div id="profile-container" class="space-y-4">
                            <div class="animate-pulse">
                                <div class="h-4 bg-gray-200 rounded w-3/4 mb-4"></div>
                                <div class="h-4 bg-gray-200 rounded w-1/2 mb-4"></div>
                                <div class="h-4 bg-gray-200 rounded w-2/3"></div>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <a href="{{ route('profile.EditProfile') }}" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                                <i class="fi fi-rs-edit mr-2"></i>
                                Edit Profile
                            </a>
                        </div>
            </div>
        </div>
    </div>

            <!-- Tabs Section -->
            <div class="mt-8">
                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                        <li class="mr-2">
                            <a href="#" class="tab-btn inline-flex items-center p-4 border-b-2 border-red-600 rounded-t-lg text-red-600" data-tab="my-posts">
                                <i class="fi fi-rs-post mr-2"></i>
                                My Posts
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="#" class="tab-btn inline-flex items-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-red-600 hover:border-red-600" data-tab="friends">
                                <i class="fi fi-rs-users mr-2"></i>
                                Friends
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="#" class="tab-btn inline-flex items-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-red-600 hover:border-red-600" data-tab="favorite-venue">
                                <i class="fi fi-rs-heart mr-2"></i>
                                Favorite Venues
                            </a>
                        </li>
                    </ul>
                </div>      

                <!-- Tab Contents -->
                <div id="my-posts" class="tab-content bg-white p-6 rounded-b-lg shadow-lg mt-4">
                    <div id="posts-container" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Loading state -->
                        <div class="animate-pulse">
                            <div class="border border-gray-200 rounded-lg p-6">
                                <div class="flex items-center space-x-4 mb-4">
                                    <div class="h-12 w-12 bg-gray-200 rounded-full"></div>
                                    <div class="flex-1">
                                        <div class="h-4 bg-gray-200 rounded w-1/4 mb-2"></div>
                                        <div class="h-3 bg-gray-200 rounded w-1/3"></div>
                            </div>
                        </div>
                                <div class="h-4 bg-gray-200 rounded w-3/4 mb-4"></div>
                                <div class="h-48 bg-gray-200 rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="friends" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-lg mt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Friend Card #1 -->
                        <div class="flex items-center p-4 bg-white rounded-lg border border-gray-200 hover:shadow-lg transition duration-300">
                            <img alt="Friend 1" class="w-16 h-16 rounded-full mr-4" src="https://via.placeholder.com/150" />
                            <div>
                                <p class="font-bold text-lg">Wiyah</p>
                                <p class="text-green-500 text-sm">Online 3 hours ago</p>
                            </div>
                        </div>

                        <!-- Friend Card #2 -->
                        <div class="flex items-center p-4 bg-white rounded-lg border border-gray-200 hover:shadow-lg transition duration-300">
                            <img alt="Friend 2" class="w-16 h-16 rounded-full mr-4" src="https://via.placeholder.com/150" />
                            <div>
                                <p class="font-bold text-lg">Madli</p>
                                <p class="text-green-500 text-sm">Online 2 hours ago</p>
                            </div>
                        </div>

                        <!-- Friend Card #3 -->
                        <div class="flex items-center p-4 bg-white rounded-lg border border-gray-200 hover:shadow-lg transition duration-300">
                            <img alt="Friend 3" class="w-16 h-16 rounded-full mr-4" src="https://via.placeholder.com/150" />
                            <div>
                                <p class="font-bold text-lg">Natan</p>
                                <p class="text-green-500 text-sm">Online 5 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="favorite-venue" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-lg mt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Venue Card #1 -->
                        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition duration-300">
                            <img alt="Venue 1" class="w-full h-48 object-cover" src="{{ asset('/image/basketball-court.jpg') }}" />
                            <div class="p-4">
                                <h3 class="font-bold text-xl mb-2">Basketball Telkom</h3>
                                <p class="text-gray-600 mb-2">Location: Bandung</p>
                                <div class="flex items-center">
                                    <div class="text-yellow-400">★★★★☆</div>
                                    <span class="ml-2 text-gray-600">(4.5)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue Card #2 -->
                        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition duration-300">
                            <img alt="Venue 2" class="w-full h-48 object-cover" src="{{ asset('/image/indoors-tennis-court.jpg') }}" />
                            <div class="p-4">
                                <h3 class="font-bold text-xl mb-2">GOR Spontan</h3>
                                <p class="text-gray-600 mb-2">Location: Bandung</p>
                                <div class="flex items-center">
                                    <div class="text-yellow-400">★★★★★</div>
                                    <span class="ml-2 text-gray-600">(5.0)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Venue Card #3 -->
                        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition duration-300">
                            <img alt="Venue 3" class="w-full h-48 object-cover" src="{{ asset('/image/runway-stadium.jpg') }}" />
                            <div class="p-4">
                                <h3 class="font-bold text-xl mb-2">Lapangan Bola Telkom</h3>
                                <p class="text-gray-600 mb-2">Location: Bandung</p>
                                <div class="flex items-center">
                                    <div class="text-yellow-400">★★★★☆</div>
                                    <span class="ml-2 text-gray-600">(4.2)</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('auth_token');
    const currentUserId = localStorage.getItem('user_id');
    let retryCount = 0;
    const MAX_RETRIES = 3;

    if (!token) {
        window.location.href = '/login';
        return;
    }

    // Function to fetch and update profile data
    const fetchProfileData = async () => {
        try {
            const response = await fetch('/api/profile', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            const user = data.user;

            // Update profile image
            const profileImage = document.getElementById('profile-image');
            if (profileImage && user.photo) {
                profileImage.src = user.photo;
            }

            // Update other profile data
            const profileContainer = document.getElementById('profile-container');
            if (profileContainer) {
                profileContainer.innerHTML = `
                    <h2 class="text-2xl font-bold text-gray-900">${user.username}</h2>
                    <p class="text-gray-600">${user.email}</p>
                    <p class="text-gray-600">${user.kota || 'No city set'}</p>
                `;
            }

        } catch (error) {
            console.error('Error fetching profile data:', error);
            if (retryCount < MAX_RETRIES) {
                retryCount++;
                setTimeout(fetchProfileData, 1000 * retryCount);
            }
        }
    };

    // Initial fetch
    fetchProfileData();
});

// Tab switching functionality
document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');

            tabContents.forEach(content => content.classList.add('hidden'));
            tabButtons.forEach(btn => {
                btn.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
                btn.classList.add('border-b-2', 'border-transparent', 'text-gray-500');
            });

            document.getElementById(targetTab).classList.remove('hidden');
            button.classList.remove('border-b-2', 'border-transparent', 'text-gray-500');
            button.classList.add('border-b-2', 'border-red-600', 'text-red-600');
        });
    });
});
</script>
@endpush


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


<script>
document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('auth_token');
    
    if (!token) {
        window.location.href = '/login';
        return;
    }

    // Function to fetch and update profile data
    const fetchProfileData = async () => {
        try {
            console.log('Fetching profile data...');
            const response = await fetch('/api/profile', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            console.log('Response status:', response.status);
            const data = await response.json();
            console.log('Profile data:', data);

            if (!response.ok) {
                if (response.status === 401) {
                    localStorage.removeItem('auth_token');
                    window.location.href = '/login';
                    throw new Error('Sesi Anda telah berakhir. Silakan login kembali.');
                }
                throw new Error('Gagal mengambil data profile. Status: ' + response.status);
            }

            const user = data.user;
            console.log('User data:', user);

            // Update profile container
            document.getElementById('profile-container').innerHTML = `
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-gray-800">${user.username || '-'}</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">Email</p>
                            <p class="font-semibold">${user.email || '-'}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Kota</p>
                            <p class="font-semibold">${user.kota || '-'}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Gender</p>
                            <p class="font-semibold">${user.gender || '-'}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Tanggal Lahir</p>
                            <p class="font-semibold">${user.tanggal_lahir || '-'}</p>
                        </div>
                    </div>
                </div>
            `;
            
            // Update profile image
            const profileImage = document.getElementById('profile-image');
            if (user.photo && user.photo !== 'null' && user.photo !== '') {
                console.log('Setting profile image:', user.photo);
                // Add timestamp to prevent caching
                const timestamp = new Date().getTime();
                const imageUrl = `${user.photo}?t=${timestamp}`;
                
                // Create a new image object to test if the image exists
                const testImage = new Image();
                testImage.onload = function() {
                    profileImage.src = imageUrl;
                    retryCount = 0; // Reset retry count on success
                    
                    // Dispatch event to update header image
                    window.dispatchEvent(new CustomEvent('profileUpdated', {
                        detail: { photo: user.photo }
                    }));
                };
                testImage.onerror = function() {
                    console.error('Error loading profile image:', imageUrl);
                    profileImage.src = "{{ asset('storage/profile/default-profile.jpg') }}";
                    retryCount++;
                    
                    if (retryCount < MAX_RETRIES) {
                        // Retry after a delay
                        setTimeout(fetchProfileData, 2000);
                    }
                };
                testImage.src = imageUrl;
            } else {
                console.log('Using default profile image');
                profileImage.src = "{{ asset('storage/profile/default-profile.jpg') }}";
                
                // Dispatch event to update header image with default
                window.dispatchEvent(new CustomEvent('profileUpdated', {
                    detail: { photo: null }
                }));
            }

            // Store updated profile data
            localStorage.setItem('user_profile', JSON.stringify(user));
        } catch (error) {
            console.error('Error fetching profile:', error);
            document.getElementById('profile-container').innerHTML = `
                <div class="text-red-600">
                    ${error.message}
                </div>
            `;
        }
    };

    // Fetch profile data immediately
    fetchProfileData();

    // Set up periodic refresh (every 30 seconds)
    setInterval(fetchProfileData, 30000);
});

// === TAB SWITCHING ===
document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');

            tabContents.forEach(content => content.classList.add('hidden'));

            tabButtons.forEach(btn => {
                btn.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
                btn.classList.add('border-b-2', 'border-transparent', 'text-gray-500');
            });

            document.getElementById(targetTab).classList.remove('hidden');

            button.classList.remove('border-b-2', 'border-transparent', 'text-gray-500');
            button.classList.add('border-b-2', 'border-red-600', 'text-red-600');
        });
    });
});
</script>
<script>

