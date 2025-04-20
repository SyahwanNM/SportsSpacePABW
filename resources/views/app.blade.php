<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <title>SportsSpace</title>
    @viteReactRefresh
    @vite(['resources/js/app.jsx', 'resources/css/pageStyle.css'])
</head>
<body>
    <div id="app"></div>
    
    <!-- Load scripts -->
    <script src="https://unpkg.com/scrollreveal"></script>
    @vite(['resources/js/main.js'])
</body>
</html>