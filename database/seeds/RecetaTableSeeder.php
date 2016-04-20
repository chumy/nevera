<?php

use Illuminate\Database\Seeder;
use App\Receta;
use App\Categoria;
use App\User;

class RecetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $recetas = factory(Receta::class)->times(10)->make();

        $i = 1;
        foreach ($recetas as $receta){
            $receta->nombre = $receta->nombre ." ".$i;
            $i++;
            $receta->save();
        }

    }
}
