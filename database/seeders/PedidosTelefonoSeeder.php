<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidosTelefonoSeeder extends Seeder
{
    /**
     * Nombres y apellidos aleatorios para combinar.
     */
    private $nombres = ['Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Laura', 'Carlos', 'Sofía', 'David', 'Elena'];
    private $apellidos = ['García', 'Martínez', 'López', 'González', 'Rodríguez', 'Fernández', 'Pérez', 'Martín', 'Sánchez', 'Ruiz'];

    /**
     * Precios por pieza de cada diseño.
     */
    private $preciosPorPieza = [
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

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener IDs de materiales, diseños y personalizados existentes
        $materialIds = DB::table('material')->pluck('id');
        $designIds = DB::table('design')->pluck('id');
        $customIds = DB::table('custom')->pluck('id');

        // Generar pedidos por teléfono de ejemplo
        for ($i = 0; $i < 5; $i++) {
            // Seleccionar un nombre y apellido aleatorio
            $nombre = $this->nombres[array_rand($this->nombres)];
            $apellido = $this->apellidos[array_rand($this->apellidos)];

            // Generar número de teléfono aleatorio
            $telefono = '6';
            for ($j = 0; $j < 8; $j++) {
                $telefono .= rand(0, 9);
            }

            $designId = rand(2, 19); // Seleccionar un diseño aleatorio
            $cantidad = rand(1, 3);
            $precioPorPieza = $this->preciosPorPieza[$designId];
            $precioTotal = $cantidad * $precioPorPieza;

            $pedidoPorTelefono = [
                'nombre' => $nombre,
                'apellidos' => $apellido,
                'telefono' => $telefono, // Nuevo campo para teléfono
                'material_id' => $materialIds->random(),
                'design_id' => $designId,
                'cita' => Carbon::now()->addDays(rand(1, 30))->toDateTimeString(),
                'estado_pedido_id' =>rand(1, 4),
                'cantidad' => $cantidad,
                'precio_total' => $precioTotal,
                'custom_id' => $customIds->random(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Insertar el pedido por teléfono en la base de datos
            DB::table('pedidos_por_telefono')->insert($pedidoPorTelefono);
        }
    }
}
