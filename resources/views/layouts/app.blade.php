<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportSpace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">
    <style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-4 space-y-4">
            <h1 class="text-xl font-bold text-red-600 mb-6">SportSpace</h1>
            <nav class="flex flex-col space-y-2">
                <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Dashboard</a>
                <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Community</a>
                <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Sports Group</a>
                <a href="{{ route('fields.index') }}" class="text-gray-700 hover:text-red-600 font-medium">Lapangan</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>

</html>