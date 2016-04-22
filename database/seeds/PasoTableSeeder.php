<?php

use Illuminate\Database\Seeder;
use Nevera\Paso;
use Nevera\Receta;

class PasoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pasos')->truncate();
      $recetas = Receta::all();

      foreach ($recetas as $receta)
      {
        $num_pasos = rand( 1, 8);
        $pasos = factory(Paso::class)->times($num_pasos)->make();
        $old_id = 0;

        if ($num_pasos > 1 )
        {
          foreach ($pasos as $paso)
          {
            $current_id = $receta->id;
            if ($current_id <> $old_id)
            {
              $orden = 1;
              $old_id = $receta->id;
            } else {$orden++;}

            $paso->setOrden($orden);

            $receta->pasos()->save($paso);
          }// endforeach
        }else{ //Caso para un unico paso
          $pasos->setOrden(1);
          $receta->pasos()->save($pasos);
        }
      }
    }
}
