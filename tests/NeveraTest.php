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

    public function setUp()
    {
        parent::setUp();

        Session::start();

        // Enable filters
        //Route::enableFilters();
    }

    public function test_nevera()
    {
        $this->visit('/')
            ->seeInElement('h4','Nevera');
    }
    public function test_nevera_ingredientes_add_link()
    {
        $this->visit('/')
            ->type('Ingrediente 1','buscador')
            ->press('buscar')
            ->see('Ingrediente 1')
            ->seeElement('a', ['id'=> 'add_ingrediente_1' ])
            //->press('#add_ingrediente_1')

            //->click('#add_ingrediente_1')
            //->findByNameOrId('#add_ingrediente_1')->click()
            //->seeInElement('li', 'Ingrediente 1')
        ;
    }

    public function test_nevera_ingredientes_add_ajax()
    {

        $data = array(
            'id' => 2,
            'nombre'    => 'Ingrediente 2'
        );
        //call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
        $this->call('POST','/AnadeIngrediente',[], [], [], array(
                                                                        'HTTP_X-Requested-With' => 'XMLHttpRequest',
                                                                    'CONTENT_TYPE' => 'application/json'),
                     json_encode($data)
                );
        $this->visit('/')
            ->see('Ingrediente 2');

    }


}
