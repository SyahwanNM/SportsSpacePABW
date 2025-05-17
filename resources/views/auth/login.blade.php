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
    <nav class="sticky isolate w-full z-9 font-normal py-4 mx-auto flex items-center justify-between pr-8 pl-8">
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
            <a href="{{ route('register') }}" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-black hover:text-[#d60505] bg-transparent transition duration-300">
                Sign Up
            </a>
            <a href="/login/loginNew.html" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-white hover:bg-red-800 transition duration-300" style="background-color:#d60505;">
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>  
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>  
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>  
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>  
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
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
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-basketball text-[4rem]"></i></span>
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-running text-[4rem]"></i></span>  
                    <span class="inline-block w-20 h-20"><i class="fi fi-rs-gym text-[4rem]"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-16 w-80 p-5 bg-gray-200 rounded-lg z-20 absolute top-52">
            <div class=" flex justify-center items-center font-semibold pb-4">
                <P>Sign In to Sports Space</P>
            </div> 
            <div class="flex pb-3">
                <button class="flex items-center px-3 py-2 w-full text-sm font-medium rounded-lg bg-black text-white border border-[#D5CBFF] transition-all duration-100 hover:bg-gray-600 hover:border-black">
                    <img src="../asset login/img/google-icon.png" alt="google" class="w-6 ml-2 mr-8">
                    Sign in With Google
                </button>
            </div>
            <div class="flex ">
                <button class="flex items-center px-3 py-2 w-full text-sm font-medium rounded-lg bg-black text-white border border-[#D5CBFF] transition-all duration-100 hover:bg-gray-600 hover:border-black">
                    <img src="../asset login/img/facebook-icon2.png" alt="facebook" class="w-6 ml-2 mr-8">
                    Sign in With Facebook
                </button>
            </div>

            <p class="separator text-center relative py-3">
                <span class="relative z-10 bg-gray-200 px-3 text-sm font-medium">Or Login With Email</span>
                <span class="absolute left-0 top-1/2 w-full h-px bg-black"></span>
            </p>
                
            
            <form id="loginForm" class="space-y-4">
                <div class="flex">
                    <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full px-3 py-2 border rounded-lg"
                    placeholder="Your Email"
                    required
                    >
                </div>

                <div class="flex">
                    <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full px-3 py-2 border rounded-lg"
                    placeholder="Password"
                    required
                    >
                </div>

                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="rounded-sm">
                    <span class="text-sm">Remember me</span>
                </label>

                <button
                    type="submit"
                    class="w-full py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 transition"
                >
                    Login
                </button>
                </form>

                <div id="loginErrors" class="mt-4 text-red-500"></div>

            <script>
                document.getElementById('loginForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                // ambil nilai
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const errorsDiv = document.getElementById('loginErrors');
                errorsDiv.textContent = '';

                try {
                    const res = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ email, password })
                    });

                    const data = await res.json();

                    if (res.ok) {
                    // simpan token & redirect
                    localStorage.setItem('auth_token', data.token);
                    localStorage.setItem('user_id', data.user.user_id.toString());
                    window.location.href = "{{ route('dashboard') }}";
                    } else {
                    // tampilkan error di bawah form
                    let msg = '';
                    if (data.errors) {
                        for (let key in data.errors) {
                        msg += data.errors[key].join(', ') + '\n';
                        }
                    } else if (data.message) {
                        msg = data.message;
                    }
                    errorsDiv.textContent = msg;
                    }
                } catch (err) {
                    console.error(err);
                    errorsDiv.textContent = 'Gagal terhubung ke server.';
                }
                });
            </script>

            <hr class="my-2">

            <p class="text-center text-sm font-medium">
                Don't Have An Account Yet? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign Up Here</a>
            </p>

            <p class="text-center mt-30 text-sm">
                <a href="../forgotpw/forgotNew.html" class="text-blue-500 hover:underline">Forgot Password?</a>
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