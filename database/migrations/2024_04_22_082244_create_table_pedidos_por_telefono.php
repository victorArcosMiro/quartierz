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
        Schema::create('table_pedidos_por_telefono', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');


            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('design_id');
            $table->dateTime('cita');
            $table->unsignedBigInteger('custom_id')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pedidos_por_telefono');
    }
};
