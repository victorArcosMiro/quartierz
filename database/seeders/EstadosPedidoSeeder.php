<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados_pedido')->insert([
            ['nombre' => 'Pendiente de Cita'],// El pedido se ha realizado, pero está pendiente de que el cliente atienda a la cita para tomar las medidas.
            ['nombre' => 'En Proceso'],//El cliente ya ha tenido una cita con el profesional y el pedido está en proceso.
            ['nombre' => 'Manufacturado'],//El pedido se ha realizado y el producto ha sido manufacturado, pero todavía no se ha entregado.
            ['nombre' => 'Entregado'],// El pedido ha sido entregado al cliente y el proceso se ha finalizado.

        ]);
    }
}
