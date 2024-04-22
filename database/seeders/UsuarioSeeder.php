<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insertar usuarios de ejemplo
        DB::table('users')->insert([
            'name' => 'Ejemplo Usuario',
            'email' => 'usuario@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('contraseña'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insertar tokens de reseteo de contraseña de ejemplo
        DB::table('password_reset_tokens')->insert([
            'email' => 'usuario@example.com',
            'token' => 'token_de_ejemplo',
            'created_at' => now(),
        ]);

        // Insertar sesiones de ejemplo
        DB::table('sessions')->insert([
            'id' => 'sesion_de_ejemplo',
            'user_id' => 1, // ID del usuario relacionado
            'ip_address' => '127.0.0.1',
            'user_agent' => 'User Agent de ejemplo',
            'payload' => 'Payload de ejemplo',
            'last_activity' => time(),
        ]);
    }
}
