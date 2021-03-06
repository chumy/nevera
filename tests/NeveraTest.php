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
            ->seeInElement('div','Nevera');
    }
    public function test_nevera_ingredientes_add_link()
    {
        $this->visit('/')
            ->type('Ingrediente 19','buscador')
            ->press('buscar')
            ->see('Ingrediente 19')
            ->seeElement('a', ['id'=> 'add_ingrediente_ingrediente-19' ])
            //->press('#add_ingrediente_1')

            //->click('#add_ingrediente_1')
            //->findByNameOrId('#add_ingrediente_1')->click()
            //->seeInElement('li', 'Ingrediente 1')
        ;
    }


    public function nevera_ingredientes_add_ajax()
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

    public function test_nevera_add_ingrediente_url()
    {

        $ingrediente = 'ingrediente-2';
        $this->visit("/nevera/add/$ingrediente")
            ->see('Ingrediente 2')
            //->seePageIs('/')
            ;
    }

    public function test_nevera_add_ingrediente()
    {

        $this->visit('/')
            ->type('Ingrediente 19','buscador')
            ->press('buscar')
            ->see('Ingrediente 19')
            ->seeElement('a', ['id'=> 'add_ingrediente_ingrediente-19' ])
            ->click('add_ingrediente-19')
            ->visit('/')
            ->see('Ingrediente 19')
            ->see(trans('nevera.nevera_to_empty'))
            ;

    }

    public function test_nevera_del_ingredientes()
    {

       /* $ingrediente = 'ingrediente-2';
        $this->visit("/nevera/del/$ingrediente")
            ->dontSee('Ingrediente 2')
            //->seePageIs('/')
            ;*/
        $ingrediente = 'ingrediente-19';
        $this->visit("/nevera/add/$ingrediente")
            ->see('Ingrediente 19')
            ->seeElement('a', ['id'=> 'del_ingrediente_ingrediente-19' ])
            ->click('del_ingrediente-19')
            ->visit('/')
            ->dontSee('Ingrediente 19')
            ->see(trans('nevera.nevera_empty'))
            ;
    }

    public function test_nevera_to_empty()
    {

        $ingrediente1 = 'ingrediente-1';
        $ingrediente2 = 'ingrediente-2';
        $this->visit("/nevera/add/$ingrediente1")
            ->see('Ingrediente 1')
            ->visit("/nevera/add/$ingrediente2")
            ->see('Ingrediente 2')
            //->visit("/nevera/empty")
            ->click('empty_nevera')
            ->dontSee('Ingrediente 1')
            ->dontSee('Ingrediente 2')
            ->see(trans('nevera.nevera_empty'))
            //->seePageIs('/')
            ;

    }

}
