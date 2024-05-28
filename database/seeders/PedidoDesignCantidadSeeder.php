<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoDesignCantidadSeeder extends Seeder
{
    /**
     * Array que contiene la información de los diseños y sus precios.
     *
     * @var array
     */
    private $designPrecios = [
        1  => 180,   // Precio del diseño con ID 1
        2  => 350,   // Precio del diseño con ID 2
        3  => 500,   // Precio del diseño con ID 3
        4  => 650,   // Precio del diseño con ID 4
        5  => 900,   // Precio del diseño con ID 5
        6  => 1100,  // Precio del diseño con ID 6
        7  => 90,    // Precio del diseño con ID 7
        8  => 170,   // Precio del diseño con ID 8
        9  => 240,   // Precio del diseño con ID 9
        10 => 310,  // Precio del diseño con ID 10
        11 => 450,  // Precio del diseño con ID 11
        12 => 580,  // Precio del diseño con ID 12
        13 => 120,  // Precio del diseño con ID 13
        14 => 240,  // Precio del diseño con ID 14
        15 => 360,  // Precio del diseño con ID 15
        16 => 480,  // Precio del diseño con ID 16
        17 => 600,  // Precio del diseño con ID 17
        18 => 720,  // Precio del diseño con ID 18
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla para evitar duplicados
        DB::table('pedido_design_cantidad')->truncate();

        // Obtener IDs de las tablas relacionadas
        $pedidoIds   = range(1, 10); // IDs de pedidos web
        $tlfPedidoIds = range(1, 5); // IDs de pedidos telefónicos
        $materialIds = DB::table('material')->pluck('id')->toArray();
        $designIds   = DB::table('design')->pluck('id')->toArray();
        $customIds   = DB::table('custom')->pluck('id')->toArray();

        // Contadores para llevar un registro de las inserciones
        $normalCount = 0;
        $tlfCount = 0;

        // Generar 25 pedidos para pedidos web
        foreach ($pedidoIds as $pedidoId) {
            // Seleccionar IDs existentes aleatorios
            $materialId = $materialIds[array_rand($materialIds)];
            $designId   = $designIds[array_rand($designIds)];
            $customId   = $customIds[array_rand($customIds)];

            // Obtener precio del diseño según el ID del diseño seleccionado
            $precio = $this->designPrecios[$designId];

            // Insertar el pedido en la tabla 'pedido_design_cantidad'
            DB::table('pedido_design_cantidad')->insert([
                'pedido_id'     => $pedidoId,
                'material_id'   => $materialId,
                'design_id'     => $designId,
                'custom_id'     => $customId,
                'cantidad'      => rand(1, 10),
                'precio'        => $precio,
                'pedido_tlf'    => false, // Pedido web
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            $normalCount++;
        }

        // Generar 10 pedidos para pedidos telefónicos
        foreach ($tlfPedidoIds as $tlfPedidoId) {
            // Seleccionar IDs existentes aleatorios
            $materialId = $materialIds[array_rand($materialIds)];
            $designId   = $designIds[array_rand($designIds)];
            $customId   = $customIds[array_rand($customIds)];

            // Obtener precio del diseño según el ID del diseño seleccionado
            $precio = $this->designPrecios[$designId];

            // Insertar el pedido en la tabla 'pedido_design_cantidad'
            DB::table('pedido_design_cantidad')->insert([
                'pedido_id'     => $tlfPedidoId,
                'material_id'   => $materialId,
                'design_id'     => $designId,
                'custom_id'     => $customId,
                'cantidad'      => rand(1, 10),
                'precio'        => $precio,
                'pedido_tlf'    => true, // Pedido telefónico
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            $tlfCount++;
        }
    }

}
