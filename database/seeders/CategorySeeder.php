<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Panadería', 'description' => 'Panes artesanales de fermentación natural.'],
            ['name' => 'Croissants', 'description' => 'Pasionales y hojaldrados recién horneados.'],
            ['name' => 'Facturas', 'description' => 'Facturas clásicas y de especialidad.'],
            ['name' => 'Pasteleria seca', 'description' => 'Alfajores, cookies, budines, pastafrolas'],
            ['name' => 'Pasteleria fresca', 'description' => 'Tortas humedas, con cremas, mousse, dulce de leche, y más'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['name' => $category['name']],
                array_merge($category, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
