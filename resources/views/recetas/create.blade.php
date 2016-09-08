@extends('layouts.app')

@include('nevera')

@section('content')
              
<div class="col-sm-9">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('nevera.add_receta')</div>
                <div class="panel-body">
                    {!! Form::model($receta, ['action' => 'RecetasController@store']) !!}
                    @if (count($errors) > 0)
<div class="alert alert-danger">
    There were some problems adding the recipe.<br />
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif
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
                          {!! Form::text('fuente', '', ['class' => 'form-control', 'placeholder' => 'http://www.a.com']) !!}
                        </div>

                        <div class="form-group">
                        {!! Form::label('categorias', 'Categorias') !!}
                        {!! Form::select('categorias', $categorias, null, ['class' => 'form-control']) !!}
                        </div>

                        <!--div class="form-group">
                           <input type="hidden" name="ingredientes[]">
                          {!! Form::label('ingrediente', 'Ingredientes') !!}
                          {{ Form::text('ingrediente', '', ['id' =>  'ingrediente', 'placeholder' =>  'Enter name'])}}
                          <button class="btn btn-primary add_ingrediente_button">Add</button>
                          <div class="input_ingredientes_wrap">
                          </div>
                        </div-->

                         <div class="form-group">
                         <input type="hidden" name="cantidades[]">
                         <input type="hidden" name="medidas[]">
                         <input type="hidden" name="ingredientes[]">
                          {!! Form::label('cantidad', 'Cantidad') !!}
                          {{ Form::number('cantidad', '', [ 'id'=> 'cantidad', 'placeholder' =>  '0'])}}
                          {!! Form::label('medida', 'Medida') !!}
                          {{ Form::select('medida', $medidas, [ 'id' => 'medida'])}}
                          {!! Form::label('ingrediente', 'Ingrediente') !!}
                          {{ Form::text('ingrediente', '', [ 'id' =>  'ingrediente', 'placeholder' =>  'Enter name'])}}
                          <button class="btn btn-primary add_ingrediente_button">Add</button>
                          <div class="input_ingredientes_wrap">
                          </div>
                        </div>

                    <div class="form-group">
                     {!! Form::label('pasos', 'Pasos') !!}
                      <div class="input_pasos_wrap">
                        <textarea class="form-control" name="pasos[]" cols="30" rows="5"></textarea>
                      </div>
                      <button class="add_paso_button btn btn-primary" >Añadir un paso mas</button>
                    </div>
                    <button class="btn btn-success" type="submit">Añadir Receta</button>
                    {!! Form::close() !!}         
                </div>
            </div>
        </div>
</div>
@endsection
