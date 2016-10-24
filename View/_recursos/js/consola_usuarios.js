$(document).on("ready",consola_usuarios);

function ConsolaUsuarios(){
    $("#btn_guardar_contraseña").click(function(){
        var contraseña_nueva = $("#txt_contraseña_nueva").val();
        var contraseña_nueva_rep = $("#txt_contraseña_nueva_rep").val();
        var id_usuario = $("#txt_id").val();
        
        if(contraseña_nueva.length==0 || contraseña_nueva_rep.length==0){
            $("#texto_notificacion_2").html("<span class='label label-primary'>Hay campos vacios</span>");
        }
        else {
            $("#texto_notificacion_2").empty();
            if (contraseña_nueva==contraseña_nueva_rep) {
                $("#texto_notificacion_1").empty();
                ActualizarContraseña(contraseña_nueva);
            }
            else {
                $("#texto_notificacion_1").html("<span class='label label-warning'>Las Contraseñas No Coinciden</span>");
            }
        }
    });
}

function ActualizarContraseña(contra_nueva){
    $.ajax({
        url:"../Controller/usuarios/usuarios_controller_actualizarpass.php",
        type:"POST",
        data:{
            password_nuevo:contra_nueva
        },
        success:function(respuesta){
            console.log(respuesta);
            $("#modal_cambio_contraseña").modal("hide");
            if (respuesta="exito"){
                $("#div_notificacion").addClass("alert alert-success");
                $("div_notificacion").html("<p>Error al actualizar contraseña</p>");
            }
        } 
    });
}
