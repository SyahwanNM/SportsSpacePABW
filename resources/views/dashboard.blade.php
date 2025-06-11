@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="sm:ml-64 pt-20 pb-20">
    <div class="rounded-lg">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ Auth::user()->username }}!</h1>
            <p class="text-gray-600 mt-2">Here's what's happening in your sports community today.</p>
        </div>

        <!-- Recent Posts -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Recent Posts</h2>
                <button id="createPostBtn" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    <i class="ri-add-line mr-2"></i>
                    New Post
                </button>
            </div>

            <!-- Form to add a post (New Structure) -->
            <div id="postForm" class="hidden mt-4 bg-gray-50 p-6 rounded-lg shadow-inner mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Buat Postingan Baru</h3>
                <form id="newPostForm" action="{{ route('posts.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                            @csrf
                            <div>
                        <label for="post_title" class="block text-sm font-medium text-gray-700">Judul Post</label>
                        <input type="text" name="post_title" id="post_title" 
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500"
                               required>
                        <p id="titleError" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div>
                        <label for="post_content" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea id="post_content" name="post_content" rows="4" 
                                  class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500"
                                  required></textarea>
                        <p id="contentError" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                    <div class="mb-4">
                        <label for="post_image" class="block text-sm font-medium text-gray-700">Gambar (Opsional)</label>
                        <input type="file" id="post_image" name="post_image" accept="image/*" 
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                        <p class="text-xs text-gray-400 mt-1">Ukuran maks: 2MB. Format: JPG, JPEG, PNG</p>
                        <p id="imageError" class="mt-1 text-sm text-red-600 hidden"></p>
                            </div>
                            <div class="flex justify-end space-x-2">
                        <button type="button" id="cancelPostBtn" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300 transition">Batal</button>
                        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">Kirim Post</button>
                    </div>
                </form>
            </div>

            <div id="posts-list" class="space-y-6">
                @forelse($posts as $post)
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $post->user->photo }}" alt="Profile" class="w-10 h-10 rounded-full object-cover" onerror="this.src='{{ asset('storage/profile/default.jpeg') }}'">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $post->user->username }}</h3>
                                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                @if(Auth::id() === $post->user_id)
                                    <div class="ml-auto flex space-x-2">
                                        <a href="{{ route('posts.edit', $post->id_post) }}" class="text-gray-500 hover:text-gray-700">
                                    <i class="ri-edit-line"></i>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id_post) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600" onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                    <p class="text-gray-700 mb-4">{{ $post->content }}</p>
                            @if($post->post_image)
                        <img src="{{ asset('storage/' . $post->post_image) }}" alt="Post Image" class="w-full h-48 object-cover rounded-lg">
                            @endif
                        </div>
                @empty
                    <p class="text-center text-gray-500">No posts available.</p>
                @endforelse
                </div>
                </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Function to update profile image
    function updateProfileImage(photoUrl) {
        const dashboardImage = document.getElementById('dashboardProfileImage');
        if (photoUrl && photoUrl !== 'null' && photoUrl !== '') {
            const timestamp = new Date().getTime();
            dashboardImage.src = `${photoUrl}?t=${timestamp}`;
            
            dashboardImage.onerror = function() {
                console.error('Error loading profile image:', photoUrl);
                this.src = "{{ asset('storage/profile/default.jpeg') }}";
            };
        } else {
            dashboardImage.src = "{{ asset('storage/profile/default.jpeg') }}";
        }
    }

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
            } else {
                updateProfileImage("{{ asset('storage/profile/default.jpeg') }}");
            }
        })
        .catch(error => {
            console.error('Error fetching user data:', error);
            updateProfileImage("{{ asset('storage/profile/default.jpeg') }}");
        });
    }

    // --- New JavaScript for Create Post Form Toggle and Submission ---
    const createPostBtn = document.getElementById('createPostBtn');
    const postFormDiv = document.getElementById('postForm');
    const newPostForm = document.getElementById('newPostForm');
    const cancelPostBtn = document.getElementById('cancelPostBtn');
    const postsListContainer = document.getElementById('posts-list');

    createPostBtn.addEventListener('click', function() {
        postFormDiv.classList.toggle('hidden');
        if (!postFormDiv.classList.contains('hidden')) {
            newPostForm.reset();
            clearErrors();
        }
    });

    cancelPostBtn.addEventListener('click', function() {
        postFormDiv.classList.add('hidden');
        newPostForm.reset();
        clearErrors();
    });

    function clearErrors() {
        document.getElementById('titleError').textContent = '';
        document.getElementById('titleError').classList.add('hidden');
        document.getElementById('contentError').textContent = '';
        document.getElementById('contentError').classList.add('hidden');
        document.getElementById('imageError').textContent = '';
        document.getElementById('imageError').classList.add('hidden');
    }

    newPostForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        clearErrors();

        const formData = new FormData(this);
        
        const imageInput = document.getElementById('post_image');
        if (imageInput.files[0]) {
            const file = imageInput.files[0];
            if (file.size > 2 * 1024 * 1024) {
                document.getElementById('imageError').textContent = 'Image size must be less than 2MB';
                document.getElementById('imageError').classList.remove('hidden');
                return;
            }
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!validTypes.includes(file.type)) {
                document.getElementById('imageError').textContent = 'Only JPG, JPEG, and PNG files are allowed';
                document.getElementById('imageError').classList.remove('hidden');
                return;
            }
        }

        try {
            const response = await fetch('{{ route('posts.store') }}', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                alert('Post created successfully!'); 
                postFormDiv.classList.add('hidden');
                newPostForm.reset();
                clearErrors();

                // Prepend the new post to the list
                const newPostHtml = `
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="${data.post.user.photo}" alt="Profile" class="w-10 h-10 rounded-full object-cover" onerror="this.src='{{ asset('storage/profile/default.jpeg') }}'">
                            <div>
                                <h3 class="font-semibold text-gray-900">${data.post.user.username}</h3>
                                <p class="text-sm text-gray-500">${moment(data.post.created_at).fromNow()}</p>
                            </div>
                            <div class="ml-auto flex space-x-2">
                                <a href="/posts/${data.post.id_post}/edit" class="text-gray-500 hover:text-gray-700">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="/posts/${data.post.id_post}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="text-gray-500 hover:text-red-600">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">${data.post.post_content}</p>
                        ${data.post.post_image ? `<img src="{{ asset('storage/') }}/${data.post.post_image}" alt="Post Image" class="w-full h-48 object-cover rounded-lg">` : ''}
                    </div>
                `;

                if (postsListContainer.querySelector('.text-center.text-gray-500')) {
                    postsListContainer.innerHTML = newPostHtml;
                } else {
                    postsListContainer.insertAdjacentHTML('afterbegin', newPostHtml);
                }

            } else if (response.status === 401 || response.redirected) {
                alert('Sesi Anda telah berakhir atau Anda tidak terautentikasi. Mohon login kembali.');
                localStorage.removeItem('auth_token');
                window.location.href = '{{ route('login') }}';
            } else {
                let errorMsg = 'An unknown error occurred.';
                if (data.errors) {
                    // Map validation errors to specific error paragraphs
                    for (const key in data.errors) {
                        if (key === 'post_title') {
                            document.getElementById('titleError').textContent = data.errors[key][0];
                            document.getElementById('titleError').classList.remove('hidden');
                        } else if (key === 'post_content') {
                            document.getElementById('contentError').textContent = data.errors[key][0];
                            document.getElementById('contentError').classList.remove('hidden');
                        } else if (key === 'post_image') {
                            document.getElementById('imageError').textContent = data.errors[key][0];
                            document.getElementById('imageError').classList.remove('hidden');
                        }
                    }
                    // If there are other errors not tied to a specific field, show a general alert
                    const generalErrors = Object.keys(data.errors).filter(key => 
                        key !== 'post_title' && key !== 'post_content' && key !== 'post_image'
                    ).map(key => data.errors[key][0]);
                    if (generalErrors.length > 0) {
                        alert('Error: ' + generalErrors.join('\n'));
                    }
                } else if (data.message) {
                    alert('Error: ' + data.message);
        } else {
                    alert('Error: ' + errorMsg);
                }
            }
        } catch (error) {
            console.error('Error creating post:', error);
            alert('An error occurred while creating the post.');
        }
    });
});
    </script>
@endpush
