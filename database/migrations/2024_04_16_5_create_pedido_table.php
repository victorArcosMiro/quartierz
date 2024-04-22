<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('design_id');
            $table->dateTime('cita');
            $table->unsignedBigInteger('custom_id')->nullable();;
            $table->timestamps();


            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('material_id')->references('id')->on('material');
            $table->foreign('design_id')->references('id')->on('design');
            $table->foreign('custom_id')->references('id')->on('custom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
