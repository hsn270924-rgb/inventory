<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $cart[$request->product_id] = [
                'price' => $request->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Added to cart',
            'cart' => $cart,
        ]);
    }
}
