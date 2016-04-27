function anadeIngrediente (id, ingrediente){
    var route = 'http://localhost:8000/AnadeIngrediente'
    var token = $("#token").val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN':token},
        type: 'POST',
        dataType: 'json',
        data: {id: id,
                nombre: ingrediente},
        success: function(response) {
            actualizaNevera(response)
        }
    })
};

function actualizaNevera(listadoJson){
    var listado = JSON.parse(listadoJson);

    var lista_ingredientes = '';

    for(var i = 0; i < listado.length;i++){
        lista_ingredientes += '<li>'+listado[i].nombre+'</li>';
    }
    $('#nevera_listado').html(lista_ingredientes);

}

function mostrarNevera(){
    var route = 'http://localhost:8000/actualizarNevera';
    var token = $('[name="_token"]').val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN':token},
        type: 'POST',
        dataType: 'json',

        success: function(response) {
            actualizaNevera(response)
        }
    })
};


function vaciarNevera () {
    var route = 'http://localhost:8000/VaciarNevera'
    var token = $('[name="_token"]').val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',

        success: function (response) {
            actualizaNevera(response)
        }
    })
};