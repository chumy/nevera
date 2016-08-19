<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Ingrediente;
use Nevera\Receta;
use Nevera\ListadoIngredientes;

use DB;

class NeveraController extends Controller
{
    public function __construct()
    {
        if (!\Session::has('nevera')) \Session::put('nevera',array());
    }

    public function index()
    {
        return view('home');
    }

    public function show()
    {
        return \Session::get('nevera');
    }

    public function add(Ingrediente $ingrediente)
    {
        
        $nevera = \Session::get('nevera');
        $nevera[$ingrediente->slug] = $ingrediente;
        \Session::put('nevera', $nevera);
        $total_recetas= count($this->totalRecetas());
        \Session::put('total_recetas',$total_recetas);
        /*
        if($request->ajax())
        {
            $nevera[] = new Ingrediente($request->all());
            session(['nevera' => $nevera]);
            return response()->json([
                json_encode(session()->get('nevera'))
            ]);
        }
        else
        {
            $ingrediente_id = $request->get('ingrediente');
            $nevera[] = Ingrediente::find($ingrediente_id);
            session(['nevera' => $nevera]);
        }
        //dd($request);
        //return redirect()->back()->withInput();
        //return view('home');
        return redirect('/');
        */
        return view('welcome');
        //return redirect()->route('nevera-show');
    }

    public function del(Ingrediente $ingrediente)
    {
        
        $nevera = \Session::get('nevera');
        unset($nevera[$ingrediente->slug]);
        \Session::put('nevera', $nevera);
        $total_recetas= count($this->totalRecetas());
        \Session::put('total_recetas',$total_recetas);
        return view('welcome');
        //return redirect()->route('nevera-show');
    }

    /*
    * Function empty
    *
    * Eliminamos la sesion
    *
    */
    public function empty()
    {
        \Session::forget('nevera');
        \Session::forget('total_recetas');
        return view('welcome');
    }

    /*
    * Function listadoRecetas
    *
    * Funcion que devuelve el listado recetas que coinciden exactamente con los ingredientes
    * en la nevera
    *
    * @return Array Recetas
    */
    public function totalRecetas()
    {
        $nevera = \Session::get('nevera');
        $lista_ingredientes = [];

        //Lista de ingredientes
        foreach ($nevera as $ingrediente ) {
            $lista_ingredientes[] = $ingrediente->id;
        }
        
        //select id from recetas where id not in ( select distinct(receta_id) from listado_ingredientes where ingrediente_id not in (1,8,11,15) )

        //$lista_ingredientes = [1,8,11,15];
        //listado de recetas que no cumplen con algun ingrediente
        $listado_no_validas = listadoIngredientes::whereNotIn('ingrediente_id',$lista_ingredientes)
                        ->groupBy('receta_id')
                        ->get();
        
        foreach ($listado_no_validas as $listado ) {
            $recetas_no_validas[] = $listado->receta_id;
        }                         
        //dd($recetas_no_validas);

        return Receta::whereNotIn('id',$recetas_no_validas)->get();
       
        //dd($todas_recetas);
        //return view('welcome');
    }

    public function recetas()
    {
        
        $todas_recetas=$this->totalRecetas();
       
        dd($todas_recetas);
        return view('welcome');
    }
}
