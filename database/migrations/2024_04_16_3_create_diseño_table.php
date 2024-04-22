<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseñoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre_material');
            $table->string('n_piezas');
            $table->string('imagen_design');
            $table->integer('precio');
            $table->unsignedBigInteger('material_id')->nullable();;
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('material');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('design');
    }
}
