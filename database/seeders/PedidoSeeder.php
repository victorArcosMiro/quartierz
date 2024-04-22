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
        $designIds = DB::table('design')->pluck('id');
        $customIds = DB::table('custom')->pluck('id');

        // Obtener IDs de usuarios creados anteriormente
        $usersIds = DB::table('users')->pluck('id');

        // Generar pedidos de ejemplo
        for ($i = 0; $i < 10; $i++) {
            $pedido = [
                'users_id' => $usersIds->random(),
                'material_id' => $materialIds->random(),
                'design_id' => $designIds->random(),
                'cita' => Carbon::now()->addDays(rand(1, 30))->toDateTimeString(),
                'custom_id' => $customIds->random(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Insertar el pedido en la base de datos
            DB::table('pedido')->insert($pedido);
        }
    }
}
