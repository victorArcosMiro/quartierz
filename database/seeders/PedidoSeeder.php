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
        1 => 180,
        2 => 350,
        3 => 500,
        4 => 650,
        5 => 900,
        6 => 1100,
        7 => 90,
        8 => 170,
        9 => 240,
        10 => 310,
        11 => 450,
        12 => 580,
        13 => 120,
        14 => 240,
        15 => 360,
        16 => 480,
        17 => 600,
        18 => 720,
        ];

       // Generar pedidos de ejemplo
for ($i = 0; $i < 10; $i++) {
    $designId = rand(2, 18); // Seleccionar un diseño aleatorio
    $cantidad = rand(1, 3);
    $precioPorPieza = $preciosPorPieza[$designId];
    $precioTotal = $cantidad * $precioPorPieza;

    // Generar una fecha aleatoria para el pedido
    $fechaAleatoria = Carbon::today()->addDays(rand(1, 30)); // Agregar un número aleatorio de días a la fecha actual

    // Generar una hora aleatoria entre 16:00 y 20:00
    $horaAleatoria = Carbon::createFromTime(16, 0); // Hora inicial a las 16:00

    // Añadir un número aleatorio de medias horas (intervalos de 30 minutos)
    $horaAleatoria->addMinutes(rand(0, 15) * 30);

    // Combinar fecha y hora para la cita
    $cita = $fechaAleatoria->toDateString() . ' ' . $horaAleatoria->toTimeString();

    $pedido = [
        'user_id'           => $usersIds->random(),
        'cita'              => $cita,
        'estado_pedido_id'  => rand(1, 4),
        'cantidad_total'    => $cantidad,
        'created_at'        => Carbon::now(),
        'updated_at'        => Carbon::now(),
    ];

    // Insertar el pedido en la base de datos
    DB::table('pedido')->insert($pedido);
}
    }
}
