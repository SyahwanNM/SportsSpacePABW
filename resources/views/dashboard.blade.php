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
    


<!-- commit pertama di branch -->
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
@section('content')
<body class="bg-gray-100">
    <main class="py-16 pr-16">
        <div class="flex justify-end">
            <!-- Main Content -->
            <div class="lg:w-4/5 md:w-4/5 p-4">
                <!-- Banner -->
                <div class="flex mb-4">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-60 overflow-hidden md:h-75">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/images/basketball-court.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/images/indoors-tennis-court.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/images/runway-stadium.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/images/futsal-yogya1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="w-1/3 h-60 bg-red-700 text-white flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-xl font-bold">MAKE YOUR FUN</p>
                        <p class="text-4xl font-bold">DOING SPORTS</p>
                        <p class="text-sm">ANYWHERE YOU WANT</p>
                    </div>
                </div>
                </div>
                <!-- Weekly Activity -->
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                <h2 class="text-2xl font-bold text-red-700 mb-2">Weekly Activity</h2>
                <p class="text-gray-500 mb-4">Activity Feed</p>
                <button id="createPostBtn" class="text-blue-500 flex items-center hover:text-blue-700">
                    Buat Postingan
                    <i class="fas fa-plus ml-2"></i>
                </button>

                <div id="postForm" class="hidden mt-4">
                    <form id="createPostForm" class="bg-gray-100 p-4 rounded-lg shadow" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="post_title" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" id="post_title" name="post_title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="post_content" class="block text-sm font-medium text-gray-700">Konten</label>
                            <textarea id="post_content" name="post_content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="post_image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                            <input type="file" id="post_image" name="post_image" accept="image/*" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
                    </form>
                </div>

                <div id="postsContainer" class="bg-white p-4 rounded-lg shadow mb-8 relative">
                    <h2 class="text-2xl font-bold text-red-700 mb-4">Activity Feed</h2>
                    <!-- Posts will be appended here -->
                </div>

                <script>
                    const baseURL = 'http://127.0.0.1:8000/api';
                    const token = localStorage.getItem('auth_token');

                    document.getElementById('createPostBtn').addEventListener('click', () => {
                    const form = document.getElementById('postForm');
                    form.classList.toggle('hidden'); // toggle form muncul/sesuai saat tombol diklik
                    });

                    async function fetchPosts() {
                    const response = await fetch(`${baseURL}/posts`, {
                        headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                        }
                    });

                    if (!response.ok) {
                        alert('Gagal memuat posts');
                        return;
                    }

                    const posts = await response.json();
                    displayPosts(posts);
                    }

                    function displayPosts(posts) {
                        const container = document.getElementById('postsContainer');
                        container.innerHTML = '<h2 class="text-2xl font-bold text-red-700 mb-4">Activity Feed</h2>';
                        
                        const currentUserId = localStorage.getItem('user_id'); // Ambil user_id dari localStorage
                        
                        posts.forEach(post => {
                            // Cek apakah user yang login sama dengan user pemilik postingan
                            const canEdit = post.user && (post.user.user_id.toString() === currentUserId);
                            
                            const postEl = document.createElement('div');
                            postEl.classList.add('bg-white', 'p-4', 'rounded-lg', 'shadow', 'mb-4', 'relative');
                            postEl.innerHTML = `
                                <div class="absolute top-2 right-2">
                                    ${canEdit ? `
                                        <button class="text-blue-500 hover:text-blue-700 font-semibold mr-2" onclick="editPost(${post.id_post})">Edit</button>
                                        <button class="text-red-500 hover:text-red-700 font-semibold" onclick="deletePost(${post.id_post})">Delete</button>
                                    ` : ''}
                                </div>
                                <div class="flex items-center mb-4">
                                    <img alt="User Profile" class="rounded-full w-12 h-12" src="https://hackspirit.com/wp-content/uploads/2021/06/Copy-of-Rustic-Female-Teen-Magazine-Cover.jpg" />
                                    <div class="ml-3">
                                        <p class="font-bold">${post.user ? post.user.username : 'Unknown'}</p>
                                        <p class="text-gray-500 text-sm">${new Date(post.created_at).toLocaleString()}</p>
                                    </div>
                                </div>
                                <h3>${post.post_title}</h3>
                                <p class="mb-4">${post.post_content}</p>
                                ${post.post_image ? `<img src="http://127.0.0.1:8000/storage/${post.post_image}" alt="Post Image" class="w-full h-64 bg-cover bg-center rounded-lg mb-4 cursor-pointer" />` : ''}
                            `;
                            container.appendChild(postEl);
                        });
                    }

                    function editPost(id_post) {
                        window.location.href = `/posts/${id_post}/edit`; // Arahkan ke halaman edit
                    }

                    async function deletePost(id_post) {
                        if (!confirm('Are you sure you want to delete this post?')) return;

                        const token = localStorage.getItem('auth_token');

                        const response = await fetch(`${baseURL}/posts/${id_post}`, {
                            method: 'DELETE',
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                'Accept': 'application/json',
                            }
                        });

                        if (response.ok) {
                            alert('Post deleted');
                            fetchPosts(); // Refresh daftar post
                        } else {
                            const err = await response.json();
                            alert('Failed to delete post: ' + (err.message || 'Unknown error'));
                        }
                    }



                    // Submit post baru
                    document.getElementById('createPostForm').addEventListener('submit', async e => {
                        e.preventDefault();

                        const form = document.getElementById('createPostForm');
                        const formData = new FormData(form); // otomatis ambil semua field termasuk file

                        const response = await fetch(`${baseURL}/posts`, {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                'Accept': 'application/json',
                                // Jangan set Content-Type, biarkan browser yang atur otomatis
                            },
                            body: formData
                        });

                        if (response.ok) {
                            alert('Postingan berhasil dibuat!');
                            form.reset();
                            document.getElementById('postForm').classList.add('hidden');
                            fetchPosts(); // refresh list post
                        } else {
                            const err = await response.json();
                            alert('Gagal membuat postingan: ' + (err.message || 'Error tidak diketahui'));
                        }
                    });

                    // Initial load
                    fetchPosts();
                </script>
          </div>  
        </div>
    </main>
  
    <script>
      document.querySelectorAll('[data-modal-toggle]').forEach(button => {
         button.addEventListener('click', function () {
            const modalId = this.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
         });
   });
   // Menyembunyikan modal ketika tombol "No, cancel" ditekan
   document.querySelectorAll('[data-modal-hide]').forEach(button => {
      button.addEventListener('click', function () {
         const modalId = this.getAttribute('data-modal-hide');
         const modal = document.getElementById(modalId);
         modal.classList.add('hidden');
      });
   });

    </script>
</body>
</html>
