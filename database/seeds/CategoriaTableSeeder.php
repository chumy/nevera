<?php

use Illuminate\Database\Seeder;
use Nevera\Categoria;


class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //DB::table('categorias')->truncate();

      Categoria::create(['nombre' => 'Aperitivos y Entremeses'], ['slug'=>'apertivos-entremeses']);
      Categoria::create(['nombre' => 'Arroces'], ['slug'=>'arroces']);
      Categoria::create(['nombre' => 'Aves'], ['slug'=>'aves']);
      Categoria::create(['nombre' => 'Bebidas'], ['slug'=>'bebidas']);
      Categoria::create(['nombre' => 'Carnes'], ['slug'=>'carnes']);
      Categoria::create(['nombre' => 'Ensaladas'], ['slug'=>'ensaladas']);
      Categoria::create(['nombre' => 'Huevos'], ['slug'=>'huevos']);
      Categoria::create(['nombre' => 'Legumbres',], ['slug'=>'legumbres']);
      Categoria::create(['nombre' => 'Pan y Bollería'], ['slug'=>'pan-bolleria']);
      Categoria::create(['nombre' => 'Pasta'], ['slug'=>'pasta']);
      Categoria::create(['nombre' => 'Patatas'], ['slug'=>'patatas']);
      Categoria::create(['nombre' => 'Pescados'], ['slug'=>'pescados']);
      Categoria::create(['nombre' => 'Postres'], ['slug'=>'postres']);
      Categoria::create(['nombre' => 'Salsas'], ['slug'=>'salsas']);
      Categoria::create(['nombre' => 'Sopas'], ['slug'=>'sopas']);
      Categoria::create(['nombre' => 'Tortillas'], ['slug'=>'tortillas']);
      Categoria::create(['nombre' => 'Verduras'], ['slug'=>'verduras']);
    }
}
