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
        Schema::create('pedidos_por_telefono', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('telefono');
            $table->dateTime('cita');
            $table->unsignedBigInteger('estado_pedido_id');
            $table->integer('precio_total');
            $table->timestamps();

            $table->foreign('estado_pedido_id')->references('id')->on('estados_pedido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_por_telefono');
    }
};
