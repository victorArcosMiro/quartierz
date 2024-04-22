<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('custom')->insert([
            [
                'imagen' => 'imagen_custom1.jpg'
            ],
            [
                'imagen' => 'imagen_custom2.jpg'
            ],
            [
                'imagen' => 'imagen_custom3.jpg'
            ]
        ]);
    }
}
