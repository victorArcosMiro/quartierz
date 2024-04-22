<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('material')->insert([
            [
                'material' => 'Oro 18K',
                'descripcion'=> 'Cada pieza es meticulosamente diseñada para ofrecer un brillo dorado incomparable, mientras que su calidad excepcional garantiza una durabilidad que perdura en el tiempo. Eleva tu apariencia con el lujo eterno de nuestros grillz de oro de 18 quilates.'
            ],
            [
                'material' => 'Oro 9K',
                'descripcion'=> 'Descubre la elegancia atemporal con nuestros grillz de oro de 9 quilates. Con una mezcla distintiva de estilo y sofisticación, nuestros grillz de oro de 9K son una expresión de gusto refinado.'
            ],
            [
                'material' => "Cromo",
                'descripcion'=> 'Sumérgete en el mundo moderno de la elegancia audaz con nuestros grillz de cromo. Con un acabado brillante y contemporáneo, nuestros grillz de cromo son la elección perfecta para aquellos que desean destacar con estilo vanguardista.'
            ],

        ]);
    }
}
