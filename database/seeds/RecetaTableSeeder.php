<?php

use Illuminate\Database\Seeder;
use Nevera\Receta;
use Nevera\Categoria;
use Nevera\User;

class RecetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //DB::table('recetas')->truncate();

        /*factory(Receta::class)->create([
            'nombre' => "Pan Campestre",
        ]);*/

      for ($i=1; $i<11; $i++)
      {
        factory(Receta::class)->create([
          'nombre' => "Receta $i",
          'slug' => "receta-$i",
          ]);
      }
    }
}
