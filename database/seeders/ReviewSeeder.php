<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->get();
        $products = DB::table('products')->pluck('id');

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

        foreach ($products as $productId) {
            $productReviews = rand(5, 10);
            $availableUsers = $users->shuffle();

            for ($i = 0; $i < $productReviews; $i++) {
                $user = $availableUsers[$i % $availableUsers->count()];
                $rating = rand(1, 5);
                $comment = $comments[$i % count($comments)];

                DB::table('reviews')->insert([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'rating' => $rating,
                    'comment' => $comment,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
