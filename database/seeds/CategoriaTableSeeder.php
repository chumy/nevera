<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Receta;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Categoria::create(['nombre' => 'Aperitivos y Entremeses']);
      Categoria::create(['nombre' => 'Arroces']);
      Categoria::create(['nombre' => 'Aves']);
      Categoria::create(['nombre' => 'Bebidas']);
      Categoria::create(['nombre' => 'Carnes']);
      Categoria::create(['nombre' => 'Ensaladas']);
      Categoria::create(['nombre' => 'Huevos']);
      Categoria::create(['nombre' => 'Legumbres']);
      Categoria::create(['nombre' => 'Pan y Bollería']);
      Categoria::create(['nombre' => 'Pasta']);
      Categoria::create(['nombre' => 'Patatas']);
      Categoria::create(['nombre' => 'Pescados']);
      Categoria::create(['nombre' => 'Postres']);
      Categoria::create(['nombre' => 'Salsas']);
      Categoria::create(['nombre' => 'Sopas']);
      Categoria::create(['nombre' => 'Tortillas']);
      Categoria::create(['nombre' => 'Verduras']);
    }
}
