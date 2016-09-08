<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Illuminate\Support\Facades\Input;
use Response;
use Nevera\Ingrediente;

class IngredienteController extends Controller
{
    public function autocomplete()
  	{
    	$term = Input::get('term');
    	$results = array();
    	$ingredientes = Ingrediente::where('slug', 'LIKE', '%'.str_slug($term).'%')
                    ->take(5)
                    ->get();
  
    	foreach ($ingredientes as $ingrediente)
    	{
        	$results[] = [ 'id' => $ingrediente->id, 'value' => $ingrediente->nombre ];
    	}
    	return Response::json($results);
  	}
}
