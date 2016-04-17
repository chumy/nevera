<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Receta;

class RecetasTest extends TestCase
{

    public function test_recetas_lista()
    {
    	//Having

    	Receta::create(['nombre' => 'Receta 1', 'categoria_id'=> 1, 'user_id' => 1]);
    	Receta::create(['nombre' => 'Receta 2', 'categoria_id'=> 1, 'user_id' => 1]);

    	//When
        $this->visit('recetas')
        //Then
        	->see('Receta 1')
        	->see('Receta 2');
    }
}
