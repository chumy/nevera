<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Ingrediente;
use Nevera\Receta;
use Nevera\RecetaIngrediente;

class ResultadosController extends Controller
{
    public function getResultados()
    {
        $data = request()->all();
        //dd($data);

      //$recetas = Receta::where('nombre', 'like',$data['buscador'])->get();
        $recetas = Receta::where('nombre', 'like', "%".$data['buscador']."%")->get();
        $ingredientes = Ingrediente::where('nombre', 'like', "%".$data['buscador']."%")->get();
        
        $lista_recetas_x_ingrediente = null;
        foreach ($ingredientes as $ingrediente){
            foreach ($ingrediente->recetas as $lista_recetas)
            {
                $lista_recetas_x_ingrediente[] = $lista_recetas;
            }
        }

      return view('resultados', compact('recetas','ingredientes','recetas_x_ingredientes'));
    }
}
