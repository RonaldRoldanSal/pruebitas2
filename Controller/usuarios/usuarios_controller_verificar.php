<?php
    session_start();
    require '../../Model/usuarios/usuarios_model.php';
    if(isset($_POST['txt_usuario']) and isset($_POST['txt_password'])){
        $usuario    =   $_POST["txt_usuario"];
        $password   =   base64_encode($_POST['txt_password']);
         //$password   =   $_POST['txt_password'];

        $M_usuario              =   new Modelo_Usuario();
        $verificar_usuario      =   $M_usuario->VerificarUsuario($usuario,$password);

        var_dump($verificar_usuario);
        
        if (count($verificar_usuario) > 0){
            $_SESSION['usuario']        =   $verificar_usuario['user_nomb'];
            $_SESSION['password']       =   $verificar_usuario['user_pass'];
            $_SESSION['id']             =   $verificar_usuario['user_id'];
            $_SESSION['tipo_usuario']   =   $verificar_usuario['tipuser_desc'];

            header("Location: ../../View/admin.php");
        }
        else {
            //echo "<script>alert();location.href='../../View/index.php';</script>";
        }
    }  
//    else {
//        header('location: ../../index.php');
//    }

?>


