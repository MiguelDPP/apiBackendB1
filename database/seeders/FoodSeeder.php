<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('food')->insert([
            'name' => 'Sandwich de Pollo',
            'description' => 'Sandwich de Pollo con Jamon y Queso, mas Avena de Soya',
            'count' => 20,
            'price' => '5000',
            'type' => 'desayuno'
        ]);

        DB::table('food')->insert([
            'name' => 'Arroz Con Pollo',
            'description' => 'Arroz Con Pollo, Papa a la francesa y Jugo de Mora',
            'count' => 20,
            'price' => '10000',
            'type' => 'almuerzo'
        ]);

        DB::table('food')->insert([
            'name' => 'Hamburguesa',
            'description' => 'Hamburguesa con Papas a la Francesa',
            'count' => 20,
            'price' => '8000',
            'type' => 'cena'
        ]);

        DB::table('clients')->insert([
            'identification' => '123456789',
            'name' => 'Juan Perez',
            'type' => 'estudiante'
        ]);

    }
}