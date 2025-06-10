<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Flowbite -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
        <script>
            // Initialize Flowbite
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize all modals
                const modalButtons = document.querySelectorAll('[data-modal-toggle]');
                modalButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetId = this.getAttribute('data-modal-target');
                        const modal = document.getElementById(targetId);
                        if (modal) {
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                            modal.classList.add('items-center');
                            modal.classList.add('justify-center');
                        }
                    });
                });

                // Close modal when clicking close button or cancel button
                const closeButtons = document.querySelectorAll('[data-modal-hide]');
                closeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetId = this.getAttribute('data-modal-hide');
                        const modal = document.getElementById(targetId);
                        if (modal) {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                            modal.classList.remove('items-center');
                            modal.classList.remove('justify-center');
                        }
                    });
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
    </body>
</html>
