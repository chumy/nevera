<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Receta;

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
    return view('recetas/recetas', compact('recetas'));
  }
}
