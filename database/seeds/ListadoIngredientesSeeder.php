<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Nevera\ListadoIngredientes;

class ListadoIngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Relaciones entre recetas e ingredientes
        $num_relaciones = 200;


        for ($i=1; $i<$num_relaciones; $i++) {

            factory(ListadoIngredientes::class)->create();
        }

    }
}
