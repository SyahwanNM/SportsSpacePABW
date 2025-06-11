@extends('layouts.sidebar')
@extends('layouts.header')
@extends('layouts.footer')

@section('title', 'Edit Profile')

@section('content')
<main class="pt-20 pb-20">
    <div class="flex justify-end">
        <!-- Main Content -->
        <div class="lg:w-4/5 md:w-4/5 p-4">
            <!-- Edit Profile Card -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Edit Profile</h2>
                    <a href="{{ route('profile') }}" class="text-gray-600 hover:text-red-600 transition">
                        <i class="fi fi-rs-cross-circle text-xl"></i>
                    </a>
                </div>
                
                <form id="editProfileForm" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <!-- Profile Photo Section -->
                    <div class="flex flex-col items-center mb-8">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-red-600">
                                <img id="current-photo" src="{{ asset('storage/profile/default-profile.jpg') }}" alt="Current Profile" class="w-full h-full object-cover" onerror="this.src='{{ asset('storage/profile/default-profile.jpg') }}'">
                            </div>
                            <label for="photo" class="absolute bottom-0 right-0 bg-red-600 text-white p-2 rounded-full cursor-pointer hover:bg-red-700 transition">
                                <i class="fi fi-rs-camera"></i>
                            </label>
                            <input type="file" name="photo" id="photo" accept="image/*" class="hidden">
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Click the camera icon to change your profile photo</p>
                        <p class="text-xs text-gray-400 mt-1">Max file size: 2MB. Supported formats: JPG, JPEG, PNG</p>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Username Field -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fi fi-rs-user"></i>
                                </span>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                                    placeholder="Enter your username"
                                >
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fi fi-rs-envelope"></i>
                                </span>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                                    placeholder="Enter your email"
                                >
                            </div>
                        </div>

                        <!-- City Field -->
                        <div class="space-y-2">
                            <label for="kota" class="block text-sm font-medium text-gray-700">City</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fi fi-rs-marker"></i>
                                </span>
                                <input
                                    type="text"
                                    name="kota"
                                    id="kota"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                                    placeholder="Enter your city"
                                >
                            </div>
                        </div>

                        <!-- Gender Field -->
                        <div class="space-y-2">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fi fi-rs-venus-mars"></i>
                                </span>
                                <select
                                    name="gender"
                                    id="gender"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                                >
                                    <option value="">Select Gender</option>
                                    <option value="Laki laki">Male</option>
                                    <option value="Perempuan">Female</option>
                                    <option value="-">Prefer not to say</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date of Birth Field -->
                        <div class="space-y-2">
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                    <i class="fi fi-rs-calendar"></i>
                                </span>
                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    id="tanggal_lahir"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Error Messages -->
                    <div id="error-messages" class="text-sm"></div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 pt-4">
                        <button
                            type="submit"
                            class="flex-1 py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition flex items-center justify-center space-x-2"
                        >
                            <i class="fi fi-rs-disk"></i>
                            <span>Save Changes</span>
                        </button>
                        <a
                            href="{{ route('profile') }}"
                            class="flex-1 py-3 text-center text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition flex items-center justify-center space-x-2"
                        >
                            <i class="fi fi-rs-cross-circle"></i>
                            <span>Cancel</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('auth_token');
    
    if (!token) {
        window.location.href = '/login';
        return;
    }

    // Preview photo before upload
    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('current-photo').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Fetch current profile data
    fetch('/api/profile', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        const user = data.user;
        document.getElementById('username').value = user.username || '';
        document.getElementById('email').value = user.email || '';
        document.getElementById('kota').value = user.kota || '';
        document.getElementById('gender').value = user.gender || '';
        document.getElementById('tanggal_lahir').value = user.tanggal_lahir || '';
        
        // Set current profile photo
        if (user.photo && user.photo !== 'null' && user.photo !== '') {
            document.getElementById('current-photo').src = user.photo;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showError('Failed to load profile data.');
    });

    // Handle form submission
    document.getElementById('editProfileForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const errorMessages = document.getElementById('error-messages');
        errorMessages.textContent = '';
        errorMessages.className = 'text-sm';

        const formData = new FormData();
        formData.append('_method', 'PUT');
        
        // Only append fields that have values
        const fields = ['username', 'email', 'kota', 'gender', 'tanggal_lahir'];
        fields.forEach(field => {
            const value = document.getElementById(field).value.trim();
            if (value) formData.append(field, value);
        });

        const photoFile = document.getElementById('photo').files[0];
        if (photoFile) {
            // Validate file size (2MB max)
            if (photoFile.size > 2 * 1024 * 1024) {
                showError('Photo size must be less than 2MB');
                return;
            }
            // Validate file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!validTypes.includes(photoFile.type)) {
                showError('Only JPG, JPEG, and PNG files are allowed');
                return;
            }
            formData.append('photo', photoFile);
        }

        try {
            const response = await fetch('/api/profile', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                showSuccess('Profile updated successfully!');
                localStorage.setItem('user_profile', JSON.stringify(data.user));
                
                // Dispatch event to update header image
                window.dispatchEvent(new CustomEvent('profileUpdated', {
                    detail: { photo: data.user.photo }
                }));
                
                setTimeout(() => {
                    window.location.href = "{{ route('profile') }}";
                }, 1000);
            } else {
                let errorMsg = '';
                if (data.errors) {
                    errorMsg = Object.values(data.errors).flat().join('\n');
                } else if (data.message) {
                    errorMsg = data.message;
                }
                showError(errorMsg);
            }
        } catch (error) {
            console.error('Error:', error);
            showError('An error occurred while updating the profile.');
        }
    });

    function showError(message) {
        const errorMessages = document.getElementById('error-messages');
        errorMessages.textContent = message;
        errorMessages.className = 'text-red-600 text-sm';
    }

    function showSuccess(message) {
        const errorMessages = document.getElementById('error-messages');
        errorMessages.textContent = message;
        errorMessages.className = 'text-green-600 text-sm';
    }
});
</script>
@endpush 