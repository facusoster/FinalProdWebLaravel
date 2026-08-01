<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Baguette Artesanal', 'description' => 'Pan crujiente de masa madre.', 'price' => 1800, 'stock' => 25, 'image_url' => 'products/baguette.jpg'],
            ['name' => 'Pan de Campo', 'description' => 'Pan rústico con corteza dorada.', 'price' => 2000, 'stock' => 15, 'image_url' => 'products/pan_campo.jpg'],
            ['name' => 'Pan Integral', 'description' => 'Pan saludable con harina integral.', 'price' => 1700, 'stock' => 20, 'image_url' => 'products/pan_integral.jpg'],
            ['name' => 'Pan de Centeno', 'description' => 'Pan oscuro y denso con sabor intenso.', 'price' => 1900, 'stock' => 18, 'image_url' => 'products/pan_centeno.jpg'],
            ['name' => 'Pan francés', 'description' => 'Pan crujiente y aromático.', 'price' => 1900, 'stock' => 18, 'image_url' => 'products/pan_francés.jpg'],
            // ['name' => 'Pan flauta', 'description' => 'Pan aromático con mantequilla de ajo.', 'price' => 1600, 'stock' => 22, 'image_url' => 'products/pan_ajo.jpg'],
            // ['name' => 'Pan de Queso', 'description' => 'Pan suave con trozos de queso.', 'price' => 2100, 'stock' => 12, 'image_url' => 'products/pan_queso.jpg'],
            // ['name' => 'Pan de Chocolate', 'description' => 'Pan dulce relleno de chocolate.', 'price' => 2200, 'stock' => 14, 'image_url' => 'products/pan_chocolate.jpg'],
            // ['name' => 'Pan de Nuez', 'description' => 'Pan con nueces y sabor a miel.', 'price' => 2300, 'stock' => 10, 'image_url' => 'products/pan_nuez.jpg'],
            
            ['name' => 'Croissant de Manteca', 'description' => 'Croissant hojaldrado y dorado.', 'price' => 1200, 'stock' => 20, 'image_url' => 'products/croissant.jpg'],
            ['name' => 'Croissant de Chocolate', 'description' => 'Croissant relleno de chocolate.', 'price' => 1400, 'stock' => 15, 'image_url' => 'products/croissant_chocolate.jpg'],
            ['name' => 'Croissant de Almendras', 'description' => 'Croissant relleno de crema de almendras.', 'price' => 1500, 'stock' => 10, 'image_url' => 'products/croissant_almendra.jpg'],
            ['name' => 'Croissant de Jamón y Queso', 'description' => 'Croissant salado con jamón y queso.', 'price' => 1600, 'stock' => 12, 'image_url' => 'products/croissant_jamon_queso.jpg'],
            ['name' => 'Croissant de Dulce de Leche', 'description' => 'Croissant relleno de dulce de leche.', 'price' => 1500, 'stock' => 10, 'image_url' => 'products/croissant_dulce_leche.jpg'],
            
            ['name' => 'Medialunas de Manteca - 1/2 Docena', 'description' => 'Medialuna hojaldrada y dorada.', 'price' => 1000, 'stock' => 25, 'image_url' => 'products/medialuna_manteca.jpg'],
            ['name' => 'Medialunas de Manteca - 1 Docena', 'description' => 'Medialuna hojaldrada y dorada.', 'price' => 1800, 'stock' => 20, 'image_url' => 'products/medialuna_manteca.jpg'],
            ['name' => 'Medialunas de Grasa - 1/2 Docena', 'description' => 'Medialuna suave y esponjosa.', 'price' => 950, 'stock' => 30, 'image_url' => 'products/medialuna.jpg'],
            ['name' => 'Medialunas de Grasa - 1 Docena', 'description' => 'Medialuna suave y esponjosa.', 'price' => 1700, 'stock' => 25, 'image_url' => 'products/medialuna.jpg'],
            ['name' => 'Facturas variadas - 1/2 Docena', 'description' => 'Selección de facturas clásicas y de especialidad.', 'price' => 1200, 'stock' => 20, 'image_url' => 'products/facturas_varias.jpg'],
            ['name' => 'Facturas variadas - 1 Docena', 'description' => 'Selección de facturas clásicas y de especialidad.', 'price' => 2200, 'stock' => 15, 'image_url' => 'products/facturas_varias.jpg'],
            ['name' => 'Facturas de Dulce de Leche - 1/2 Docena', 'description' => 'Facturas clásicas rellenas con dulce de leche.', 'price' => 1100, 'stock' => 24, 'image_url' => 'products/factura.jpg'],
            ['name' => 'Facturas de Dulce de Leche - 1 Docena', 'description' => 'Facturas clásicas rellenas con dulce de leche.', 'price' => 2000, 'stock' => 12, 'image_url' => 'products/factura.jpg'],
            
            ['name' => 'Tarta de Frutillas', 'description' => 'Tarta fina con crema y frutillas.', 'price' => 3200, 'stock' => 10, 'image_url' => 'products/tarta.jpg'],
            ['name' => 'Muffin de Chocolate', 'description' => 'Muffin húmedo con chips de chocolate.', 'price' => 1400, 'stock' => 18, 'image_url' => 'products/muffin.jpg'],
            ['name' => 'Rollo de Canela', 'description' => 'Rollo dulce con canela y glaseado.', 'price' => 1300, 'stock' => 15, 'image_url' => 'products/rollo_canela.jpg'],
            ['name' => 'Alfajor de Maicena', 'description' => 'Alfajor relleno de dulce de leche y bañado en chocolate.', 'price' => 900, 'stock' => 40, 'image_url' => 'products/alfajor.jpg'],
            ['name' => 'Alfajor de Chocolate', 'description' => 'Alfajor relleno de dulce de leche y bañado en chocolate.', 'price' => 900, 'stock' => 40, 'image_url' => 'products/alfajor_chocolate.jpg'],
            ['name' => 'Alfajor de Frutilla', 'description' => 'Alfajor relleno de dulce de frutilla y bañado en chocolate.', 'price' => 900, 'stock' => 40, 'image_url' => 'products/alfajor_frutilla.jpg'],
            ['name' => 'Cookie de Avena y Pasas', 'description' => 'Cookie crujiente con avena y pasas.', 'price' => 800, 'stock' => 35, 'image_url' => 'products/cookie.jpg'],
            ['name' => 'Cookie de Chocolate', 'description' => 'Cookie crujiente con chips de chocolate.', 'price' => 800, 'stock' => 35, 'image_url' => 'products/cookie_chocolate.jpg'],
            ['name' => 'Budín de Naranja', 'description' => 'Budín esponjoso con ralladura de naranja.', 'price' => 1500, 'stock' => 15, 'image_url' => 'products/budin_naranja.jpg'],
            ['name' => 'Budín de Banana', 'description' => 'Budín esponjoso con sabor a banana.', 'price' => 1500, 'stock' => 15, 'image_url' => 'products/budin.jpg'],
            ['name' => 'Budín de Limón', 'description' => 'Budín fresco con ralladura de limón.', 'price' => 1500, 'stock' => 15, 'image_url' => 'products/budin_limon.jpg'],
            ['name' => 'Pastafrola de Membrillo', 'description' => 'Tarta tradicional con dulce de membrillo.', 'price' => 2800, 'stock' => 12, 'image_url' => 'products/pastafrola.jpg'],
            
            ['name' => 'Cheesecake de Limón', 'description' => 'Cheesecake cremoso con sabor a limón.', 'price' => 3500, 'stock' => 10, 'image_url' => 'products/cheesecake_limon.jpg'],
            ['name' => 'Torta de Zanahoria', 'description' => 'Torta húmeda con zanahoria y especias.', 'price' => 4000, 'stock' => 8, 'image_url' => 'products/torta_zanahoria.jpg'],
            ['name' => 'Tarta de Manzana', 'description' => 'Tarta clásica con manzanas caramelizadas.', 'price' => 3000, 'stock' => 12, 'image_url' => 'products/tarta_manzana.jpg'],
            ['name' => 'Tarta de Limón', 'description' => 'Tarta fresca con crema de limón y merengue.', 'price' => 3000, 'stock' => 12, 'image_url' => 'products/tarta_limon.jpg'],
            ['name' => 'Cheesecake de Frutos Rojos', 'description' => 'Cheesecake cremoso con coulis de frutos rojos.', 'price' => 3500, 'stock' => 10, 'image_url' => 'products/cheesecake.jpg'],
            ['name' => 'Torta Selva Negra', 'description' => 'Torta de chocolate con cerezas y crema chantilly.', 'price' => 4500, 'stock' => 8, 'image_url' => 'products/selva_negra.jpg'],

            ['name' => 'Brownie de Chocolate', 'description' => 'Brownie denso y chocolatoso.', 'price' => 1500, 'stock' => 20, 'image_url' => 'products/brownie.jpg'],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['name' => $product['name']],
                array_merge($product, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
