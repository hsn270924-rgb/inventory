@extends('layouts.app')

@section('content')
    <!-- PRODUCT SECTION -->
    <div id="selected-product" class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-lg shadow">

        <!-- IMAGE -->
        <div class="border border-gray-200 rounded-lg flex items-center justify-center p-6">
            <img id="selected-image" src="" alt="Product" class="object-contain h-64">
        </div>

        <!-- DETAILS -->
        <div>
            <h2 id="selected-title" class="text-xl font-semibold mb-2"></h2>

            <p id="selected-description" class="text-sm text-gray-600 mb-3"></p>

            <!-- RATING -->
            <div class="flex items-center gap-1 text-yellow-400 mb-3">
                ★★★★☆
                <span id="selected-rating" class="text-gray-500 text-sm ml-2"></span>
            </div>

            <p class="text-sm text-gray-500 mb-2">
                Category: <span id="selected-category" class="text-black"></span>
            </p>

            <!-- PRICE -->
            <div class="flex items-center gap-3 mb-6">
                <span id="selected-price" class="text-3xl font-bold"></span>
                <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded">
                    Available
                </span>
            </div>

            <!-- CART ACTION -->
            <div class="flex items-center gap-4">
                <input id="order-qty" type="number" value="1" min="1"
                    class="w-16 border border-gray-200 rounded-lg px-2 py-1 text-center">

                <button id="add-to-cart-btn" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Add to Cart
                </button>

                <button class="border border-gray-200 rounded-lg p-2 hover:bg-gray-100">
                    ❤️
                </button>
            </div>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow">

        <input type="text" id="search-input" placeholder="Search products..."
            class="w-full border border-gray-200 rounded-lg px-4 py-2 mb-4 focus:ring-2 focus:ring-blue-500">

        <div id="search-results" class="space-y-3"></div>

    </div>
@endsection