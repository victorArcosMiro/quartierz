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
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('design_id');
            $table->dateTime('cita');
            $table->unsignedBigInteger('estado_pedido_id');
            $table->integer('cantidad');
            $table->integer('precio_total');
            $table->unsignedBigInteger('custom_id')->nullable();;
            $table->timestamps();

            $table->foreign('estado_pedido_id')->references('id')->on('estados_pedido');
            $table->foreign('material_id')->references('id')->on('material');
            $table->foreign('design_id')->references('id')->on('design');
            $table->foreign('custom_id')->references('id')->on('custom');
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
