<?php

namespace Nevera\Http\Controllers;

use Illuminate\Http\Request;

use Nevera\Http\Requests;
use Nevera\Ingrediente;

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
        return redirect()->route('nevera-show');
    }

    public function del(Ingrediente $ingrediente)
    {
        
        $nevera = \Session::get('nevera');
        unset($nevera[$ingrediente->slug]);
        \Session::put('nevera', $nevera);
        
        return view('welcome');
        return redirect()->route('nevera-show');
    }

    public function empty()
    {
        \Session::forget('nevera');
        return view('welcome');
    }
}
