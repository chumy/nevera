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
      $categorias = Categoria::all();
      $usuarios = User::all();

      $recetas = factory(Receta::class)->times(10)->create();

      foreach ($recetas as $receta){

        $categoria = $categorias->random();
        $categoria->recetas()->save($receta);

        $usuario = $usuarios->random();
        $usuario->recetas()->save($receta);
      }

    }
}
