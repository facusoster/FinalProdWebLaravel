<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = User::where('role', 'cliente')->get();
        $products = Product::all();

        foreach ($clientes as $cliente) {
            Review::create([
                'user_id' => $cliente->id,
                'product_id' => $products->random()->id,
                'rating' => rand(3, 5),
                'comment' => 'Muy rico!',
            ]);
        }
    }
}
