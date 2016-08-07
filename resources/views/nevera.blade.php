
@section('nevera')
<div class="col-sm-3 sidenav">
    <h4>Nevera</h4>
    <ul id="nevera_listado">

        @if (Session::has('nevera'))

            @foreach(Session::get('nevera') as $ingrediente)
                <li>{{ $ingrediente->nombre }} 
                <!--a role="button" class="glyphicon glyphicon-plus-sign" href="#" onclick="eliminaIngrediente({{ $ingrediente->id }},'{{ $ingrediente->nombre }}' );" id="del_ingrediente_{{ $ingrediente->id }}" ></a-->
                <a class="glyphicon glyphicon-minus-sign" href="{{ route('nevera-del', $ingrediente->slug) }}"></a>
                    
                </li>
        @endforeach

        @endif

    </ul>
    <a class="btn btn-primary" href="{{ route('nevera-empty') }}"">
        <span class="glyphicon glyphicon-search"></span> Vaciar Nevera
    </a>
</div>
@endsection