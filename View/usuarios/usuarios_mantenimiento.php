<?php
 
?>

<div class="form-group">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-log-12"><h3><span class="glyphicon glyphicon-cog"></span> MANTENIMIENTO DE USUARIOS:</h3></div>
    </div>
</div>
				
<!-- MODAL REGISTRAR - AGREGAR NUEVO USUARIO -->
<div class="modal fade bs-example-modal-lg" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!--ROW USUARIOS-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-user fa-2x" aria-hidden="true"></i> REGISTRAR NUEVO USUARIO</div>
                        <div class="panel-body">

                            <!--MENSAJE DE REGISTRO CORRRECTAMENTE-->
                            <div class="alert bg-success" role="alert" style="display:none" id="correcto">
                                <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg>Usuario Registrado <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <!-- con el action lo querias hacer ? si pes, pero normal lo cambiamos xD  -->
                            <form class="form-horizontal" id="form_user_reg"   action="../../Controller/usuarios/usuarios_controller_agregar.php"  method="POST" >
                                <fieldset>
                                    <!-- tipo de usuario input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="">TIPO USUARIO:</label>
                                        <div class="col-md-4">
                                            
                                            
                                           <?php
                                           #por mientras asi numas OK OK
                                           #TIENES EL SCRIPT DEL REGISTRAR USUARIOS ? el js
                                           # ene este proyecto no, pero en el decl ciclo pasado si, espera...
                                           
                                           mysql_connect("localhost","root","");
                                           mysql_select_db("bdproyectotransporte");
                                           $consulta = "select * from  tipuser";
                                           $resultado = mysql_query($consulta);
                                           echo "<select class='form-control' id='optionuser' name='optionuser' >";
                                           while($fila = mysql_fetch_array($resultado)){
                                               
                                               echo "<option value=' ".$fila['tipuser_id']."'>".$fila['tipuser_desc']."</option>";
                                               
                                           }
                                           echo " </select> ";
                                           
                                           #correlo aversh 
                                           
                                           
                                           ?>
                                             
                                            
                                                <!--
                                                <option value="1">Administrador</option>
                                                <option value="2">Responsable Ventas</option>
                                             -->
                                        </div>
                                    </div>
                                    
                                    <!-- codigo empleado - usuario input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="">ID EMPLEADO:</label>
                                        <div class="col-lg-4">
                                           
                                            <input id="empleado_id" name="empleado_id" type="hidden" class="">
                                            <div class="input-group">
                                                 <input id="empleado_user" name="empleado_user" type="text" placeholder="Buscar Empleado" class="form-control">
                                                 <div class="input-group-btn">
                                                     <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalbuscar"><span class="glyphicon glyphicon-search"></span>
                                                       </button>
                                                 </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <!-- nombre usuario input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="">NOMBRE USUARIO:</label>
                                        <div class="col-md-4">
                                            <input id="nombre_user" name="nombre_user" type="text" placeholder="Ingrese Nombre de Usuario" class="form-control">
                                        </div>
                                    </div>

                                    <!-- contraseña input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">CONTRASEÑA:</label>
                                        <div class="col-md-4">
                                            <input id="pass_user" name="pass_user" type="text" placeholder="Ingrese Contraseña" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- fecha alta input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">FECHA DE ALTA:</label>
                                        <div class="col-md-4">
                                            <input id="fechalta_user" name="fechalta_user" type="text" placeholder="Ingrese Contraseña" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- fecha baja input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">FECHA DE BAJA:</label>
                                        <div class="col-md-4">
                                            <input id="fechbaja_user" name="fechbaja_user" type="text" placeholder="Ingrese Contraseña" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <!-- estado input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="">ESTADO:</label>
                                        <div class="col-md-4">
                                            <select class="form-control" id="optionestado" name="optionestado">
                                                <option value="">Seleccione...</option>
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>   
                                        </div>
                                    </div>	

                                    <!-- email input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">E-MAIL:</label>
                                        <div class="col-md-4">
                                            <input id="email_user" name="email_user" type="text" placeholder="Ingrese E-Mail"  class="form-control">
                                        </div>
                                    </div> 		     
                                </fieldset>
                            </form>
                            
                            <!-- Footer -->  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                                <button type="button" id="agregar_usuario"  onclick="registrar_usuario()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- FIN ROW USUARIOS-->
        </div>
    </div>
</div>  <!-- FIN MODAL REGISTRAR USUARIOS-->

<!-- MODAL BUSCAR EMPLEADO-->
<div class="modal fade bs-example-modal-lg" id="modalbuscar" tabindex="-1" style="display: none;" role="dialog" aria-labelledby="myLargeModalLabel"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!--ROW EMPLEADOS-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-user fa-2x" aria-hidden="true"></i> BUSCAR EMPLEADO</div>
                        <div class="panel-body">
           
                        
                        <a target="_blank" href="" class="btn btn-danger">Exportar a PDF</a>
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name"><i class="fa fa-search" aria-hidden="true"></i> Buscar Empleados:</label>
                                    <div class="col-md-4">
                                        <input id="buscarempleados" name="q" onkeyup="lista_empleados(this.value,'1');" type="text" placeholder="Ingrese Nombre" class="form-control">
                                    </div>
                                </div><br>
                                <div class="cargartodo">
                                    <div id="lista_empleado"></div> 
                                    <i id="loading_empleado"></i> <!-- el id debe ser igual en el listar_usuario.js -->
                                    <div id="paginador_empleado" class="text-center"></div>
                                </div>
                            </fieldset>
                        </form> 
                        </div>
                            <!-- Footer -->  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- FIN ROW USUARIOS-->
        </div>
    </div>
</div>  <!-- FIN MODAL REGISTRAR USUARIOS-->

<!-- MODAL BUSCAR USUARIO -->
<div class="row"> 
    <div class="col-lg-12">
        <div class="panel panel-default">	
            <div class="panel-heading"><i class="fa fa-users fa-2x" aria-hidden="true"></i><strong> USUARIOS</strong></div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalagregar"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
                <a target="_blank" href="../_reportes/usuarios/usuarios_reportes_listar.php" class="btn btn-danger">Exportar a PDF</a>
                <form class="form-horizontal">
                    <fieldset>
                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name"><i class="fa fa-search" aria-hidden="true"></i> Buscar Usuarios:</label>
                            <div class="col-md-4">
                                <input id="buscarusuarios" name="name" onkeyup="lista_usuarios(this.value,'1');" type="text" placeholder="Ingrese Nombre o Email" class="form-control">
                            </div>
                        </div><br>
                        <div class="cargartodo">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>TIPO USUARIO</th>
                                    <th>USUARIO</th>
                                    <th>CONTRASEÑA</th>
                                    <th>EMAIL</th>
                                    <th>FECHA DE ALTA</th>
                                    <th>ESTADO</th>
                                    <th>OPERACIÓN</th>
                                    </tr>
                                </thead>
                                <tbody id="lista">
                                    
                                </tbody>
                            </table>
                            <i id="loading_usuario"></i> <!-- el id debe ser igual en el listar_usuario.js -->
                            <div id="paginador" class="text-center"></div>
                        </div>
                    </fieldset>
                </form>     
            </div>
        </div>
    </div>
</div><!-- FIN MODAL BUSCAR USUARIO-->	

<!-- MODAL MODIFICAR USUARIOS-->
<div class="modal fade grande" id="myModal_modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><span class="fa fa-cogs"></span> MODIFICAR USUARIOS</h4>
            </div><br>

            <!--OTRO FORMULARIO-->
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">ID:</label> 
                        <div class="col-md-5">
                            <input id="id_user2" name="" type="text" class="form-control" disabled>
                            <input id="id_tipouser2" name="" type="text" class="form-control oculto " disabled>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">TIPO USUARIO:</label> 
                        <div class="col-md-5">
                            <input id="id_nomtipo" name="" type="text" class="form-control " disabled>
                        </div>
                    </div>
                    <!--
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">ID EMPLEADO:</label> 
                        <div class="col-md-5">
                            <input id="id_empleado" name="" type="text" class="form-control " disabled>
                        </div>
                    </div> -->
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">NOMBRE USUARIO:</label> 
                        <div class="col-md-5">
                            <input id="nombre2" name="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">CONTRASEÑA:</label> 
                        <div class="col-md-5">
                            <input id="clave2" name="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">FECHA DE ALTA:</label> 
                        <div class="col-md-5">
                            <input id="fechalta2" name="" type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">FECHA DE BAJA:</label> 
                        <div class="col-md-5">
                            <input id="fechbaja2" name="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">Estado:</label> 
                        <div class="col-md-5">
                            <input id="estado2" name="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label" for="">Email:</label> 
                        <div class="col-md-5">
                            <input id="email2" name="" type="text" class="form-control">
                        </div>
                    </div>   
                </fieldset>
            </form> <!--FIN DE FORMULARIO  data-dismiss="modal"-->
            <br>
            <div class="text-center">
                <button type="button" name="modificar" id="ModificarUsuario" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Modificar</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cerrar</button>
            </div>
	</div>
    </div>
</div> <!-- FIN MODAL MODIFICAR USUARIO-->

<!--MODAL ELIMINAR USUARIOS-->
 <div class="modal fade" id="myModal_eliminar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
                <p>Estas seguro de eliminar?</p>
                <input type="text" id="id_usuarioe" class="oculto">
                <p id="nombreuser"></p>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" id="eliminarusuario" data-dismiss="modal" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- FIN MODAL ELIMINAR USUARIOS -->


<script src="_recursos/js/usuario_reg.js"></script>

<script src="_recursos/js/lista_empleados.js"></script>
<script>
    
    $(document).ready(function(){
       lista_usuarios('','1');
       lista_empleados('','1');
      
      
       $(".oculto").hide();
    });
    
</script> 
 

<style type="text/css">
    .grande{
        width: 100%;
    }
</style>



