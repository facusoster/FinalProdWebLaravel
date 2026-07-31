<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = User::where('role', 'cliente')->get();
        $products = Product::all();

        foreach ($clientes as $cliente) {
            $cliente->wishlist()->attach(
                $products->random(3)->pluck('id')->toArray()
            );
        }
    }
}
