<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = User::where('role', 'cliente')->get();
        $products = Product::all();

        foreach ($clientes as $cliente) {

            // Obtener la dirección del cliente
            $address = $cliente->addresses()->first();

            $order = Order::create([
                'user_id' => $cliente->id,
                'status' => 'pendiente',
                'address_id' => $address->id,   // ← YA NO ES NULL
                'total' => 0,
            ]);

            $items = $products->random(2);
            $total = 0;

            foreach ($items as $product) {
                $qty = rand(1, 3);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $product->price,
                    'subtotal' => $qty * $product->price,
                ]);

                $total += $qty * $product->price;
            }

            $order->update(['total' => $total]);
        }
    }
}
