<?php



use Illuminate\Database\Seeder;
use Nevera\Ingrediente;
use Nevera\RecetaIngrediente;

class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('receta_ingredientes')->truncate();
        //DB::table('ingredientes')->truncate();
        
        $num_ingredientes = 40;
        for ($i=1; $i<=$num_ingredientes; $i++)
        {
            factory(Ingrediente::class)->create([
                'nombre' => "Ingrediente $i",
            ]);
        }

        factory(RecetaIngrediente::class)->times(60)->create();

    }
}
