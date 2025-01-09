<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id'); // Clave foránea a la tabla de productos
            $table->integer('quantity'); // Cantidad de productos


            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade'); // Relación con la tabla 'carts'
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Relación con la tabla 'productos'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
