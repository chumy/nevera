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

      $recetas = factory(Receta::class)->times(100)->create();

      foreach ($recetas as $receta){
        $categoria = $categorias->random();
        $categoria->recetas()->save($receta);

        $usuario = $usuarios->random();
        $usuario->recetas()->save($receta);
      }

      /*$recetas = factory(Receta::class)->times(10)->create()->each(function($r){
        $categoria = $categorias->random();
        printf ("categoria = $categoria")
        $r->categoria()->save($categoria);
      });

      foreach ($recetas as $receta){
        printf('dentro');
        $categoria = $categorias->random();
        //$note->category_id = $category_id
        //$categoria->recetas()->save($receta);
        $receta->category_id = $categoria->id;
        printf($receta->id);
        $receta->create();
      }*/
    }
}
