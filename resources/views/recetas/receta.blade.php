@extends('layouts.app')

@include('nevera')

@section('content')
              
<div class="col-sm-9">
	<h1>{{ $receta->nombre }}</h1>
    <h2>Ingredientes</h2>
    <ul>
     @foreach ($receta->listadoIngredientes()->get() as $ingrediente)
                	<li>{{$ingrediente->cantidad}} de {{ $ingrediente->getMedida()->nombre}} x {{ $ingrediente->getIngrediente()->nombre}}</li>
      @endforeach
      </ul>
    <h2>Pasos</h2>
    @foreach ($receta->pasos()->get() as $paso)
                	<li>{{$paso->descripcion}}</li>
      @endforeach
      </ul>
</div>
@endsection
