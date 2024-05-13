<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $apellidos = ['García', 'Martínez', 'López', 'González', 'Rodríguez', 'Fernández', 'Pérez', 'Martín', 'Sánchez', 'Ruiz'];
    private  $telefonos = [
        '123456789',
        '234567890',
        '345678901',
        '456789012',
        '567890123',
        '678901234',
        '789012345',
        '890123456',
        '901234567',
        '012345678',
    ];
    public function run()
    {

        // Obtener los id de usuarios
        $usersIds = DB::table('users')->pluck('id')->toArray();
        // Iterar sobre cada usuario y crear un registro en la tabla datos_user
        foreach ($usersIds as $id) {
            $pedido_insert = [
                'user_id' => $id,
                'telefono' => $this->telefonos[array_rand($this->telefonos)],
                'apellido' => $this->apellidos[array_rand($this->apellidos)],
            ];
            DB::table('datos_user')->insert($pedido_insert);
        }
    }
}
