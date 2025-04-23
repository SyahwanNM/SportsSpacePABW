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
  <link rel="stylesheet" href="../landingpage/pageStyle.css">
</head>
<style>
    body {
       font-family: 'Plus Jakarta Sans', sans-serif;
    }
 </style>
<body>
    <nav class="sticky isolate w-full z-9 font-normal py-4 px-8 mx-auto flex items-center justify-between">
        <div class="flex items-center justify-between w-full">
            <div class="nav__logo">
                <a href="#">
                    <img src="/images/logo.png" alt="Logo" class="max-w-[150px] h-auto">
                </a>
            </div>
            <div class="text-[1.5rem] text-white cursor-pointer" id="menu-btn">
                <span><i class="ri-menu-line"></i></span>
            </div>
        </div>
  
        <!-- Menu Links -->
        <ul class="absolute top-5 left-0 w-full p-4 list-none flex flex-row items-center justify-center gap-8">
            <li><a href="{{ route('landingpage') }}" class="text-black border-b-4 border-transparent hover:border-red-700 transition duration-300">Home</a></li>
            <li><a href="{{ route('aboutus') }}" class="text-black border-b-4 border-transparent hover:border-red-700 transition duration-300">About Us</a></li>
            <li><a href="{{ route('faq') }}" class="text-black border-b-4 border-transparent hover:border-red-700 transition duration-300">Help</a></li>
        </ul>
  
        <!-- Buttons -->
        <div class="flex flex-1 space-x-2 z-20">
            <a href="/register/registerNew.html" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-black hover:text-[#d60505] bg-transparent transition duration-300">
                Sign Up
            </a>
            <a href="{{ route('login') }}" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-white hover:bg-red-800 transition duration-300" style="background-color:#d60505;">
                Sign In
            </a>
        </div>
    </nav>
    <main class="bg-red-700 flex justify-center">
        <div class="flex justify-center items-center ">
            <div>
                <div class="text-white gap-4 mt-2 transform rotate-12">
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                </div>
                <div class="text-white gap-4 mt-2 transform rotate-12">                 
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                </div>
                <div class="text-white gap-4 mt-2 transform rotate-12">                          
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                </div>
                <div class="text-white gap-4 mt-2 transform rotate-12"> 
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-tennis text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-biking-mountain text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-shuttlecock text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-mask-snorkel text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-bowling-pins text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-swimmer text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-ping-pong text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball-hoop text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>                                        
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span> 
                </div>
                <div class="text-white gap-4 mt-2 transform rotate-12"> 
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-tennis text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-biking-mountain text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-shuttlecock text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-mask-snorkel text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-bowling-pins text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-swimmer text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-ping-pong text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball-hoop text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>                                        
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span> 
                </div>
                <div class="text-white gap-4 mt-2 transform rotate-12"> 
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-biking-mountain text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-shuttlecock text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-mask-snorkel text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-bowling-pins text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-swimmer text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-ping-pong text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball-hoop text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>                                        
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span> 
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-tennis text-[4rem]"></i></span>
                </div>
                <div class="text-white gap-4 mt-2 transform rotate-12"> 
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-shuttlecock text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-mask-snorkel text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-bowling-pins text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-swimmer text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-ping-pong text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball-hoop text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-volleyball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>                                        
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span> 
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-tennis text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-biking-mountain text-[4rem]"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-16 w-80 p-5 bg-gray-200 rounded-lg z-20 absolute top-52">
            <p class="text-center mb-3 text-md font-bold">
                <span>Create Your Account</span>
            </p>
            <form action="#" class="space-y-4">
                <div class="flex">
                    <input type="email" class="w-full px-3 py-2 text-sm font-medium border rounded-lg focus:outline-none focus:border-gray-400" placeholder="Your Email" required>
                </div>

                <div class="flex">
                    <input type="text" class="w-full px-3 py-2 text-sm font-medium border rounded-lg focus:outline-none focus:border-gray-400" placeholder="Username" required>
                </div>

                <div class="grid-cols-2">
                    <select class="px-3 py-2 mr-3 rounded-lg" required>
                        <option class="text-gray-300" value="" disabled selected>Your City</option>
                        <option value="bandung">Bandung</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="yogyakarta">Yogyakarta</option>
                        <option value="medan">Medan</option>
                        <option value="makassar">Makassar</option>
                        <option value="denpasar">Denpasar</option>
                      </select>
                      <select class="px-4 py-2 rounded-lg" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                </div>
    
                <div class="flex">
                    <input type="password" class="w-full px-3 py-2 text-sm font-medium border rounded-lg focus:outline-none focus:border-gray-400" placeholder="Password" required>
                </div>

                <div class="flex">
                    <input type="password" class="w-full px-3 py-2 text-sm font-medium border rounded-lg focus:outline-none focus:border-gray-400" placeholder="Confirm Password" required>
                </div>
    
                <button class="w-full py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition duration-100">
                    <a href="../login/loginNew.html">Sign Up</a>
                </button>
            </form>
            <hr class="my-2">

            <p class="text-center text-sm font-medium">
                Already Have an Account? <a href="../login/loginNew.html" class="text-blue-500 hover:underline">Sign In</a>
            </p>
        </div>  
    </main>
</body>
<footer class="bg-white">
    <div class="mx-auto w-full max-w-screen-xl flex flex-col items-center">
        <div class="grid grid-cols-2 gap-80 px-4 py-6 lg:py-8 md:grid-cols-3">
            <div class="flex flex-col items-center">
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Contact us</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium text-center">
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
                <ul class="text-gray-500 dark:text-gray-400 font-medium text-center">
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
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase z-10">Location</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium text-center">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Jl.Majalaya</a>
                    </li>
                </ul>
          </div>
        </div>
    </div>
</footer>
</html>