<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return response()->json(['message' => 'Cart is empty'], 422);
        }

        try {
            DB::transaction(function () use ($cart) {

                foreach ($cart as $productId => $item) {

                    $product = Product::where('id', $productId)
                        ->lockForUpdate()
                        ->first();

                    if (!$product) {
                        throw new \Exception('Product not found');
                    }

                    if ($product->stock < $item['quantity']) {
                        throw new \Exception('Insufficient stock for product ID ' . $productId);
                    }

                    // Deduct stock safely
                    $product->decrement('stock', $item['quantity']);

                    Order::create([
                        'product_id'  => $product->id,
                        'quantity'    => $item['quantity'],
                        'total_price' => $product->price * $item['quantity'],
                    ]);
                }
            });

            session()->forget('cart');

            return response()->json([
                'message' => 'Order placed successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order failed',
                'error'   => $e->getMessage(),
            ], 422);
        }
    }
}
