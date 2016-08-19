
@section('nevera')
<div class="col-sm-3 sidenav">
    <div class="panel panel-info">
        <div class="panel-heading">@lang('nevera.nevera_head')</div>
        <div class="panel-body">
        @if (Session::has('nevera') && count(Session::get('nevera'))>0)

                @foreach(Session::get('nevera') as $ingrediente)
                    <p>{{ $ingrediente->nombre }} 
                    <!--a role="button" class="glyphicon glyphicon-plus-sign" href="#" onclick="eliminaIngrediente({{ $ingrediente->id }},'{{ $ingrediente->nombre }}' );" id="del_ingrediente_{{ $ingrediente->id }}" ></a-->
                    <a class="glyphicon glyphicon-minus-sign" href="{{ route('nevera-del', $ingrediente->slug) }}" id="del_ingrediente_{{ $ingrediente->slug }}" name="del_{{ $ingrediente->slug}}"></a>
                        
                    </p>
            @endforeach
        <p><a class="btn btn-primary" href="{{ route('nevera-empty') }}" name="empty_nevera">
            <span class="glyphicon glyphicon-search"></span> @lang('nevera.nevera_to_empty')</a></p>
        @else
            <p>@lang('nevera.nevera_empty')</p>
        @endif
        </div>
    </div>
</div>
@endsection