<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Nevera\Receta;

class ResultadosTest extends TestCase
{

    public function test_receta()
    {
    	//Having
    	//Receta::create(['nombre' => 'Receta 1', 'categoria_id'=> 1, 'user_id' => 1]);
    	//Receta::create(['nombre' => 'Receta 2', 'categoria_id'=> 1, 'user_id' => 1]);
    	//When
        $this->visit('/')
        //Then
        ->type('Receta 1','buscador')
        ->press('Buscar')
        ->see('Receta 1')
        ->dontSee('Receta 2');
    }
    public function test_recetas()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Receta','buscador')
            ->press('Buscar')
            ->see('Receta 1')
            ->see('Receta 2');
    }
    public function test_recetas_no_result()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Reca','buscador')
            ->press('Buscar')
            ->dontSee('Receta 1')
            ->dontSee('Receta 2')
            ->seeInElement('p','No hay recetas disponibles')
            ->seeInField('buscar','Buscar');
    }
    public function test_recetas_resultados()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Receta','buscador')
            ->press('Buscar')
            ->see('Receta 1')
            ->dontSeeInElement('p','No hay recetas disponibles')
            ->seeInField('buscar','Buscar');
    }

    public function test_ingredientes_no_result()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Sal','buscador')
            ->press('Buscar')
            ->dontSee('Ingrediente 1')
            ->dontSee('Ingrediente 2')
            ->seeInElement('p','No hay ingredientes disponibles')
            ->seeInField('buscar','Buscar');
    }

    public function test_ingrediente()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente 1','buscador')
            ->press('Buscar')
            ->see('Ingrediente 1')
            ->dontSee('Ingrediente 2');
    }

    public function test_ingredientes()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente ','buscador')
            ->press('Buscar')
            ->see('Ingrediente 1')
            ->see('Ingrediente 2');
    }

    public function test_ingredientes_resultados()
    {
        //When
        $this->visit('/')
            //Then
            ->type('Ingrediente 1','buscador')
            ->press('Buscar')
            ->see('Ingrediente 1')
            ->dontSeeInElement('p','No hay ingredientes disponibles');
    }

}
