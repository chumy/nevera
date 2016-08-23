@extends('layouts.app')

@include('nevera')

@section('content')
              
<div class="col-sm-9">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('nevera.add_receta')</div>
                <div class="panel-body">
                    {!! Form::model($receta, ['action' => 'RecetasController@store']) !!}
                        <div class="form-group">
                          {!! Form::label('nombre', 'Nombre') !!}
                          {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('descripcion', 'Descripcion') !!}
                          {!! Form::textarea('descripcion', null, ['size' => '30x5','class' => 'form-control'])  !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('duracion', 'Duracion') !!}
                          {!! Form::number('duracion', '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('dificultad', 'Dificultad') !!}
                          {!! Form::selectRange('dificultad', 1, 5, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('personas', 'Personas') !!}
                          {!! Form::number('personas', '', ['class' => 'form-control']) !!}
                        </div>
                       
                        <div class="form-group">
                          {!! Form::label('fuente', 'Fuente') !!}
                          {!! Form::text('fuente', 'http://', ['class' => 'form-control']) !!}
                        </div>

                        <button class="btn btn-success" type="submit">Añadir Receta</button>
                    {!! Form::close() !!}         
                </div>
            </div>
        </div>
</div>
@endsection
