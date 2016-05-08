function anadeIngrediente (id, ingrediente){
    var route = '/AnadeIngrediente'
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
    listado = jQuery.unique(listado);

    var lista_ingredientes = '';

    if (listado != null && listado.length > 0 )
    {

        for(var i = 0; i < listado.length;i++){
            lista_ingredientes += '<li>'+listado[i].nombre+'</li>';
        }

        $('#vaciar_nevera').fadeIn();

    }else{
        $('#vaciar_nevera').fadeOut();
        lista_ingredientes = 'La nevera está vacía';
    }

    $('#nevera_listado').html(lista_ingredientes);


}

function mostrarNevera(){
    var route = '/actualizarNevera';
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
    var route = '/VaciarNevera'
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