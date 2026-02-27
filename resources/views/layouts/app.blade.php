<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- HEADER (global) -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">ORM SYSTEMS</h1>

            <nav class="hidden md:flex gap-6 text-sm font-medium">
                <a href="#" class="hover:text-blue-600">Brands</a>
                <a href="#" class="hover:text-blue-600">About Us</a>
                <a href="#" class="hover:text-blue-600">Services</a>
                <a href="#" class="hover:text-blue-600">Solutions</a>
                <a href="#" class="hover:text-blue-600">Support</a>
            </nav>

            <!-- Cart Button -->
            <a href="/cart" class="relative bg-black text-white px-4 py-2 rounded text-sm hover:bg-gray-800">
                View Cart
                <span id="cart-count"
                    class="absolute -top-2 -right-2 bg-red-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                    0
                </span>
            </a>
        </div>
    </header>
    <!-- MAIN -->
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>
    <script src="/js/cart.js"></script>
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