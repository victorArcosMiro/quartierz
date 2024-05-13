<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiasVetadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vacaciones (dos semanas durante el año)
        $inicio_vacaciones = '2024-07-01'; // Fecha de inicio de las vacaciones
        $fin_vacaciones = '2024-07-14'; // Fecha de fin de las vacaciones

        // Días festivos en Zaragoza
        $dias_festivos = [
            '2024-01-01', // Año Nuevo
            '2024-01-06', // Epifanía del Señor
            '2024-04-19', // Viernes Santo
            '2024-04-22', // Lunes de Pascua
            '2024-05-01', // Día del Trabajo
            '2024-06-10', // Día de la Virgen del Pilar
            '2024-12-06', // Día de la Constitución Española
            '2024-12-08', // Inmaculada Concepción
            '2024-12-25', // Navidad
        ];

        // Insertar los días festivos en la tabla dias_vetados
        foreach ($dias_festivos as $fecha) {
            DB::table('dias_vetados')->insert([
                'fecha' => $fecha,
                'tipo_dia_id' => 1, // Identificador para días festivos
            ]);
        }

        // Insertar las dos semanas de vacaciones en la tabla dias_vetados
        $fecha_actual = $inicio_vacaciones;
        while ($fecha_actual <= $fin_vacaciones) {
            DB::table('dias_vetados')->insert([
                'fecha' => $fecha_actual,
                'tipo_dia_id' => 2, // Identificador para días de vacaciones
            ]);
            $fecha_actual = date('Y-m-d', strtotime($fecha_actual . ' +1 day')); // Avanzar al siguiente día
        }
    }
}
