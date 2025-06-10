<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sports Space - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/pageStyle.css') }}">
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
<body class="bg-gradient-to-br from-red-600 to-red-800 min-h-screen">
    <nav class="sticky isolate w-full z-9 font-normal py-4 mx-auto flex items-center justify-between pr-8 pl-8 bg-white/10 backdrop-blur-md">
        <div class="flex items-center justify-between w-full">
            <div class="nav__logo">
                <a href="{{ route('landingpage') }}" class="hover:opacity-80 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-[150px] h-auto">
                </a>
            </div>
            <div class="text-[1.5rem] text-white cursor-pointer hover:text-red-200 transition-colors" id="menu-btn">
                <span><i class="ri-menu-line"></i></span>
            </div>
        </div>
  
        <!-- Menu Links -->
        <ul class="absolute top-5 left-0 w-full p-4 list-none flex flex-row items-center justify-center gap-8">
            <li><a href="{{ route('landingpage') }}" class="text-white border-b-4 border-transparent hover:border-red-200 transition duration-300">Home</a></li>
            <li><a href="{{ route('aboutus') }}" class="text-white border-b-4 border-transparent hover:border-red-200 transition duration-300">About Us</a></li>
            <li><a href="{{ route('faq') }}" class="text-white border-b-4 border-transparent hover:border-red-200 transition duration-300">Help</a></li>
        </ul>
  
        <!-- Buttons -->
        <div class="flex flex-1 space-x-2 z-20">
            <a href="{{ route('register') }}" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-white hover:text-red-200 bg-transparent transition duration-300">
                Sign Up
            </a>
            <a href="{{ route('login') }}" class="py-3 px-6 outline-none border-none text-base whitespace-nowrap rounded-[10px] text-white hover:bg-red-800 transition duration-300" style="background-color:#d60505;">
                Sign In
            </a>
        </div>
    </nav>

    <main class="flex justify-center items-center min-h-[calc(100vh-4rem)] relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="grid grid-cols-6 gap-4 p-4">
                @for ($i = 0; $i < 30; $i++)
                    <div class="sports-icon text-white/20">
                        <i class="fi fi-rs-{{ ['volleyball', 'basketball', 'running', 'gym', 'tennis', 'biking-mountain', 'shuttlecock', 'swimmer', 'ping-pong'][$i % 9] }} text-[4rem]"></i>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Register Card -->
        <div class="login-card mb-16 w-96 p-8 rounded-2xl z-20">
            <div class="flex justify-center items-center font-semibold pb-6">
                <h2 class="text-2xl text-gray-800">Create Account!</h2>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-gray-200 text-gray-500">Or register with email</span>
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <!-- Username -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" placeholder="Enter your username" value="{{ old('username') }}" required autofocus autocomplete="username">
                    @error('username')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="kota" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" placeholder="Enter your city" value="{{ old('kota') }}" required>
                    @error('kota')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender and Date of Birth in one row -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Gender -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" required>
                            <option value="">Select Gender</option>
                            <option value="Laki laki" {{ old('gender') == 'Laki laki' ? 'selected' : '' }}>Laki laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            <option value="-" {{ old('gender') == '-' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="tanggal_lahir" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" value="{{ old('tanggal_lahir') }}" required>
                        <small class="text-gray-500">Format: YYYY-MM-DD</small>
                        @error('tanggal_lahir')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password and Confirm Password in one row -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Password -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" placeholder="Enter your password" required autocomplete="new-password">
                        @error('password')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="input-field w-full px-4 py-3 text-sm font-medium border border-gray-300 rounded-xl focus:outline-none focus:border-red-500" placeholder="Confirm your password" required autocomplete="new-password">
                        @error('password_confirmation')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <button type="submit" class="login-btn w-full py-3 text-sm font-medium text-white bg-red-600 rounded-xl hover:bg-red-700">
                    Register
                </button>
            </form>

            <p class="text-center mt-6 text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-red-600 hover:text-red-700 font-medium">Sign in</a>
            </p>
        </div>
    </main>

    <footer class="bg-white/10 backdrop-blur-md text-white">
        <div class="mx-auto w-full max-w-screen-xl flex flex-col items-center">
            <div class="grid grid-cols-2 gap-80 px-4 py-6 lg:py-8 md:grid-cols-3">
                <div class="flex flex-col items-center">
                    <h2 class="mb-6 text-sm font-semibold uppercase">Contact us</h2>
                    <ul class="text-gray-200 font-medium text-center">
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">Careers</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col items-center">
                    <h2 class="mb-6 text-sm font-semibold uppercase">Follow Us</h2>
                    <ul class="text-gray-200 font-medium text-center">
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">Instagram</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">Facebook</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col items-center">
                    <h2 class="mb-6 text-sm font-semibold uppercase">Location</h2>
                    <ul class="text-gray-200 font-medium text-center">
                        <li class="mb-4">
                            <a href="#" class="hover:text-red-200 transition-colors">Jl.Majalaya</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
