@extends('layouts.app')

@include('nevera')

@section('content')
              
<div class="col-sm-9">
	<h1>{{ $receta->nombre }}</h1>
  <p>{{ $receta->descripcion }}</p>
  <p><span class="glyphicon glyphicon-time"></span>{{ $receta->duracion }} min</p>
  <p><span class="glyphicon glyphicon-cutlery"></span> {{ $receta->personas }}</p>
  <p><span class="glyphicon glyphicon-fire"></span> {{ $receta->dificultad }}/10</p>
  <p>Dificultad 
  @for ($i = 0; $i < $receta->valoracion; $i++)
    <span class="glyphicon glyphicon-star" style="color:yellow"></span>
  @endfor
  @for ($i = $receta->valoracion; $i < 5; $i++)
    <span class="glyphicon glyphicon-star-empty" style="color:yellow"></span>
  @endfor
  </p>
  <p><span>Fuente </span>{{ $receta->fuente }} </p>
  <p><span>Video </span>video </p>
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
    <p>{{ $receta->Categoria()->get()[0]->nombre }}</p>  

</div>
@endsection
