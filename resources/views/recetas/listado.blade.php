@extends('layouts.app')
@include('nevera')

@section('content')

<div class="col-sm-9">
    <div class="panel panel-info">
        @if (count($recetas) > 0)
            <div class="panel-heading">@lang('nevera.buscador_recetas')</div>
            	<div class="panel-body">
	                @foreach ($recetas as $receta)
	                    <p>
                        <a  href="{{ route('receta', $receta->slug) }}" name="{{ $receta->slug}}">
                            {{ $receta->nombre }}</a></p>
	                @endforeach
	            </div>
	        </div>
            @else
            <div class="panel-heading">@lang('nevera.resultados_no_recetas')</div>
            @endif
    </div>
</div>
@endsection
