<?php
    require('../../Model/usuarios/usuarios_model.php');
    
    $usuario        =   $_POST["user_id2"]; // estos datos deben ser diferente al de la vista
    $tipousuario    =   $_POST["tipuser_id2"];
    $empleado       =   $_POST["empl_id2"];
    $nombre         =   $_POST["user_nomb2"];
    $clave          =   base64_encode($_POST["user_pass2"]);
    $fechalta       =   $_POST["user_fechalta2"];
    $fechbaja       =   $_POST["user_fechbaja2"];
    $estado         =   $_POST["user_estd2"];
    $email          =   $_POST["user_email2"];
    
    $instancia      =   new Modelo_Usuario();
    $inserusuario   =   $instancia->ModificarUsuario($usuario, $tipousuario, $empleado, $nombre, $clave, $fechalta, $fechbaja, $estado, $email);
?>

