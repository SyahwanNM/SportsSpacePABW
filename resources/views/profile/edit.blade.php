@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-64 pt-20">
    <div class="p-4 rounded-lg">
        <!-- Edit Profile Form -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Edit Profile</h2>
                <a href="{{ route('profile') }}" class="text-gray-600 hover:text-red-600 transition-colors">
                    <i class="ri-arrow-left-line mr-2"></i>Back to Profile
                </a>
            </div>

            @if (session('status') === 'profile-updated')
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    Profile updated successfully!
                </div>
            @endif

            <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <!-- Profile Photo -->
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ asset('storage/' . (Auth::user()->photo ?? 'profile/default.jpeg')) }}" alt="Profile Photo" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        <label for="photo" class="absolute bottom-0 right-0 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition-colors cursor-pointer">
                            <i class="ri-camera-line"></i>
                            <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
                        </label>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Profile Photo</h3>
                        <p class="text-sm text-gray-500">Update your profile photo</p>
                    </div>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" 
                           class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                    @error('username')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                           class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="kota" class="block text-sm font-medium text-gray-700">City</label>
                    <select name="kota" id="kota" class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                        <option value="">Select City</option>
                        <option value="Jakarta" {{ old('kota', $user->kota) == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                        <option value="Surabaya" {{ old('kota', $user->kota) == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                        <option value="Bandung" {{ old('kota', $user->kota) == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                        <option value="Medan" {{ old('kota', $user->kota) == 'Medan' ? 'selected' : '' }}>Medan</option>
                        <option value="Semarang" {{ old('kota', $user->kota) == 'Semarang' ? 'selected' : '' }}>Semarang</option>
                        <option value="Yogyakarta" {{ old('kota', $user->kota) == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                        <option value="Palembang" {{ old('kota', $user->kota) == 'Palembang' ? 'selected' : '' }}>Palembang</option>
                        <option value="Makassar" {{ old('kota', $user->kota) == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                        <option value="Denpasar" {{ old('kota', $user->kota) == 'Denpasar' ? 'selected' : '' }}>Denpasar</option>
                        <option value="Malang" {{ old('kota', $user->kota) == 'Malang' ? 'selected' : '' }}>Malang</option>
                        <option value="Balikpapan" {{ old('kota', $user->kota) == 'Balikpapan' ? 'selected' : '' }}>Balikpapan</option>
                        <option value="Manado" {{ old('kota', $user->kota) == 'Manado' ? 'selected' : '' }}>Manado</option>
                        <option value="Padang" {{ old('kota', $user->kota) == 'Padang' ? 'selected' : '' }}>Padang</option>
                        <option value="Pekanbaru" {{ old('kota', $user->kota) == 'Pekanbaru' ? 'selected' : '' }}>Pekanbaru</option>
                        <option value="Banjarmasin" {{ old('kota', $user->kota) == 'Banjarmasin' ? 'selected' : '' }}>Banjarmasin</option>
                        <option value="Pontianak" {{ old('kota', $user->kota) == 'Pontianak' ? 'selected' : '' }}>Pontianak</option>
                        <option value="Samarinda" {{ old('kota', $user->kota) == 'Samarinda' ? 'selected' : '' }}>Samarinda</option>
                        <option value="Jayapura" {{ old('kota', $user->kota) == 'Jayapura' ? 'selected' : '' }}>Jayapura</option>
                        <option value="Mataram" {{ old('kota', $user->kota) == 'Mataram' ? 'selected' : '' }}>Mataram</option>
                        <option value="Kupang" {{ old('kota', $user->kota) == 'Kupang' ? 'selected' : '' }}>Kupang</option>
                        <option value="Ambon" {{ old('kota', $user->kota) == 'Ambon' ? 'selected' : '' }}>Ambon</option>
                    </select>
                    @error('kota')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender and Date of Birth -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="gender" 
                                class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                            <option value="">Select Gender</option>
                            <option value="Laki laki" {{ old('gender', $user->gender) == 'Laki laki' ? 'selected' : '' }}>Laki laki</option>
                            <option value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="-" {{ old('gender', $user->gender) == '-' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                               value="{{ old('tanggal_lahir', $user->tanggal_lahir ? $user->tanggal_lahir->format('Y-m-d') : '') }}" 
                               class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                        @error('tanggal_lahir')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>

            <!-- Delete Account Section -->
            <div class="mt-12 pt-6 border-t border-gray-200">
                <h3 class="text-lg font-medium text-red-600">Delete Account</h3>
                <p class="mt-1 text-sm text-gray-500">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                
                <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
                    @csrf
                    @method('delete')
                    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" 
                               class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:border-red-500"
                               placeholder="Enter your password to confirm">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview image before upload
    const photoInput = document.getElementById('photo');
    const photoPreview = document.querySelector('img[alt="Profile Photo"]');

    photoInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
@endsection
