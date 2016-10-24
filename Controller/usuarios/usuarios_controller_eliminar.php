<?php
    require('../../Model/usuarios/usuarios_model.php');
    
    $id_usuario     =   $_POST["id_usuarioe"];
    $instancia      =   new Modelo_Usuario();
    $eliminaruser   =   $instancia->EliminarUsuario($id_usuario);
?>