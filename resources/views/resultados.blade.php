@extends('layouts.app')
@include('nevera')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">¿Qué cocino hoy?</div>

            <div class="panel-body">
                <form action="{{ url('resultados') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="text" name="buscador">
                    <input type="submit" class="btn btn-primary" id="buscar" value="Buscar">
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">
        @if (count($ingredientes) > 0 )
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class="panel-heading">
            Ingredientes
        </div>
        <div class="panel-body">
            <ul>
                @foreach ($ingredientes as $ingrediente)
                    <li>{{ $ingrediente->nombre }} <a role="button" class="glyphicon glyphicon-plus-sign" href="#" onclick="anadeIngrediente({{ $ingrediente->id }},'{{ $ingrediente->nombre }}' );" id="add_ingrediente_{{ $ingrediente->id }}" name="{{ $ingrediente->nombre }}"></a></li>
                @endforeach
            </ul>
        </div>
     @else
                <div class="panel-heading">No hay ingredientes disponibles.</div>
    @endif
    </div>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">
            @if (count($recetas) > 0)
                <div class="panel-heading">Recetas</div>
                <ul>
                    @foreach ($recetas as $receta)
                        <li>{{ $receta->nombre }}</li>
                    @endforeach

                </ul>
                @else
                <div class="panel-heading">No hay recetas disponibles</div>
                @endif
        </div>
    </div>

@endsection
