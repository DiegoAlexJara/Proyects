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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->string('domicilio'); // Domicilio del cliente
            $table->decimal('precio', 10, 2); // Precio del servicio/producto
            $table->decimal('propina', 10, 2)->default(0); // Propina (por defecto 0)
            $table->decimal('pagado', 10, 2)->default(0); // Propina (por defecto 0)
            $table->enum('status', ['pendiente', 'completado'])->default('pendiente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
