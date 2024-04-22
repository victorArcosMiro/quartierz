<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



          // Orden óptimo para crear las tablas

          $this->call(MaterialSeeder::class);  // 1. Material (no depende de otras tablas)
          $this->call(UsuarioSeeder::class);    // 2. Cliente (no depende de otras tablas)

          $this->call(DesignSeeder::class);     // 3. Diseño (no depende de otras tablas)
          $this->call(CustomSeeder::class);      // 4. Custom (no depende de otras tablas)

          $this->call(PedidoSeeder::class);     // 5. Pedido (depende de Cliente, Material, Diseño y Custom)

          $this->call(PedidosTelefonoSeeder::class);    // 6. Factura (depende de Cliente y Pedido)

    }
}
