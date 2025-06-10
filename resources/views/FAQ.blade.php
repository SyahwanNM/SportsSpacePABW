<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Sports Space - FAQ</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

  <style>
    body {
       font-family: "Poppins", sans-serif;
    }
  </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('landingpage') }}" class="flex-shrink-0 flex items-center">
                        <img class="max-w-[150px] h-auto" src="/images/logo.png" alt="Sports Space">
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('aboutus') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">About Us</a>
                    <a href="{{ route('faq') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">FAQ</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
                    <a href="{{ route('login') }}" class="bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-md text-sm font-medium">Sign In</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-8 pl-48 pr-48">
        <h1 class="text-3xl font-bold mb-6 text-center">Frequently Asked Questions</h1>
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Apa itu Sports Space?</h2>
            <button onclick="toggleFAQ('faq1')" class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </button>
        </div>
        <div id="faq1" class="hidden mt-2">
            <p class="text-gray-600">Aplikasi ini adalah.</p>
        </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Bagaimana cara menggunakan Sports Space?</h2>
            <button onclick="toggleFAQ('faq2')" class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </button>
        </div>
        <div id="faq2" class="hidden mt-2">
            <p class="text-gray-600">Anda dapat menggunakan aplikasi ini dengan.</p>
        </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Apakah aplikasi ini gratis?</h2>
            <button onclick="toggleFAQ('faq3')" class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </button>
        </div>
        <div id="faq3" class="hidden mt-2">
            <p class="text-gray-600">Ya, aplikasi ini gratis untuk digunakan dengan.</p>
        </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Bagaimana cara menghubungi dukungan?</h2>
            <button onclick="toggleFAQ('faq4')" class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </button>
        </div>
        <div id="faq4" class="hidden mt-2">
            <p class="text-gray-600">Anda dapat menghubungi dukungan melalui.</p>
        </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Apakah data saya aman?</h2>
            <button onclick="toggleFAQ('faq5')" class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </button>
        </div>
        <div id="faq5" class="hidden mt-2">
            <p class="text-gray-600">Kami menjaga keamanan data Anda dengan.</p>
        </div>
        </div>

        <!-- Contact Us Form -->
        <h2 class="text-3xl font-bold mt-12 mb-6 text-center">Contact Sports Space</h2>
        <form action="#" method="POST" class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="fullname" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                <textarea id="message" name="message" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

    <script>
        function toggleFAQ(id) {
        const faq = document.getElementById(id);
        faq.classList.toggle('hidden');
        }
    </script>
</body>
<footer class="bg-gray-100">
    <div class="mx-auto w-full max-w-screen-xl flex flex-col items-center">
        <div class="grid grid-cols-2 gap-80 px-4 py-6 lg:py-8 md:grid-cols-3">
            <div class="flex flex-col items-center">
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Contact us</h2>
                <ul class="text-gray-500 font-medium text-center">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">About</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Careers</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Follow Us</h2>
                <ul class="text-gray-500 font-medium text-center">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Twitter</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Facebook</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Contact Us</a>
                    </li>
                </ul>
             </div>
            <div class="flex flex-col items-center">
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Location</h2>
                <ul class="text-gray-500 font-medium text-center">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Jl.Majalaya</a>
                    </li>
                </ul>
          </div>
        </div>
    </div>
</footer>
</html>