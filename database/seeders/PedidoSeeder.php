<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener IDs de usuarios, materiales, diseños y personalizados existentes
        $materialIds = DB::table('material')->pluck('id');
        $customIds = DB::table('custom')->pluck('id');

        // Obtener IDs de usuarios creados anteriormente
        $usersIds = DB::table('users')->pluck('id');

        // Precios por pieza de cada diseño
        $preciosPorPieza = [
            1 => 180,   // Precio del diseño con ID 1
        2 => 350,   // Precio del diseño con ID 2
        3 => 500,   // Precio del diseño con ID 3
        4 => 650,   // Precio del diseño con ID 4
        5 => 900,   // Precio del diseño con ID 5
        6 => 1100,  // Precio del diseño con ID 6
        7 => 90,    // Precio del diseño con ID 7
        8 => 170,   // Precio del diseño con ID 8
        9 => 240,   // Precio del diseño con ID 9
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

        // Generar pedidos de ejemplo
        for ($i = 0; $i < 10; $i++) {
            $designId = rand(2, 18); // Seleccionar un diseño aleatorio
            $cantidad = rand(1, 3);
            $precioPorPieza = $preciosPorPieza[$designId];
            $precioTotal = $cantidad * $precioPorPieza;

            $pedido = [
                'user_id' => $usersIds->random(),
                'cita' => Carbon::now()->addDays(rand(1, 30))->toDateTimeString(),
                'estado_pedido_id' =>rand(1, 4),
                'cantidad_total' => $cantidad,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Insertar el pedido en la base de datos
            DB::table('pedido')->insert($pedido);
        }
    }
}
