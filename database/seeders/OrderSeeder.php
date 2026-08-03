<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $clients  = User::where('role', 'cliente')->get();
        $products = Product::all();

        if ($clients->isEmpty() || $products->isEmpty()) {
            return;
        }

        foreach ($clients as $client) {
            $address = $client->addresses()->first()
                ?? Address::where('user_id', $client->id)->first();

            if (! $address) continue;

            // 1 a 3 órdenes completadas por cliente
            foreach (range(1, rand(1, 3)) as $_) {
                $order = Order::create([
                    'user_id'    => $client->id,
                    'address_id' => $address->id,
                    'status'     => 'completed',
                    'total'      => 0,
                ]);

                $total = 0;
                $selected = $products->random(min(rand(2, 5), $products->count()));

                foreach ($selected as $product) {
                    $qty = rand(1, 3);
                    $sub = $product->price * $qty;

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $qty,
                        'unit_price' => $product->price,
                        'subtotal'   => $sub,
                    ]);

                    $total += $sub;
                }

                $order->update(['total' => $total]);
            }
        }
    }
}
