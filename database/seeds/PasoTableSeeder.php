<?php

use Illuminate\Database\Seeder;
use App\Paso;
use App\Receta;

class PasoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $recetas = Receta::all();

      foreach ($recetas as $receta)
      {
        $num_pasos = rand( 1, 8);
        $pasos = factory(Paso::class)->times($num_pasos)->make();
        $old_id = 0;
        foreach ($pasos as $paso)
        {
          $current_id = $receta->id;
          if ($current_id <> $old_id)
          {
            $orden = 1;
            $old_id = $receta->id;
          } else {$orden++;}

          $receta->pasos()->save($paso);
          $paso->setOrden($orden);
          $paso->save();
          
        }
      }
    }
}
