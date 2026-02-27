<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $products = Http::get('https://fakestoreapi.com/products')->json();

    //     return view('products.index', compact('products'));
    // }

    public function index()
    {
        return view('products.productDetails');
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
