<?php
    session_start();
    include('../Model/Model_Conexion.php');
    if (isset($_SESSION['usuario'])) {
        echo '<script> window.location="admin.php"; </script>';
    }
    else{
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>ETEPSAC | Login</title>

        <link href="_recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="_recursos/css/animate.css" rel="stylesheet">
        <link href="_recursos/css/style.css" rel="stylesheet">
    
        <style>
            .bg-wallpaper{
                background-image: url('_recursos/img/loginn.jpg');
                background-size: 100% 100%;
                background-attachment: fixed;
                transform: scale(0.95);
                -webkit-transform: scale(0.95);
                transition: ease 2.5s;
                -webkit-transition: ease 2.5s;
                -webkit-transition: width 1.5s;
            }
        </style>  
    </head>
    
    <body class="gray-bg bg-wallpaper">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div><img src="_recursos/img/logogo.png" width = 300px height=300px></div>
                <h3 style="color:yellow">FORMULARIO DE ACCESO</h3>   
                <p style="color:#CCCCCC">Acceda al Sistema de Ventas de Pasajes y Encomiendas </p>
                <p style="color:#CCCCCC">Ingrese sus Datos:</p>
                <form action="../Controller/usuarios/usuarios_controller_verificar.php" method="post">
                    <div class="form-group">
                        <input type="text" id="txt_usuario" name="txt_usuario" class="form-control" placeholder="Ingrese Usuario" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" id="txt_password" name="txt_password" class="form-control" placeholder="Ingrese Contraseña" required="">
                    </div>
                    <input type="submit" class="btn btn-primary block full-width m-b" id="btn_login" name="btn_login" value="INGRESAR">
                    <a href="usuarios/usuarios_recuperar.php"><small style="color:#CCCCCC">Olvidó su Contraseña?</small></a> 
                </form>
            </div>
        </div>
        
        <script src="_recursos/js/jquery-1.12.4.min.js"></script>
        <script src="_recursos/js/bootstrap.min.js"></script>     
    </body>
</html>

<?php
    }
?>