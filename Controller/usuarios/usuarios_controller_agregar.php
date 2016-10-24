<?php
    require '../../Model/usuarios/usuarios_model.php';
    
    $tipousuario1   = $_POST["optionuser"];
    $empleado1      = $_POST["empleado_user"];
    $nombre1        = $_POST["nombre_user"];
    $clave1         = base64_encode($_POST["pass_user"]);
    $fechalta1      = $_POST["fechalta_user"];
    $fechbaja1      = $_POST["fechbaja_user"];
    $estado1        = $_POST["optionestado"];
    $email1         = $_POST["email_user"];
    
    $instancia1     = new Modelo_Usuario();
    $inserusuario1  = $instancia1->AgregarNuevoUsuario($tipousuario1, $empleado1, $nombre1, $clave1, $fechalta1, $fechbaja1, $estado1, $email1);
    echo $inserusuario1;
?>
    
    
    
    
    
    
    
    
