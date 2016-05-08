
@section('nevera')
<div class="col-sm-3 sidenav">
    <h4>Nevera</h4>
    <ul id="nevera_listado">

        @if (Session::has('nevera'))

            @foreach(Session::get('nevera') as $producto)
                <li>{{ $producto->nombre }} <a role="button" class="glyphicon glyphicon-plus-sign" href="#" onclick="eliminaIngrediente({{ $producto->id }},'{{ $producto->nombre }}' );" id="del_ingrediente_{{ $producto->id }}" ></a></li>
        @endforeach

        @endif

    </ul>
    <button name="vaciar_nevera" id="vaciar_nevera" onclick="vaciarNevera();">
        <span class="glyphicon glyphicon-search"></span> Vaciar Nevera
    </button>
</div>
@endsection