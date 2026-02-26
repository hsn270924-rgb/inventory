<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $products = Http::get('https://fakestoreapi.com/products')->json();
        dd($products);
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Http::get("https://fakestoreapi.com/products/{$id}")->json();

        return view('products.productDetails', compact('product'));
    }

    public function search(Request $request)
    {
        $query = strtolower($request->get('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        // Fetch all products
        $products = Http::get('https://fakestoreapi.com/products')->json();

        // Filter server-side
        $filtered = collect($products)->filter(function ($product) use ($query) {
            return str_contains(strtolower($product['title']), $query);
        })->values();

        return response()->json($filtered);
    }
}
