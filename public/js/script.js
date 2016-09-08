function anadeIngrediente (id, ingrediente){
    $("#ingrediente").val(id);
    $("#listaIngrediente").submit();
    
};

function anadeIngrediente_ajax (id, ingrediente){
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

// Autocompletado de ingredientes

$(function()
{
     $( "#ingrediente" ).autocomplete({
      source: autoCompleteIngrediente,
      minLength: 3,
      select: function(event, ui) {
        $('#ingrediente').val(ui.item.value);
      }
    });
});


// Acordeon
 $( function() {
    $( "#accordion" ).accordion();
  } );
  
// Pasos dinamicos 

function habilitaPaso(idGrupo, total){

    /*for (i = 1 ; i<= total; i++)
    {
        $('#grupo_paso_'+i).hide();
    }*/
    $('#grupo_paso_'+idGrupo).show();
    window.location.hash = '#grupo_paso_'+idGrupo;
}

// Dinamic Field Generator para Pasos
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_pasos_wrap"); //Fields wrapper
    var add_button      = $(".add_paso_button"); //Add button ID

    var textarea        = '<textarea class="form-control" name="pasos[]" cols="30" rows="5"></textarea>';
    var delButon        = '<a href="#" class="remove_paso">Remove</a>';
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div>'+ textarea + delButon+'</div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_paso", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});  

// Ingredientes selection

$(document).ready(function() {
    var wrapper         = $(".input_ingredientes_wrap"); //Fields wrapper
    var add_button      = $(".add_ingrediente_button"); //Add button ID

    

   // var ingredientes = $('input[name="pages_title[]"]').each(function() { var aValue = $(this).val(); });
    var delButon        = '<a href="#" class="remove_ingrediente">Remove</a>';
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        var cantidad        = $('#cantidad').val();
        var medida          = $('#medida').val();
        var ingrediente     = $('#ingrediente').val();
        var cantidades      = [];
        var medidas         = [];
        var ingredientes    = [];

        $('input[name="cantidades[]"]').each(function() { cantidades.push($(this).val()); });
        $('input[name="medidas[]"]').each(function() { medidas.push($(this).val()); });
        $('input[name="ingredientes[]"]').each(function() { ingredientes.push($(this).val()); });
        cantidades.push(cantidad);
        medidas.push(medida);
        ingredientes.push(ingrediente);
        medida_nombre = $("#medida option[value='"+ medida +"']").text()

        $(wrapper).append('<div>'+ cantidad + ' ' + medida_nombre + ' de ' + ingrediente + delButon+'</div>'); //add input box
    });
    
    $(wrapper).on("click",".remove_ingrediente", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    })
});  