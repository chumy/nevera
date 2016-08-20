@extends('layouts.app')
@include('nevera')

@section('content')
    <div class="col-sm-9">
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

        <div class="panel panel-info">
      
        @if (count($ingredientes) > 0 )
            <div class="panel-heading">
                @lang('nevera.buscador_ingredientes')
            </div>
          <form action="/AnadeIngrediente" method="POST" id="listaIngrediente">
            {!! csrf_field() !!}
            <input type="hidden" id="ingrediente" name="ingrediente" value="">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

            <div class="panel-body">
                @foreach ($ingredientes as $ingrediente)
                    <p>{{ $ingrediente->nombre }} 
                        <a class="glyphicon glyphicon-plus-sign" href="{{ route('nevera-add', $ingrediente->slug) }}" id="add_ingrediente_{{ $ingrediente->slug }}" name="add_{{ $ingrediente->slug}}"></a>
                    </p>
                @endforeach
            </div>
          </form>
        @else
            <div class="panel-heading">@lang('nevera.resultados_no_ingredientes')</div>
        @endif
        </div>

        <div class="panel panel-info">
            @if (count($recetas) > 0)
                <div class="panel-heading">@lang('nevera.buscador_recetas')</div>
                    @foreach ($recetas as $receta)
                        <p>
                        <a  href="{{ route('receta', $receta->slug) }}" name="{{ $receta->slug}}">
                            {{ $receta->nombre }}</a></p>
                    @endforeach
                @else
                <div class="panel-heading">@lang('nevera.resultados_no_recetas')</div>
                @endif
        </div>
    </div>

@endsection
