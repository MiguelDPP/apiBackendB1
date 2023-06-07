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
            'type' => 'desayuno',
            'featured' => 'https://www.philadelphia.com.mx/modx/assets/img/revision2016/images/recetas/recetas_2015/sandwich_de_pollo.jpg'
        ]);

        DB::table('food')->insert([
            'name' => 'Arroz Con Pollo',
            'description' => 'Arroz Con Pollo, Papa a la francesa y Jugo de Mora',
            'count' => 20,
            'price' => '10000',
            'type' => 'almuerzo',
            'featured' => 'https://tofuu.getjusto.com/orioneat-prod/Cj2rBNf8YbamwPu22-Arroz%20con%20pollo.jpg'
        ]);

        DB::table('food')->insert([
            'name' => 'Hamburguesa',
            'description' => 'Hamburguesa con Papas a la Francesa',
            'count' => 20,
            'price' => '8000',
            'type' => 'cena',
            'featured' => 'https://cdn2.cocinadelirante.com/sites/default/files/images/2020/08/ideas-de-hamburguesas-caseras-y-papas-fritas.jpg'
        ]);

        DB::table('clients')->insert([
            'identification' => '123456789',
            'name' => 'Juan Perez',
            'type' => 'estudiante'
        ]);

    }
}