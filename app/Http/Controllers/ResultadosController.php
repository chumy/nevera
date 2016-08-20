<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Ingrediente;
use Nevera\Receta;
use Nevera\ListadoIngredientes;


class ResultadosController extends Controller
{
    public function getResultados()
    {
        $data = request()->all();


      //$recetas = Receta::where('nombre', 'like',$data['buscador'])->get();
        $recetas = Receta::where('nombre', 'like', "%".$data['buscador']."%")->get();
        $ingredientes = Ingrediente::where('nombre', 'like', "%".$data['buscador']."%")->get();

        /*$recetas_x_ingrediente = null;
        foreach ($ingredientes as $ingrediente){
            foreach ($ingrediente->recetas as $lista_recetas)
            {
                $recetas_x_ingrediente[] = $lista_recetas;
            }
        }*/

      return view('resultados', compact('recetas','ingredientes'));
    }

    /*
    * Function getRecetasIngrediente
    *
    * Calcula las recetas que tienen el ingediente pasado por parametro
    *
    * @param Ingrediente
    * @return vista con Array Recetas
    */
    public function getRecetasIngrediente(Ingrediente $ingrediente)
    {

        $recetas = Receta::join('listado_ingredientes', 'recetas.id','=','listado_ingredientes.receta_id')
                    ->where('listado_ingredientes.ingrediente_id', '=', $ingrediente->id)
                    ->get();

        return view('recetas.listado', compact('recetas'));
    }
}
