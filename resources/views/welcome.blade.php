@extends('layouts.app')

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

@endsection
