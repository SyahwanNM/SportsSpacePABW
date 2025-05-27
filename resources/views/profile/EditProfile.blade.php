{{-- resources/views/profile/index.blade.php --}}
@extends('layouts.app')

@section('content')
<main class="pt-20 pb-20">
    <div class="flex justify-end">
        <div class="lg:w-4/5 md:w-4/5 p-4">
            <div class="bg-white p-6 rounded-lg shadow-md" id="profile-section">
                <div class="flex items-center space-x-6">
                    <img id="profile-photo" alt="Profile Picture" class="w-24 h-24 rounded-full" src="/image/default.jpg" />
                    <h2 id="profile-username" class="text-xl font-bold">Loading...</h2>
                </div>
                <div class="grid grid-cols-3 gap-10 mt-4">
                    <div>
                        <p>Email</p>
                        <p class="font-semibold" id="profile-email">Loading...</p>
                    </div>
                    <div>
                        <p>Gender</p>
                        <p class="font-semibold" id="profile-gender">Loading...</p>
                    </div>
                    <div>
                        <p>City</p>
                        <p class="font-semibold" id="profile-city">Loading...</p>
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
</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = localStorage.getItem('auth_token');
        
        if (!token) {
            window.location.href = '/login';
            return;
        }

        fetch('/api/profile', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        })
        .then(response => {
            if (response.status === 401) {
                alert('Sesi habis, silakan login ulang.');
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
                throw new Error('Unauthorized');
            }
            return response.json();
        })
        .then(data => {
            console.log('Profile API response:', data);
            const user = data.user;
            document.getElementById('profile-username').textContent = user.username || '-';
            document.getElementById('profile-email').textContent = user.email || '-';
            document.getElementById('profile-gender').textContent = user.gender || '-';
            document.getElementById('profile-city').textContent = user.kota || '-';
            document.getElementById('profile-photo').src = user.photo_url || '/image/default.jpg';
        })
        .catch(error => console.error('Failed to load profile:', error));
    });
</script>
@endpush
