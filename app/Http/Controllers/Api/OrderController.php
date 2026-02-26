<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        return DB::transaction(function () use ($req) {

            $product = Product::where('id', $req->product_id)
                ->lockForUpdate()
                ->first();

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            if ($product->stock < $req->quantity) {
                return response()->json(['message' => 'Insufficient stock'], 422);
            }

            // deduct stock
            $product->decrement('stock', $req->quantity);

            $order = Order::create([
                'product_id' => $product->id,
                'quantity' => $req->quantity,
                'total_price' => $product->price * $req->quantity,
            ]);

            return response()->json([
                'message' => 'Order placed successfully',
                'order' => $order,
            ]);
        });
    }
}
