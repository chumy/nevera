@extends('layouts.app')

@section('content')
    @if (count($ingredientes) > 0 )
    <p>Ingredientes</p>
    <ul>
        @foreach ($ingredientes as $ingrediente)
            <li>{{ $ingrediente->nombre }}</li>
        @endforeach
    </ul>
        @else
        <p>No hay ingredientes disponibles.</p>
    @endif
    @if (count($recetas) > 0 )
    <p>Recetas</p>
    <ul>
        @foreach ($recetas as $receta)
            <li>{{ $receta->nombre }}</li>
        @endforeach
    </ul>
    @else
        <p>No hay recetas disponibles</p>
    @endif
@endsection
