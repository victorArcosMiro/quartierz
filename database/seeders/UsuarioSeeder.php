<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsuarioSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Insertar varios usuarios de ejemplo
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insertar tokens de reseteo de contraseña de ejemplo
        foreach(range(1, 10) as $index) {
            DB::table('password_reset_tokens')->insert([
                'email' => $faker->unique()->safeEmail,
                'token' => $faker->sha256,
                'created_at' => now(),
            ]);
        }

        // Insertar sesiones de ejemplo
        foreach(range(1, 10) as $index) {
            DB::table('sessions')->insert([
                'id' => $faker->uuid,
                'user_id' => $faker->numberBetween(1, 10), // ID del usuario relacionado
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'payload' => $faker->text,
                'last_activity' => time(),
            ]);
        }
    }
}
