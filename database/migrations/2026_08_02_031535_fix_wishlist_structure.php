<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {

            // 1. Eliminar foreign keys
            $table->dropForeign(['product_id']);
            $table->dropForeign(['user_id']);

            // 2. Eliminar PK compuesta
            $table->dropPrimary();

            // 3. Agregar ID autoincremental
            $table->bigIncrements('id')->first();

            // 4. Crear índice único para evitar duplicados
            $table->unique(['user_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {

            $table->dropUnique(['user_id', 'product_id']);
            $table->dropColumn('id');

            $table->primary(['user_id', 'product_id']);

            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }
};
