
@section('nevera')
<div class="col-sm-3 sidenav">
    <div class="panel panel-info">
        <div class="panel-heading">@lang('nevera.nevera_head')</div>
        <div class="panel-body">
        @if (Session::has('nevera') && count(Session::get('nevera'))>0)

                @foreach(Session::get('nevera') as $ingrediente)
                    <p>
                    <!--a role="button" class="glyphicon glyphicon-plus-sign" href="#" onclick="eliminaIngrediente({{ $ingrediente->id }},'{{ $ingrediente->nombre }}' );" id="del_ingrediente_{{ $ingrediente->id }}" ></a-->
                    <a class="glyphicon glyphicon-minus-sign" href="{{ route('nevera-del', $ingrediente->slug) }}" id="del_ingrediente_{{ $ingrediente->slug }}" name="del_{{ $ingrediente->slug}}"></a>
                    {{ $ingrediente->nombre }} 
                    <span class="badge">
                        <a href="{{ route('resultados-ingrediente', $ingrediente->slug ) }}" 
                        alt="@lang('nevera.nevera_ingredientes') {{ $ingrediente->nombre}}" 
                        title="@lang('nevera.nevera_ingredientes') {{ $ingrediente->nombre}}">{{ count($ingrediente->listadoRecetas()->get()) }}</a></span> 
                        
                    </p>
            @endforeach
        <p>
            <a class="btn btn-primary" type="button" href="{{ route('nevera-recetas') }}">
  @lang('nevera.nevera_total') <span class="badge">{{Session::get('total_recetas')}}</span>
</a>
        </p>
        <p><span align="rigth">
                <a class="btn btn-danger" href="{{ route('nevera-empty') }}" name="empty_nevera">
                    <span class="glyphicon glyphicon-remove-sign"></span> @lang('nevera.nevera_to_empty')
                </a>
            </span>

        </p>
        @else
            <p>@lang('nevera.nevera_empty')</p>
        @endif
        </div>
    </div>
</div>
@endsection