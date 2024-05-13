<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class TiposDiasVetados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar los tipos de días vetados en la tabla
        DB::table('tipo_dias_vetados')->insert([
            ['nombre' => 'vacaciones'],
            ['nombre' => 'festivos'],
        ]);
    }
}
