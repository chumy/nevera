<?php



use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Nevera\Ingrediente;


class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $num_ingredientes = 40;
        for ($i=1; $i<=$num_ingredientes; $i++)
        {
            factory(Ingrediente::class)->create([
                'nombre' => "Ingrediente $i",
                'slug' => "ingrediente-$i",
            ]);
        }

    }
}
