<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Receta;
use Nevera\User;

class RecetasController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function listado()
  {
    $recetas = Receta::all();
    return view('recetas/listado', compact('recetas'));
  }

  public function list(User $usuario)
  {
    $recetas = $usuario->recetas()->get();

    return view('recetas/listado', compact('recetas'));
  }

   public function show(Receta $receta)
  {
    $ingredientes = $receta->listadoIngredientes()->get();
    //dd($ingredientes[0]->getIngrediente());
    return view('recetas/receta', compact('receta','ingredientes'));
  }

}
