<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Http::get('https://fakestoreapi.com/products')->json();

        foreach ($products as $p) {
            Product::updateOrCreate(
                ['id' => $p['id']], // 🔥 same ID
                [
                    'name' => $p['title'],
                    'price' => $p['price'],
                    'stock' => rand(5, 20), // simulate stock
                ]
            );
        }
    }
}
