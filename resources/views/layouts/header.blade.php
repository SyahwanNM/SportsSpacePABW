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
            <div class="flex-1 mx-8">
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
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <img id="dashboardProfileImage" 
                             src="{{ Auth::user()->photo }}" 
                             alt="{{ Auth::user()->username }}" 
                             class="w-10 h-10 rounded-full object-cover"
                             onerror="this.src='{{ asset('storage/profile/default.jpeg') }}'">
                    </button>
                    <div x-show="open" 
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->username }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to update profile image
    function updateProfileImage(photoUrl) {
        const dashboardImage = document.getElementById('dashboardProfileImage');
        if (photoUrl && photoUrl !== 'null' && photoUrl !== '') {
            // Add timestamp to prevent caching
            const timestamp = new Date().getTime();
            const imageUrl = photoUrl.startsWith('http') ? photoUrl : `{{ asset('') }}${photoUrl}`;
            dashboardImage.src = `${imageUrl}?t=${timestamp}`;
            
            // Add error handling for image loading
            dashboardImage.onerror = function() {
                console.error('Error loading profile image:', imageUrl);
                this.src = "{{ asset('storage/profile/default.jpeg') }}";
            };
        } else {
            dashboardImage.src = "{{ asset('storage/profile/default.jpeg') }}";
        }
    }

    // Listen for profile updates
    window.addEventListener('profileUpdated', function(e) {
        if (e.detail && e.detail.photo) {
            updateProfileImage(e.detail.photo);
        }
    });

    // Initial profile image update
    const token = localStorage.getItem('auth_token');
    if (token) {
        fetch('/api/user', {
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(res => res.json())
        .then(user => {
            if (user.photo) {
                updateProfileImage(user.photo);
            }
        })
        .catch(error => {
            console.error('Error fetching user data:', error);
        });
    }
});
</script>
@endpush