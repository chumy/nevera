@extends('layouts.app')
@include('nevera')

@section('content')

        <!--div class="col-md-10 col-md-offset-1"-->
<div class="col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading">¿Qué cocino hoy?</div>

      <div class="panel-body">
        <form action="{{ url('resultados') }}" method="POST" role="form">
          {!! csrf_field() !!}
          <input type="text" name="buscador" value="">
            <button class="btn btn-default" type="submit" name="buscar" id="buscar">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
      </div>
  </div>
</div>

@endsection
