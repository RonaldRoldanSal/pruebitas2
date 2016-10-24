
<div class="form-group">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-log-12">
            <h3><span class="glyphicon glyphicon-cog"></span> MANTENIMIENTO DE RUTAS:</h3>
        </div>
    </div>
</div>
				
<!--MODAL REGISTRAR CLIENTES-->
<div class="modal fade bs-example-modal-lg" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"> <!--MODAL REGISTRAR USUARIOS-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--ROW USUARIOS-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-check-square-o" aria-hidden="true"></i> REGISTRAR NUEVA RUTA</div>
                        <div class="panel-body">

                            <!--MENSAJE DE REGISTRO CORRRECTAMENTE-->
                            <div class="alert bg-success" role="alert" style="display:none" id="correcto">
                                <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg>Ruta Registrada <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <!--MENSAJE DE REGISTRO CORRRECTAMENTE-->
                            <form class="" action="" method="POST">
                                <fieldset>	       
                                    <!-- campos ruta -->
                                    <div class="container">
                                        <div class="col-md-8">
                                            <form action="" method="POST">
                                                <div class="col-md-5">
                                                    <label class="">RUTA ORIGEN:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="txtnombre" placeholder="Ingrese Nombre de Empresa">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="">RUTA DESTINO:</label>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="txtnombre" placeholder="Ingrese Nombre">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    <label class="">ESTADO:</label>
                                                    <select class="form-control" id="option">
                                                        <option value="">Seleccione ...</option>
                                                        <option value="">Activo</option>
                                                        <option value="">Inactivo</option>
                                                    </select>
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>   
                                    </div>
                                </fieldset>
                            </form>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                                <button type="button" id="agregar_usuario" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row--> <!--ROW RUTAS-->
        </div>
    </div>
</div>  <!--MODAL REGISTRAR RUTAS-->

<div class="row"> <!--BUSCAR RUTAS-->
    <div class="col-lg-12">
        <div class="panel panel-default">	
            <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i><strong> RUTAS</strong></div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
                <a target="_blank" href="" class="btn btn-danger">Exportar a PDF</a>
                <form class="form-horizontal">
                    <fieldset>
                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name"><i class="fa fa-search" aria-hidden="true"></i> Buscar Rutas:</label>
                            <div class="col-md-4">
                                <input id="buscarrutas" name="name" onkeyup="lista_rutas(this.value,'1');" type="text" placeholder="Ingrese Nombre de Ciudad" class="form-control">
                            </div>
                        </div><br>

                        <div class="cargartodo">
                            <div id="listar_ruta"></div> 
                            <i id="loading_ruta"></i> <!-- el id debe ser igual en el lista_rutas.js -->
                            <div id="paginador_ruta" class="text-center"></div>
                        </div>
                    </fieldset>
		</form>     
            </div>
	</div>
    </div>
</div><!--/.row-->	


<!--MODAL MODIFICAR CLIENTES-->

<!--MODAL ELIMINAR CLIENTES-->
  
                   
<script>
   
</script>

<style type="text/css">
    .grande{
        width: 100%;
    }
</style>


