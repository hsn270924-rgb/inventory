<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- HEADER -->
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

            <button class="bg-black text-white px-4 py-2 rounded text-sm">
                Get a Quote
            </button>
        </div>
    </header>

    <!-- MAIN -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- PRODUCT SECTION -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-lg shadow">

            <!-- IMAGE -->
            <div class="border rounded-lg flex items-center justify-center p-6">
                <img src="{{ $products->image }}" alt="Product" class="object-contain">
            </div>

            <!-- DETAILS -->
            <div>
                <h2 class="text-xl font-semibold mb-2">
                    {{ $products->title }}
                </h2>

                <p class="text-sm text-gray-600 mb-3">
                    {{ $products->description }}
                </p>

                <!-- RATING -->
                <div class="flex items-center gap-1 text-yellow-400 mb-3">
                    ★★★★☆
                    <span class="text-gray-500 text-sm ml-2">{{ $products->rating->rate }}</span>
                </div>

                <p class="text-sm text-gray-500 mb-2">
                    Category: <span class="text-black">{{ $products->category }}</span>
                </p>

                <!-- PRICE -->
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl font-bold">${{ $products->price }}</span>
                    <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded">
                        In Stock
                    </span>
                </div>

                <!-- CART -->
                <div class="flex items-center gap-4">
                    <input type="number" value="1" min="1" class="w-16 border rounded px-2 py-1 text-center">

                    <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Add to Cart
                    </button>

                    <button class="border rounded p-2 hover:bg-gray-100">
                        ❤️
                    </button>
                </div>
            </div>
        </div>

        <!-- SEARCH -->
        <div class="mt-10 bg-white p-6 rounded-lg shadow">
            <input type="text" placeholder="Search" class="w-full border rounded px-4 py-2 mb-4">

            <!-- PRODUCT LIST -->
            <div class="space-y-3">
                <div class="flex items-center gap-4 border rounded p-3 hover:bg-gray-50">
                    <img src="https://via.placeholder.com/40" class="w-10">
                    <p class="text-sm">28IN 4U HMC-4G and 2CAB-HD-4SRNC Terminal Server Bundle</p>
                </div>

                <div class="flex items-center gap-4 border rounded p-3 hover:bg-gray-50">
                    <img src="https://via.placeholder.com/40" class="w-10">
                    <p class="text-sm">28IN 4U HMC-4G and 2CAB-HD-4SRNC Terminal Server Bundle</p>
                </div>

                <div class="flex items-center gap-4 border rounded p-3 hover:bg-gray-50">
                    <img src="https://via.placeholder.com/40" class="w-10">
                    <p class="text-sm">28IN 4U HMC-4G and 2CAB-HD-4SRNC Terminal Server Bundle</p>
                </div>
            </div>
        </div>

    </main>

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