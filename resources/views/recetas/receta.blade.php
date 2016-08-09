@extends('layouts.app')

@section('content')
                
	<h1>{{ $receta->nombre }}</h1>
    <h2>Ingredientes</h2>
    <ul>
     @foreach ($ingredientes as $ingrediente)
                	<li>{{$ingrediente->cantidad}} de {{ $ingrediente->getMedida()->nombre}} x {{ $ingrediente->getIngrediente()->nombre}}</li>
      @endforeach
      </ul>
    <h2>Pasos</h2>

@endsection
