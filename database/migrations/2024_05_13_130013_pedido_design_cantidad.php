<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidoDesignCantidad extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedido_design_cantidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('design_id')->nullable();
            $table->unsignedBigInteger('custom_id')->nullable();
            $table->integer('cantidad');
            $table->integer('precio');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
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
        Schema::dropIfExists('pedido_design_cantidad');
    }
};
