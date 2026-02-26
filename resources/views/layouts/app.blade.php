<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App')</title>
    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-50">
    @yield('content')
    <script src="/js/product-search.js"></script>

    <!-- FOOTER -->
    <footer class="bg-black text-white mt-16">
        <div class="max-w-7xl mx-auto px-6 py-10 text-center">
            <h2 class="text-lg font-semibold mb-2">ORM SYSTEMS</h2>
            <p class="text-sm text-gray-400">
                Excellence in Enterprise Network & Power Solutions
            </p>
        </div>
    </footer>
</body>

</html>