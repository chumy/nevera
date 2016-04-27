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
        DB::table('receta_ingredientes')->truncate();
        DB::table('ingredientes')->truncate();
        
        // Test ID 1
        /*factory(Ingrediente::class)->create([
                'nombre' => "Ajo",
            ]);*/

        $num_ingredientes = 40;
        for ($i=1; $i<=$num_ingredientes; $i++)
        {
            factory(Ingrediente::class)->create([
                'nombre' => "Ingrediente $i",
            ]);
        }

        //Relaciones entre recetas e ingredientes
        $num_relaciones = 200;
        $faker = Faker::create();

        //Test Relacion Ingrediente 1 "ajo" con Receta 1 "Pan Campestre"
        DB::table('receta_ingredientes')->insert([
            'cantidad' => $faker->numberBetween(1, 180),
            'medida' => $faker->name,
            'receta_id' => 1,
            'ingrediente_id' => 1,
        ]);


        for ($i=1; $i<$num_relaciones; $i++) {

            DB::table('receta_ingredientes')->insert([
                'cantidad' => $faker->numberBetween(1, 180),
                'medida' => $faker->name,
                'receta_id' => Nevera\Receta::all()->random()->id,
                'ingrediente_id' => Nevera\Ingrediente::all()->random()->id,
            ]);
        }

    }
}
