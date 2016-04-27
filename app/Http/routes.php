<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recetas', 'RecetasController@listado');

Route::post('/resultados', 'ResultadosController@getResultados');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/AnadeIngrediente', 'NeveraController@anadirIngrediente');

Route::post('/VaciarNevera', 'NeveraController@vaciarNevera');
Route::post('/actualizarNevera', 'NeveraController@actualizarNevera');

//Route::post('/AnadeIngrediente', 'NeveraController@actualizarNevera');