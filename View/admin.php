<?php
    session_start();
    include('../Model/Model_Conexion.php');
    if (isset($_SESSION['usuario'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ETEPSAC | Admin </title>
        <link href="_recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="_recursos/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="_recursos/css/plugins/toastr/toastr.min.css" rel="stylesheet">
        <link href="_recursos/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
        <link href="_recursos/css/animate.css" rel="stylesheet">
        <link href="_recursos/css/style.css" rel="stylesheet"> 
        <script src="_recursos/js/jquery-2.1.1.js"></script>
    </head>
    <input type="text" value="<?php echo $_SESSION['tipo_usuario']  ?>" hidden="true" id="txt_t_usuario">
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> 
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> 
                                        <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['usuario']?></strong> 
                                        </span> 
                                        <span class="text-muted text-xs block"><?php echo $_SESSION['tipo_usuario']?> <b class="caret"></b>
                                        </span> 
                                    </span> 
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="profile.html">Datos Personales</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_cambio_contraseña">Configuración de Cuenta</a></li>
                                    <li><a href="mailbox.html">Mailbox</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../Model/usuarios/usuarios_model_cerrar_sesion.php">Salir</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">EP</div>
                        </li>
                   
                        <li id="opcion_usuarios">
                            <a href="index-2.html"><i class="fa fa-users"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('usuarios/usuarios_mantenimiento.php')"><span class="fa fa-cogs"></span> Mantenimiento</a></li>
                            </ul>
                        </li>
                    
                        <li id="opcion_clientes">
                            <a href="index-2.html"><i class="fa fa-user-plus"></i> <span class="nav-label">Clientes</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('clientes/clientes_mantenimiento.php')"><i class="fa fa-cogs" aria-hidden="true"></i> Mantenimiento</a></li>   
                            </ul> 
                        </li> 
                        
                        <li id="opcion_boletopasaje">
                            <a href="index-2.html"><i class="glyphicon glyphicon-barcode"></i> <span class="nav-label">Boleto Pasaje</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('ponente/ponente_registrar.php')">Emitir Boleto</a></li>
                                <li><a href="javascript: embebido('ponente/ponente_listar.php'">Reprogramación</a></li>
                                <li><a href="javascript: embebido('evento/vista_administrar_eventos.php')">Manifiesto Pasajero</a></li>   
                            </ul> 
                        </li>
                        
                        <li id="opcion_horasalida">
                            <a href="index-2.html"><i class="glyphicon glyphicon-calendar"></i> <span class="nav-label">Horario Salidas</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('auspiciador/vista_auspiciador.php')"><span class="fa fa-cogs"></span> Mantenimiento</a></li>
                                <li><a href="javascript: embebido('rutas/rutas_mantenimiento.php')"><span class="fa fa-cogs"></span> Rutas</a></li>  
                            </ul>
                        </li>
                    
                        <li id="opcion_tarifas">
                            <a href="index-2.html"><i class="glyphicon glyphicon-usd"></i> <span class="nav-label">Tarifa</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('evento/vista_administrar_eventos.php')">Mantenimiento</a></li>  
                            </ul>
                        </li>
                    
                        <li id="encomiendas">
                            <a href="index-2.html"><i class="glyphicon glyphicon-briefcase"></i> <span class="nav-label">Encomienda</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('encomiendas/encomiendas_registrar.php')">Emitir Encomienda</a></li>  
                                <li><a href="javascript: embebido('evento/vista_administrar_eventos.php')">Seguimiento </a></li> 
                                <li><a href="javascript: embebido('evento/vista_administrar_eventos.php')">Manifiesto</a></li> 
                            </ul>
                        </li>
                    
                        <li id="reportes">
                            <a href="index-2.html"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label">Reportes</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript: embebido('evento/vista_administrar_eventos.php')">Listar Reportes</a></li>  
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.4/search_results.html">
                                <div class="form-group">
                                    <input type="text" placeholder="ADMIN - ETEPSAC" class="form-control" name="top-search" id="top-search">
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">SISTEMA DE VENTAS DE PASAJES Y ENCOMIENDAS</span>
                            </li>
                            <li>
                                <a href="../Model/usuarios/usuarios_model_cerrar_sesion.php">
                                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row  border-bottom white-bg dashboard-header" id="contenido_embebido">
                    <div id="div_notificacion"></div>
                </div>
            </div>
        </div>

        <!-- MODAL CAMBIO DE CONTRASEÑA-->
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_cambio_contraseña">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-briefcase"></span> CAMBIAR CONTRASEÑA</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">CONTRASEÑA ACTUAL: <span class="glyphicon glyphicon-option-horizontal"></span></label>
                            <input type="password" class="form-control" id="txt_contraseña_actual}" readonly value="<?php echo $_SESSION['password'];?>">
                            <input type="text" id="txt_id" hidden="true" value="<?php echo $_SESSION['id'];?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CONTRASEÑA NUEVA: <span class="glyphicon glyphicon-option-horizontal"></span></label>
                            <input type="password" class="form-control" id="txt_contraseña_nueva" placeholder="Ingrese ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CONFIRMAR CONTRASEÑA: <span class="glyphicon glyphicon-option-horizontal"></span></label>
                            <input type="password" class="form-control" id="txt_contraseña_nueva_rep" placeholder="Ingrese ...">
                            <div id=""></div>
                        </div>
                    </div>
                    <div id="texto_notificacion_2" style="text-align:center;"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>  Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btn_guardar_contraseña"><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar Cambios</button>
                        </div>
                </div>
            </div>   
        </div> <!-- FIN MODAL CAMBIO DE CONTRASEÑA -->


        <!-- Mainly scripts -->

        <script src="_recursos/js/bootstrap.min.js"></script>
        <script src="_recursos/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="_recursos/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Flot -->
        <script src="_recursos/js/plugins/flot/jquery.flot.js"></script>
        <script src="_recursos/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="_recursos/js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="_recursos/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="_recursos/js/plugins/flot/jquery.flot.pie.js"></script>

        <!-- Peity -->
        <script src="_recursos/js/plugins/peity/jquery.peity.min.js"></script>
        <script src="_recursos/js/demo/peity-demo.js"></script>
        <script src="_recursos/js/inspinia.js"></script>

         <!-- <script src="_recursos/js/plugins/pace/pace.min.js"></script>-->

        <!-- jQuery UI -->
        <script src="_recursos/js/plugins/jquery-ui/jquery-ui.min.js"></script>

        <!-- GITTER -->
        <script src="_recursos/js/plugins/gritter/jquery.gritter.min.js"></script>

        <!-- Sparkline -->
        <script src="_recursos/js/plugins/sparkline/jquery.sparkline.min.js"></script>

        <!-- Sparkline demo data  -->
        <script src="_recursos/js/demo/sparkline-demo.js"></script>

        <!-- ChartJS-->
        <script src="_recursos/js/plugins/chartJs/Chart.min.js"></script>

        <!-- Toastr -->
        <script src="_recursos/js/plugins/toastr/toastr.min.js"></script>

        <script src="_recursos/js/lista_usuarios.js"></script>

        <script src="_recursos/js/lista_clientes.js"></script>

       

        <script>function embebido(url){$("#contenido_embebido").load(url);}</script>

    </body>
</html>


<?php

    }
    else{
        echo '<script> window.location="index.php"; </script>';
    }
?>



