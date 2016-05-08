<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_titulo()
    {
        $this->visit('/')
        ->see('Nada en la nevera');
    }
    public function test_buscador()
    {
        $this->visit('/')
        ->see('Nada en la nevera')
        ->seeElement('button',[ 'id'=>'buscar']);
        //->seeInField('buscar','Buscar');

    }
    public function test_comentario()
    {
        $this->visit('/')
        ->see('¿Qué cocino hoy?');

        /*->dontSee('End of the note')
        ->seeLink('View note')
        ->click('View note')
        ->see($text);*/
    }
}
