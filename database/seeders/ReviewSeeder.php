<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $completedOrders = Order::where('status', 'completed')->with('items.product')->get();

        $comments = [
            'Excelente producto, muy recomendable.',
            'Muy buen sabor y excelente presentación.',
            'Llegó fresco y con una textura impecable.',
            'Lo volvería a pedir sin duda.',
            'Muy buena calidad para el precio.',
            'Ideal para compartir en familia.',
            'El sabor es excelente y la presentación sorprende.',
            'Perfecto para cualquier ocasión especial.',
            'Muy satisfecho con la compra.',
            'Recomendado totalmente.',
        ];

        foreach ($completedOrders as $order) {
            if ($order->items->isEmpty()) continue;

            // Reseñar entre 1 y 3 productos de la orden
            $toReview = $order->items->shuffle()->take(rand(1, min(3, $order->items->count())));

            foreach ($toReview as $item) {
                $exists = Review::where('user_id', $order->user_id)
                    ->where('product_id', $item->product_id)
                    ->exists();

                if ($exists) continue;

                Review::create([
                    'user_id'    => $order->user_id,
                    'product_id' => $item->product_id,
                    'rating'     => rand(3, 5),
                    'comment'    => $comments[array_rand($comments)],
                    'created_at' => now()->subDays(rand(1, 30)),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
