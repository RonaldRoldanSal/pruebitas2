<?php

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" type="text/css" href="../_recursos/css/bootstrap.min.css">
<!-- 
        <style type="text/css">
            @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
            @import url("https://fonts.googleapis.com/css?family=Roboto:400,300,500,700");
            body {
                font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
                /*background-color:#546A79; */
                background: url("../_recursos/img/wallpaper.jpg");
                font-size: 13px;
                /*color: #676a6c; */
                /*overflow-x: hidden; */
                background-size: 100% 100%;
                background-attachment: fixed;
                padding-top: 100px;

                
            }
            #container{
                -webkit-border-radius: 10px;
                -webkit-box-shadow: 0 0 20px rgba(0,0,0,0.5);
                -moz-border-radius: 10px;
                -moz-box-shadow: 0 0 20px rgba(0,0,0,0.5);
                -o-border-radius: 10px;
                -o-box-shadow: 0 0 20px rgba(0,0,0,0.5);
                background: #CCCCFF;     
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0,0,0,0.5);
                font-family: 'Comfortaa', sans-serif;
                font size: 18px;
                margin: 0 auto;
                padding: 30px;
                width: 600px;

                position: fixed;
                top:30%;
                left:35%;
            }
        </style>
    </head>
    <body>
        <div class="container" id="container">
            <div class="row">
                <div class="form-group"><h2 align="center"><span class="glyphicon glyphicon-education"></span> UNIVERSIDAD SAN PEDRO</h2><hr></div>
                <div>
                    <form method="post" action="../../controller/usuarios/Controller_usuario_RecuperarPassword.php"> 
                        <h5 style="color:#336699"><span class="glyphicon glyphicon-list-alt"></span> Recuperación de Contraseña</h5>
                        <div class="form-group">
                            <label for="nombre"> Email: <span class="glyphicon glyphicon-envelope"></span></label>
                            <input class="form-control" name="txt_email" type="email" required="" placeholder="Ingrese Correo Electrónico" maxlength="60" size="60">
                        </div>
                        <div align="center" class="form-group">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>  Enviar Datos</button>
                        </div>
                        <div class="form-group" align="center">
                            <a href="../login.php">Volver a Inicio</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div> 
    </body>
</html> -->

 </head>
    <body>
        <div class="container" id="container">
            <div class="row">
                <h2 align="center"><span class="glyphicon glyphicon-education"></span> ETEPSAC</h2><hr>
                <div class="panel panel-default">
                    <div class="panel panel-header">
                        <div class="page-header" style="text-align:center;">
                          <h1 ><small>Recuperación de Contraseña <br> <span class="glyphicon glyphicon-random"></span></small></h1>
                        </div>
                        
                    </div>
                    <div class="panel panel-body" style="text-align:center;">
                        <h3><span class="label label-warning">Ingrese su Email</span></h3>
                        <form method="post" class="form-inline" action="../../Controller/usuarios/usuarios_controller_recuperarpass.php"> 
                            <div class="form-group row">
                                <input class="form-control" name="txt_email" type="email" required="" placeholder="Ingrese Correo Electrónico" maxlength="60" size="60">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Recuperar contraseña</button>
                            </div>
                            
                        </form>
                        <div class="form-group" align="center">
                                <a href="../index.php">Volver a Inicio</a>
                            </div>
                    </div>
                </div>
                <div>
                    
                </div> 
            </div>
        </div> 
    </body>
</html>




