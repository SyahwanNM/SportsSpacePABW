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
                        <input type="text" id="searchInput" placeholder="Search users, fields, or communities..." 
                               class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                        <button class="absolute right-3 top-2.5">
                            <i class="ri-search-line text-gray-400"></i>
               </button>
                        
                        <!-- Search Results Dropdown -->
                        <div id="searchResults" class="absolute w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <div class="p-4">
                                <!-- Users Section -->
                                <div class="mb-4">
                                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Users</h3>
                                    <div id="userResults" class="space-y-2">
                                        <!-- User results will be populated here -->
                                    </div>
                                </div>

                                <!-- Fields Section -->
                                <div class="mb-4">
                                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Fields</h3>
                                    <div id="fieldResults" class="space-y-2">
                                        <!-- Field results will be populated here -->
                                    </div>
                                </div>

                                <!-- Communities Section -->
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Communities</h3>
                                    <div id="communityResults" class="space-y-2">
                                        <!-- Community results will be populated here -->
                                    </div>
                                </div>
                            </div>
                        </div>
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
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const userResults = document.getElementById('userResults');
    const fieldResults = document.getElementById('fieldResults');
    const communityResults = document.getElementById('communityResults');
    
    let searchTimeout;

    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        
        // Clear previous timeout
        clearTimeout(searchTimeout);
        
        // Hide results if query is too short
        if (query.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        // Set new timeout
        searchTimeout = setTimeout(() => {
            // Clear previous results
            userResults.innerHTML = '';
            fieldResults.innerHTML = '';
            communityResults.innerHTML = '';

            // Show loading state
            searchResults.classList.remove('hidden');
            userResults.innerHTML = '<div class="p-2 text-sm text-gray-500">Searching...</div>';

            // Make the search request
            fetch(`/search?query=${encodeURIComponent(query)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Clear loading state
                userResults.innerHTML = '';
                
                // Populate user results
                if (data.users && data.users.length > 0) {
                    data.users.forEach(user => {
                        userResults.innerHTML += `
                            <a href="/profile/${user.user_id}" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-lg">
                                <img src="${user.photo}" alt="${user.username}" class="w-8 h-8 rounded-full object-cover">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">${user.username}</p>
                                    <p class="text-xs text-gray-500">${user.email}</p>
                                </div>
                            </a>
                        `;
                    });
                } else {
                    userResults.innerHTML = '<div class="p-2 text-sm text-gray-500">No users found</div>';
                }

                // Populate field results
                if (data.lapangans && data.lapangans.length > 0) {
                    data.lapangans.forEach(field => {
                        fieldResults.innerHTML += `
                            <a href="/lapangan/${field.id_field}" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-lg">
                                <img src="${field.foto}" alt="${field.nama_lapangan}" class="w-8 h-8 rounded-lg object-cover">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">${field.nama_lapangan}</p>
                                    <p class="text-xs text-gray-500">${field.type} - ${field.categori}</p>
                                </div>
                            </a>
                        `;
                    });
                } else {
                    fieldResults.innerHTML = '<div class="p-2 text-sm text-gray-500">No fields found</div>';
                }

                // Populate community results
                if (data.komunitas && data.komunitas.length > 0) {
                    data.komunitas.forEach(community => {
                        communityResults.innerHTML += `
                            <a href="/komunitas/${community.id_komunitas}" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-lg">
                                <img src="${community.foto}" alt="${community.nama}" class="w-8 h-8 rounded-lg object-cover">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">${community.nama}</p>
                                    <p class="text-xs text-gray-500">${community.jns_olahraga}</p>
                                </div>
                            </a>
                        `;
                    });
                } else {
                    communityResults.innerHTML = '<div class="p-2 text-sm text-gray-500">No communities found</div>';
                }

                // Show results if any
                if ((data.users && data.users.length > 0) || 
                    (data.lapangans && data.lapangans.length > 0) || 
                    (data.komunitas && data.komunitas.length > 0)) {
                    searchResults.classList.remove('hidden');
                } else {
                    searchResults.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Search error:', error);
                userResults.innerHTML = '<div class="p-2 text-sm text-red-500">Error performing search</div>';
                fieldResults.innerHTML = '';
                communityResults.innerHTML = '';
            });
        }, 300); // 300ms delay
    });

    // Hide results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });

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