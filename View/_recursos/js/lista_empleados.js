
function lista_empleados(valor,pagina){
    var paginar=Number(pagina);
    $.ajax({
        url:'../Controller/empleados/empleados_controller_buscar.php',
        type:'POST',
        data:{
            'valor':valor,
            'pagina':paginar,
        },
        beforeSend: function(){
            $("#loading_empleado").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        
        success: function(resp){
            if (resp.length>0){
                var datos = resp.split("*"); //separamos el json de el numero de filas que hay en la TABLA
		var valores = eval(datos[0]); //me trae solo los datos menos el numero de filas
                
                var cadena = "";
                cadena += "<table class='table table-bordered table-hover table-striped'>";
                cadena += "<thead>";
                cadena += "<tr>";
                cadena += "<th>ID</th>";
                cadena += "<th>NOMBRE</th>";
                cadena += "<th>APELLIDO PATERNO</th>";
                cadena += "<th>APELLIDO MATERNO</th>";
                cadena += "<th>CARGO</th>";
           
                cadena += "<th>ESTADO</th>";
                cadena += "<th>OPERACIÓN</th>";
                cadena += "</tr>";
                cadena += "</thead>";
                cadena += "<tbody>";
                console.log(resp);
                
                for (var i=0; i<valores.length;i++){
                    datos_array =valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5];
                    cadena += "<tr>";
                    cadena += "<td>"+valores[i][0]+"</td>";
                    cadena += "<td>"+valores[i][1]+"</td>";
                    cadena += "<td>"+valores[i][2]+"</td>";
                    cadena += "<td>"+valores[i][3]+"</td>";
                    cadena += "<td>"+valores[i][4]+"</td>";
                    
                    cadena += "<td>"+valores[i][5]+"</td>";
                    cadena += "<td><button type='button' class='btn btn-success' onclick='elegir_empleado("+valores[i][0]+",\""+valores[i][1]+"\")'>Elegir</button></td>";
                    cadena += "</tr>";
                }
                cadena += "</tbody>";
                cadena += "</table>";
                $("#lista_empleado").html(cadena);
                var totaldatos = datos[1];
                var numero_paginas = Math.ceil(totaldatos/5); // el Math.ceil acerca el resultado a prox entero.
                var buscar_empleado = $("#buscarempleados").val();
                
                var paginar = "<ul class='pagination'>";
                if (pagina>1){
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_empleados("+'"'+buscar_empleado+'","'+1+'"'+")'>&laquo;</a></li>";
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_empleados("+'"'+buscar_empleado+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";   
                }
                else {
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>Anterior</a></li>";
                }
                limite = 10;
                div = Math.ceil(limite/2);
                pagina_inicio = (pagina > div) ? (pagina - div):1;
                if (numero_paginas > div){
                    pagina_restante = numero_paginas - pagina;
                    pagina_fin = (pagina_restante > div) ? (pagina + div) : numero_paginas;
                }
                else {
                    pagina_fin = numero_paginas;
                }
                
                for (i=pagina_inicio;i<=pagina_fin;i++){
                    if(i==pagina){
                        paginar +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
                    }
                    else {
                        paginar += "<li><a href='javascript:void(0)' onclick='lista_empleados("+'"'+buscar_empleado+'","'+i+'"'+")'>"+i+"</a></li>";
                    }
                }
                
                if (pagina<numero_paginas){
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_empleados("+'"'+buscar_empleado+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_empleados("+'"'+buscar_empleado+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";
                }
                else {
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
                }
                paginar += "</ul>";
                $("#paginador_empleado").html(paginar);
            }
            else {
                var nodatos = "No hay datos que mostrar";
                $("#lista_empleado").html(nodatos);
            }
        },
        
        error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
            //alert("Se produjo un error");
            console.error(textStatus);
            console.error(errorThrown);
            console.error(jqXHR);     
        } 
    });  
}

function elegir_empleado(id, nombre){
    $("#empleado_id").val(id);
    $("#empleado_user").val(nombre);   
}