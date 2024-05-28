<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidosTelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nombres y apellidos aleatorios para combinar.
        $nombres   = ['Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Laura', 'Carlos', 'Sofía', 'David', 'Elena'];
        $apellidos = ['García', 'Martínez', 'López', 'González', 'Rodríguez', 'Fernández', 'Pérez', 'Martín', 'Sánchez', 'Ruiz'];

        // Precios por pieza de cada diseño.
        $preciosPorPieza = [
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

        // Generar pedidos por teléfono de ejemplo
        for ($i = 0; $i < 5; $i++) {
            // Seleccionar un nombre y apellido aleatorio
            $nombre   = $nombres[array_rand($nombres)];
            $apellido = $apellidos[array_rand($apellidos)];

            // Generar número de teléfono aleatorio
            $telefono = '6';
            for ($j = 0; $j < 8; $j++) {
                $telefono .= rand(0, 9);
            }

            $estadoPedidoId = rand(1, 4); // Seleccionar un estado aleatorio

            // Generar una fecha aleatoria para el pedido
            $fechaAleatoria = Carbon::today()->addDays(rand(0, 30)); // Agregar un número aleatorio de días a la fecha actual

            // Generar una hora aleatoria entre 16:00 y 20:00
            $horaAleatoria = Carbon::createFromTime(16, 0); // Hora inicial a las 16:00

            // Añadir un número aleatorio de medias horas (intervalos de 30 minutos)
            $horaAleatoria->addMinutes(rand(0, 7) * 30);

            // Combinar fecha y hora para la cita
            $cita = $fechaAleatoria->toDateString() . ' ' . $horaAleatoria->toTimeString();

            // Insertar el pedido por teléfono en la base de datos
            DB::table('pedidos_por_telefono')->insert([
                'nombre'           => $nombre,
                'apellidos'        => $apellido,
                'telefono'         => $telefono, // Nuevo campo para teléfono
                'cita'             => $cita,
                'estado_pedido_id' => $estadoPedidoId,
                'precio_total'     => $preciosPorPieza[$estadoPedidoId], // Precio según el ID de estado
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
