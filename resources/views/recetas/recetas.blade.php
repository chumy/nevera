@extends('layouts.app')

@section('content')
                <ul>
                @foreach ($recetas as $receta)
                	<li>{{ $receta->nombre }}</li>
                @endforeach
                </ul>
@endsection
