<?php

use Illuminate\Database\Seeder;


//use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(RecetaTableSeeder::class);
        $this->call(PasoTableSeeder::class);
        $this->call(IngredientesSeeder::class);
        $this->call(ListadoIngredientesSeeder::class);
        //Model::reguard();
    }
}
