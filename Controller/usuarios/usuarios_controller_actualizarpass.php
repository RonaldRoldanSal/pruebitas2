<?php
    session_start();
    require '../../Model/usuarios/usuarios_model.php';
    
    $id_usuario = $_SESSION['id'];
    $contraseña_nueva = base64_encode($_POST["password_nuevo"]);
    
    $M_usuario = new Modelo_Usuario();
    $actualizar_contraseña = $M_usuario->ActualizarContraseña($id_usuario, $contraseña_nueva);
    echo $_SESSION['id'];
    
    if ($actualizar_contraseña === TRUE){
        return "Datos Actualizados!";
    }
    else {
        return "Error en Actualización!";
    }
?>

