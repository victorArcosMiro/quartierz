<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definir los productos y sus características
        $productos = [
            // Productos de oro de 18K
            ['nombre' => '1 PIEZA', 'nombre_material' => 'oro 18K', 'n_piezas' => '1', 'imagen_design' => 'imagen1_1.jpg', 'precio' => 180, 'material_id' => 1],
            ['nombre' => '2 PIEZAS', 'nombre_material' => 'oro 18K', 'n_piezas' => '2', 'imagen_design' => 'imagen2_1.jpg', 'precio' => 350, 'material_id' => 1],
            ['nombre' => '3 PIEZAS', 'nombre_material' => 'oro 18K', 'n_piezas' => '3', 'imagen_design' => 'imagen3_1.jpg', 'precio' => 500, 'material_id' => 1],
            ['nombre' => '4 PIEZAS', 'nombre_material' => 'oro 18K', 'n_piezas' => '4', 'imagen_design' => 'imagen4_1.jpg', 'precio' => 650, 'material_id' => 1],
            ['nombre' => '6 PIEZAS', 'nombre_material' => 'oro 18K', 'n_piezas' => '6', 'imagen_design' => 'imagen6_1.jpg', 'precio' => 900, 'material_id' => 1],
            ['nombre' => '8 PIEZAS', 'nombre_material' => 'oro 18K', 'n_piezas' => '8', 'imagen_design' => 'imagen8_1.jpg', 'precio' => 1100, 'material_id' => 1],

            // Productos de oro de 9K
            ['nombre' => '1 PIEZA', 'nombre_material' => 'oro 9K', 'n_piezas' => '1', 'imagen_design' => 'imagen1_1.jpg', 'precio' => 90, 'material_id' => 2],
            ['nombre' => '2 PIEZAS', 'nombre_material' => 'oro 9K', 'n_piezas' => '2', 'imagen_design' => 'imagen2_1.jpg', 'precio' => 170, 'material_id' => 2],
            ['nombre' => '3 PIEZAS', 'nombre_material' => 'oro 9K', 'n_piezas' => '3', 'imagen_design' => 'imagen3_1.jpg', 'precio' => 240, 'material_id' => 2],
            ['nombre' => '4 PIEZAS', 'nombre_material' => 'oro 9K', 'n_piezas' => '4', 'imagen_design' => 'imagen4_1.jpg', 'precio' => 310, 'material_id' => 2],
            ['nombre' => '6 PIEZAS', 'nombre_material' => 'oro 9K', 'n_piezas' => '6', 'imagen_design' => 'imagen6_1.jpg', 'precio' => 450, 'material_id' => 2],
            ['nombre' => '8 PIEZAS', 'nombre_material' => 'oro 9K', 'n_piezas' => '8', 'imagen_design' => 'imagen8_1.jpg', 'precio' => 580, 'material_id' => 2],

            // Productos de cromo
            ['nombre' => '1 PIEZA', 'nombre_material' => 'cromo', 'n_piezas' => '1', 'imagen_design' => 'imagen1.jpg', 'precio' => 120, 'material_id' => 3],
            ['nombre' => '2 PIEZAS', 'nombre_material' => 'cromo', 'n_piezas' => '2', 'imagen_design' => 'imagen2.jpg', 'precio' => 240, 'material_id' => 3],
            ['nombre' => '3 PIEZAS', 'nombre_material' => 'cromo', 'n_piezas' => '3', 'imagen_design' => 'imagen3.jpg', 'precio' => 360, 'material_id' => 3],
            ['nombre' => '4 PIEZAS', 'nombre_material' => 'cromo', 'n_piezas' => '4', 'imagen_design' => 'imagen4.jpg', 'precio' => 480, 'material_id' => 3],
            ['nombre' => '6 PIEZAS', 'nombre_material' => 'cromo', 'n_piezas' => '6', 'imagen_design' => 'imagen6.jpg', 'precio' => 600, 'material_id' => 3],
            ['nombre' => '8 PIEZAS', 'nombre_material' => 'cromo', 'n_piezas' => '8', 'imagen_design' => 'imagen8.jpg', 'precio' => 720, 'material_id' => 3],
        ];

        // Insertar los productos en la tabla 'design'
        foreach ($productos as $producto) {
            DB::table('design')->insert($producto);
        }
    }
}
