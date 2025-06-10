<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Sports Space - About Us</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

  <style>
    body {
       font-family: "Poppins", sans-serif;
    }
    .slideshow {
      width: 350px;
      height: 350px;
      position: relative;
      overflow: hidden;
    }
    .slideshow img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      animation: slide 12s infinite;
    }
    .slideshow img:nth-child(1) {
      animation-delay: 0s;
    }
    .slideshow img:nth-child(2) {
      animation-delay: 4s;
    }
    .slideshow img:nth-child(3) {
      animation-delay: 8s;
    }
    @keyframes slide {
      0% { opacity: 0; }
      5% { opacity: 1; }
      25% { opacity: 1; }
      30% { opacity: 0; }
      100% { opacity: 0; }
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

    <div class="text-white mt-20" style="background-color:#d60505;">
        <div class="flex justify-between items-start mx-48">
            <div class="text-left mt-8">
                <div class="text-3xl md:text-5xl font-bold mb-8">
                    Sports Space Mission
                </div>
              
                <p class="text-lg mb-12">
                    At Sports Space, we are dedicated to connecting sports enthusiasts with their local<br> 
                    communities. Our mission is to make sports accessible to everyone by providing a <br>
                    comprehensive platform to find facilities, join communities, and create events that <br>
                    bring people together.
                </p>
            </div>
              
            <div class="grid grid-cols-4 gap-4 mt-2">
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>  
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-tennis text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-biking-mountain text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-shuttlecock text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-mask-snorkel text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-bowling-pins text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-swimmer text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-ping-pong text-[4rem]"></i></span>
                <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball-hoop text-[4rem]"></i></span>
            </div>
        </div>
    </div>

    <div class="text-black bg-white mt-20">
        <div class="text-center mb-8">
            <div class="text-xl md:text-2xl font-bold">
                More than 100+ facilities
            </div>
        </div>
        <div class="flex justify-center items-start mx-48">
            <div class="text-right">
                <div class="text-xl md:text-2xl font-bold mb-4">
                    <div class="slideshow">
                        <img src="/image/basketball-court.jpg" alt="Basketball Court 1">
                        <img src="/image/indoors-tennis-court.jpg" alt="Basketball Court 2">
                        <img src="/image/runway-stadium.jpg" alt="Basketball Court 3">
                    </div>
                </div>
            </div>
            <div class="relative mx-8">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="h-full border-l-4 border-blue-700"></div>
                </div>
                <div class="absolute inset-0 flex flex-col items-center justify-between py-4">
                    <div class="w-6 h-6 bg-blue-700 rounded-full"></div>
                    <div class="w-6 h-6 bg-blue-700 rounded-full"></div>
                    <div class="w-6 h-6 bg-blue-700 rounded-full"></div>
                </div>
            </div>
            <div class="text-left pl-32">
                <div class="text-xl md:text-2xl font-bold mb-4 text-blue-700">
                    Search for Sports Facilities:
                </div>
                <p class="text-lg mb-4">
                    With Sports Space, easily find nearby sports facilities for your <br>
                    favorite activities. Whether you're looking for basketball courts, <br>
                    soccer fields, gyms, or swimming pools, simply enter your location <br>
                    and specify the type of venue. Each listing provides essential <br> 
                    details like distance, availability, and user reviews, making it <br>
                    simple to choose the perfect spot for your next game or workout.
                </p>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bagian Baru di Sini -->
    <div class="text-black bg-white mt-20 mb-24">
        <div class="text-center mb-8">
            <div class="text-xl md:text-2xl font-bold">
                Community Anywhere
            </div>
        </div>
        <div class="flex justify-center items-start mx-48">
            <div class="text-right">
                <div class="text-xl md:text-2xl font-bold mb-4">
                    <div class="slideshow">
                        <img src="/asset login/img/badminton3-bg.png" alt="Swimming Pool 1">
                        <img src="/asset login/img/badminton2-bg.png" alt="Gym Interior 2">
                        <img src="/asset login/img/badminton-bg.png" alt="Soccer Field 3">
                    </div>
                </div>
            </div>
            <div class="relative mx-8">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="h-full border-l-4 border-green-700"></div>
                </div>
                <div class="absolute inset-0 flex flex-col items-center justify-between py-4">
                    <div class="w-6 h-6 bg-green-700 rounded-full"></div>
                    <div class="w-6 h-6 bg-green-700 rounded-full"></div>
                    <div class="w-6 h-6 bg-green-700 rounded-full"></div>
                </div>
            </div>
            <div class="text-left pl-32">
                <div class="text-xl md:text-2xl font-bold mb-4 text-blue-700">
                    Joining Sports Communities
                </div>
                <p class="text-lg mb-4">
                    With Sports Space, connect with like-minded individuals who <br>
                    share your passion for sports. Easily discover and join <br>
                    communities that suit your interests and skill levels. Engage <br>
                    in discussions, participate in events, and enjoy activities <br>
                    that foster camaraderie and support as you improve your skills <br>
                    and make new friends. Join a community today and stay <br>
                    motivated while enjoying your favorite sports!
                </p>
            </div>
        </div>
    </div>
    <!-- Akhir Bagian Baru -->
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