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
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">
      
        @if (count($ingredientes) > 0 )
          <form action="/AnadeIngrediente" method="POST" id="listaIngrediente">
            {!! csrf_field() !!}
            <input type="hidden" id="ingrediente" name="ingrediente" value="">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class="panel-heading">
            @lang('nevera.buscador_ingredientes')
        </div>
        <div class="panel-body">
            <ul>
                @foreach ($ingredientes as $ingrediente)
                    <li>{{ $ingrediente->nombre }} 
                    <a class="glyphicon glyphicon-plus-sign" href="{{ route('nevera-add', $ingrediente->slug) }}" id="add_ingrediente_{{ $ingrediente->slug }}" name="{{ $ingrediente->nombre}}"></a>
                    </li>
                @endforeach
            </ul>
        </div>
          </form>
        @else
            <div class="panel-heading">@lang('nevera.resultados_no_ingredientes')</div>
        @endif
    </div>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">
            @if (count($recetas) > 0)
                <div class="panel-heading">@lang('nevera.buscador_recetas')</div>
                <ul>
                    @foreach ($recetas as $receta)
                        <li>{{ $receta->nombre }}</li>
                    @endforeach

                </ul>
                @else
                <div class="panel-heading">@lang('nevera.resultados_no_recetas')</div>
                @endif
        </div>
    </div>

@endsection
