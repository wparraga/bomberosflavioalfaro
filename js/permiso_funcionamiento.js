$(document).ready(function() {
    load(1);
});

function load(page) {
    var q = $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        url: 'php/ajax/permiso_funcionamiento/buscar_permiso.php?action=ajax&page=' + page + '&q=' + q,
        beforeSend: function(objeto) {
            $('#loader').html('<img src="./views/img/ajax-loader.gif"> Cargando...');
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');

        }
    })
}

$("#guardar_permiso").submit(function(event) {
    $('#guardar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/permiso_funcionamiento/nuevo_permiso.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#resultados_ajax").html(datos);
            $('#guardar_datos').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})


function obtener_datos(id) {
    var perfun_persona = $("#perfun_persona" + id).val();
    var perfun_cedularuc = $("#perfun_cedularuc" + id).val();
    var perfun_actividad = $("#perfun_actividad" + id).val();
    var perfun_ubicacion = $("#perfun_ubicacion" + id).val();
    var perfun_valido = $("#perfun_valido" + id).val();
   
    $("#mod_id").val(id);
    $("#mod_nombres").val(perfun_persona);
    $("#mod_cedularuc").val(perfun_cedularuc);
    $("#mod_actividad").val(perfun_actividad);
    $("#mod_ubicacion").val(perfun_ubicacion);
    $("#mod_valido").val(perfun_valido);
}

$("#editar_permiso").submit(function(event) {
    $('#actualizar_datos2').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/permiso_funcionamiento/editar_permiso.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax2").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#resultados_ajax2").html(datos);
            $('#actualizar_datos2').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})

