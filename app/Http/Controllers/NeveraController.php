<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Ingrediente;

class NeveraController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function anadirIngrediente(Request $request)
    {
        $nevera = null;
          if($request->ajax()){
              if ($request->session()->has('nevera')) {
                  $nevera = $request->session()->pull('nevera');
                  $nevera[] = new Ingrediente($request->all());
                  session(['nevera' => $nevera]);
              }
              else{
                  $nevera[] = new Ingrediente($request->all());
                  session(['nevera' => $nevera]);
              }

            return response()->json([
                json_encode(session()->get('nevera'))
            ]);
        }
    }

    public function actualizarNevera(Request $request)
    {
        if ($request->session()->has('nevera')) {
            return response()->json([
                json_encode(session()->get('nevera'))
            ]);
        }
    }

    public function vaciarNevera()
    {
        session()->forget('nevera');
        return response()->json([
            json_encode(session()->get('nevera'))
        ]);
    }


}
