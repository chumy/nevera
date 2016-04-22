<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Receta;

class ResultadosController extends Controller
{
    public function getResultados()
    {
        $data = request()->all();
        //dd($data);

      //$recetas = Receta::where('nombre', 'like',$data['buscador'])->get();
        $recetas = Receta::where('nombre', 'like', "%".$data['buscador']."%")->get();
        $ingredientes = null;

      return view('resultados', compact('recetas','ingredientes'));
    }
}
