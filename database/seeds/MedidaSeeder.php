<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Nevera\Medida;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Medida
        $num_relaciones = 40;
        factory(Medida::class)->times($num_relaciones)->create();
    }
}
