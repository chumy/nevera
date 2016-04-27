<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NeveraTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_nevera()
    {
        $this->visit('/')
            ->seeInElement('h4','Nevera');
    }
    public function test_nevera_ingredientes_add()
    {
        $this->visit('/')
            ->type('Ingrediente 1','buscador')
            ->press('buscar')
            ->see('Ingrediente 1')
            ->click('add_ingrediente_1')
            ->seeInElement('li', 'Ingrediente 1');
    }


}
