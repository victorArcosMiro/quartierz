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
        // Obtener IDs de materiales, diseños y personalizados existentes
        $materialIds = DB::table('material')->pluck('id');
        $designIds = DB::table('design')->pluck('id');
        $customIds = DB::table('custom')->pluck('id');

        // Generar pedidos por teléfono de ejemplo
        for ($i = 0; $i < 5; $i++) {
            $pedidoPorTelefono = [
                'nombre' => 'Nombre de ejemplo',
                'apellidos' => 'Apellidos de ejemplo',
                'material_id' => $materialIds->random(),
                'design_id' => $designIds->random(),
                'cita' => Carbon::now()->addDays(rand(1, 30))->toDateTimeString(),
                'custom_id' => $customIds->random(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Insertar el pedido por teléfono en la base de datos
            DB::table('table_pedidos_por_telefono')->insert($pedidoPorTelefono);
        }
    }
}
