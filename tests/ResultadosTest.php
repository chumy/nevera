<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Nevera\Receta;

class ResultadosTest extends TestCase
{
    // ------------------------------------
    //      BLOQUE RECETAS
    // ------------------------------------


    public function test_resultados_receta()
    {
    	//Having
    	//Receta::create(['nombre' => 'Receta 1', 'categoria_id'=> 1, 'user_id' => 1]);
    	//Receta::create(['nombre' => 'Receta 2', 'categoria_id'=> 1, 'user_id' => 1]);
    	//When
        $this->visit('/')
        //Then
        ->type('Receta 1','buscador')
        ->press('buscar')
        ->see('Receta 1')
        ->dontSee('Receta 2');
    }
    public function test_resultados_recetas()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Receta','buscador')
            ->press('buscar')
            ->see('Receta 1')
            ->see('Receta 2');
    }

    public function test_resultados_recetas_no_result()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Reca','buscador')
            ->press('buscar')
            ->dontSee('Receta 1')
            ->dontSee('Receta 2')
            ->see('No hay recetas disponibles')
            //->seeInField('buscar','Buscar')
            ;
    }

    public function test_resultados_recetas_resultados()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Receta','buscador')
            ->press('buscar')
            ->see('Receta 1')
            ->dontSee('No hay recetas disponibles')
            //->seeInField('buscar','Buscar')
            ;
    }

    // ------------------------------------
    //      BLOQUE INGREDIENTES
    // ------------------------------------

    public function test_resultados_ingredientes_no_result()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Sal','buscador')
            ->press('buscar')
            ->dontSee('Ingrediente 1')
            ->dontSee('Ingrediente 2')
            ->see('No hay ingredientes disponibles')
            //->seeInField('buscar','Buscar')
            ;
    }

    public function test_resultados_ingrediente()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente 1','buscador')
            ->press('buscar')
            ->see('Ingrediente 1')
            ->dontSee('Ingrediente 2');
    }

    public function test_resultados_ingredientes()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente','buscador')
            ->press('buscar')
            ->see('Ingrediente 1')
            ->see('Ingrediente 2');
    }

    public function test_resultados_ingredientes_resultados()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente 1','buscador')
            ->press('buscar')
            ->see('Ingrediente 1')
            ->dontSee('No hay ingredientes disponibles');
    }

    public function test_resultados_ingredientes_enlaces()
    {
        $this->visit('/')
            ->type('Ingrediente','buscador')
            ->press('buscar')
            ->see('Ingrediente 1')
            ->seeElement('a', [ 'name' => 'add_ingrediente-1' ])
            ->see('Ingrediente 2')
            ->seeElement('a', [ 'name' => 'add_ingrediente-2' ]);
    }

    // ------------------------------------
    //      BLOQUE RELACIONES
    // ------------------------------------

    /*public function test_resultados_resultado_all_results_recetas()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente 1','buscador')
            ->press('Buscar')
            ->see('Ingrediente 1')
            ->see('Receta 1')
            ->dontSee('No hay recetas disponibles')
            ->dontSee('No hay ingredientes disponibles');
    }*/

}
