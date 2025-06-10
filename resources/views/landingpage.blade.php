<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sports Space - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/pageStyle.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .sports-icon {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px) rotate(12deg); }
            50% { transform: translateY(-20px) rotate(12deg); }
            100% { transform: translateY(0px) rotate(12deg); }
        }
        .login-card {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .social-btn {
            transition: all 0.3s ease;
        }
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .login-btn {
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 5, 5, 0.3);
        }
    </style>
  </head>
  <body class="bg-white min-h-screen">
    <nav class="sticky isolate w-full z-9 font-normal py-4 mx-auto flex items-center justify-between pr-8 pl-8 bg-white shadow-md">
      <div class="flex items-center justify-between w-full">
        <div class="nav__logo">
          <a href="{{ route('landingpage') }}" class="hover:opacity-80 transition-opacity">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-[150px] h-auto">
          </a>
        </div>
        <div class="text-[1.5rem] text-gray-800 cursor-pointer hover:text-red-600 transition-colors" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="absolute top-5 left-0 w-full p-4 list-none flex flex-row items-center justify-center gap-8">
        <li><a href="{{ route('landingpage') }}" class="text-gray-800 border-b-4 border-transparent hover:border-red-600 transition duration-300">Home</a></li>
        <li><a href="{{ route('aboutus') }}" class="text-gray-800 border-b-4 border-transparent hover:border-red-600 transition duration-300">About Us</a></li>
        <li><a href="{{ route('faq') }}" class="text-gray-800 border-b-4 border-transparent hover:border-red-600 transition duration-300">Help</a></li>
      </ul>
      <div class="flex flex-1 space-x-2 z-20">
        <a href="{{ route('register') }}" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-gray-800 hover:text-red-600 bg-transparent transition duration-300">
          Sign Up
        </a>
        <a href="{{ route('login') }}" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-white hover:bg-red-700 transition duration-300" style="background-color:#d60505;">
          Sign In
        </a>
      </div>
    </nav>
    <main class="flex justify-center items-center min-h-[calc(100vh-4rem)] relative overflow-hidden">
      <header class="header__container">
        <div class="header__image">
          <div class="header__image__card header__image__card-1">
            <span><i class="ri-key-line"></i></span>
            Badminton
          </div>
          <div class="header__image__card header__image__card-2">
            <span><i class="ri-basketball-line"></i></span>
            Basketball
          </div>
          <div class="header__image__card header__image__card-3">
            <span><i class="ri-ping-pong-line"></i></span>
            Tennis
          </div>
          <div class="header__image__card header__image__card-4">
            <span><i class="ri-football-fill"></i></span>
            Futsal
          </div>
          <img src="{{ asset('images/young-man-badminton-player-standing-white-fit-male-athlete.png') }}" alt="header" />
        </div>
        <div class="header__content">
          <h1>Move Together<br/>Stay <span>Healthy</span> <br> Make friend</h1>
          <p>
              Whether you're looking to unwind from your studies, stay active, 
              or simply have fun, our app has everything you need.
          </p>
          <form action="/">
            <div class="input__row">
              <div class="input__group">
                <h5>Fields</h5>
                <div>
                  <span><i class="ri-input-field"></i></i></span>
                  <input type="text" placeholder="More Than 100+" />
                </div>
              </div>
              <div class="input__group">
                <h5>Date</h5>
                <div>
                  <span><i class="ri-calendar-2-line"></i></span>
                  <input type="text" placeholder="Anytime" />
                </div>
              </div>
            </div>
            <button type="submit">Search</button>
          </form>
          <div class="bar">
            Copyright © 2024 Web Design Mastery. All rights reserved.
          </div>
        </div>
      </header>
    </main>
    <footer class="bg-gray-100 text-gray-800">
      <div class="mx-auto w-full max-w-screen-xl flex flex-col items-center">
        <div class="grid grid-cols-2 gap-80 px-4 py-6 lg:py-8 md:grid-cols-3">
          <div class="flex flex-col items-center">
            <h2 class="mb-6 text-sm font-semibold uppercase">Contact us</h2>
            <ul class="text-gray-600 font-medium text-center">
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">About</a>
              </li>
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">Careers</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col items-center">
            <h2 class="mb-6 text-sm font-semibold uppercase">Follow Us</h2>
            <ul class="text-gray-600 font-medium text-center">
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">Instagram</a>
              </li>
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">Twitter</a>
              </li>
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">Facebook</a>
              </li>
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">Contact Us</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col items-center">
            <h2 class="mb-6 text-sm font-semibold uppercase">Location</h2>
            <ul class="text-gray-600 font-medium text-center">
              <li class="mb-4">
                <a href="#" class="hover:text-red-600 transition-colors">Jl.Majalaya</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
