<div class="container">
    <div class="col-md-10">
        <h2><span class="glyphicon glyphicon-education"></span> Registro de Encomiendas:</h2><hr>
    </div>
    <div class="col-md-10">
        <form action="" method="POST">
            <div class="col-md-6">
                <label class="">Tipo Documento:</label>
                <div class="form-group">
                    <div class=""><span class=""></span></div>
                    <select id="tipo_doc" name="tipo_doc" class="form-control" onchange="seleccionar_opcion()">
                        <option value="0">Seleccione Tipo Documento ...</option>
                        <option value="1">DNI</option>
                        <option value="2">Carnet de Extranjería</option>
                        <option value="3">Pasaporte</option>
                        <option value="4">Otros</option>
                        </select> 
                    </div> 
                <div class="form-group">
                    <div class=""><span class=""></span></div>
                    <input class="form-control" type="text" id="valor_doc" name="valor_doc">
                </div>
            </div>
        
            <div class="col-md-6">
                <label class="">Nombre:</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtnombre" placeholder="Ingrese Nombre">
                </div>
            </div>
        
            <div class="col-md-6">
                <label class="">Apellido Paterno:</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtapepat" placeholder="Ingrese Apellido Paterno">
                </div>
            </div>
        
            <div class="col-md-6">
                <label class="">Apellido Materno:</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtapemat" placeholder="Ingrese Apellido Materno">
                </div>
            </div>
        
            <div class="col-md-6">
                <label class="">Dirección:</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtdirecccion" placeholder="Ingrese Dirección">
                </div>
            </div>
        
            <div class="col-md-6">
                <label class="">Número Teléfono:</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtfono" placeholder="Ingrese Número Teléfono">
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                <label class="">Sexo:</label>
                <select class="form-control" id="option">
                    <option value="">Seleccione ...</option>
                    <option value="">Masculino</option>
                    <option value="">Femenino</option>
                </select>
                </div>
            </div> 
            
            <div class="col-md-6">
                <label class="">Breve Descripción:</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="txtfono" placeholder="Ingrese Descripción">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-10">
        <div align="center">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Ponente</button>
        </div>
    </div>
</div>    
    
<script>
        function seleccionar_opcion(){
            var cbo = document.getElementById("tipo_doc");
            var i = cbo.selectedIndex;
            document.getElementById("valor_doc").setAttribute("placeholder","Ingrese "+cbo.options[i].text);
        }
</script>
