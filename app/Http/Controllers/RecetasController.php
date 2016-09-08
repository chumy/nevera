<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Receta;
use Nevera\User;
use Nevera\Categoria;
use Nevera\Medida;
use Nevera\Http\Requests\CreateRecetaFormRequest;
use Auth;

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

  public function listadoUser(User $usuario)
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

  public function create()
  {
    $receta = new Receta;

    $categorias = Categoria::All();
    $categorias = Categoria::lists('nombre','id');

    $medidas = Medida::All();
    $medidas = Medida::lists('nombre','id');
    


    return view('recetas.create', compact('receta','categorias','medidas'));
  }

  public function store(CreateRecetaFormRequest $request)
  {
    $receta = new Receta();
    $receta->nombre = $request->get('nombre');
    $receta->slug = str_slug($request->get('nombre'));
    $receta->descripcion = $request->get('descripcion');
    $receta->duracion = $request->get('duracion');
    $receta->dificultad = $request->get('dificultad');
    $receta->personas = $request->get('personas');
    $receta->fuente = $request->get('fuente');
    $receta->user_id = Auth::id();
    $receta->categoria_id = $request->get('categorias');

    $receta->save();

    return view('recetas.receta', compact('receta'));
    //return \Redirect::route('receta.listado')
    //    ->with('message', 'Your recipe has been created!');
    
  }


  
}
