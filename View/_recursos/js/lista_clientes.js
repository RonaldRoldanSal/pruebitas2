//lista_clientes();
function lista_clientes(valor,ipagina){
    // valor = valor que el cliente escribe para mostrar los datos por nombre
    var pagina=Number(ipagina);
    $.ajax({
        url:'../Controller/clientes/clientes_controller_listar.php',
        type:'POST',
        data:'valor='+valor+'&pagina='+pagina+'&boton=buscar',
        beforeSend: function(){
            $("#loading_cliente").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
        },
        
        success: function(resp){
            console.log(resp);
            if (resp.length>0){
                var datos = resp.split("*"); //separamos el json de el numero de filas que hay en la TABLA
		var valores = eval(datos[0]); //me trae solo los datos menos el numero de filas
                
                var cadena = "";
                cadena += "<table class='table table-bordered table-hover table-striped'>";
                cadena += "<thead>";
                cadena += "<tr>";
                cadena += "<th>ID</th>";
                cadena += "<th>DOCUMENTO</th>";
                cadena += "<th>NÚMERO</th>";
                cadena += "<th>EMPRESA</th>";
                cadena += "<th>NOMBRES</th>";
                cadena += "<th>APELLIDO PATERNO</th>";
                cadena += "<th>APELLIDO MATERNO</th>";
                cadena += "<th>DIRECCION</th>";
                cadena += "<th>TELÉFONO</th>";
                cadena += "<th>SEXO</th>";
                cadena += "<th>EDAD</th>";
                cadena += "<th>ESTADO</th>";
                cadena += "<th>OPERACIÓN</th>";
                cadena += "</tr>";
                cadena += "</thead>";
                cadena += "<tbody>";
                
                for (var i=0; i<valores.length;i++){
                    datos_array =valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10]+"*"+valores[i][11];
                    cadena += "<tr>";
                    cadena += "<td>"+valores[i][0]+"</td>";
                    cadena += "<td>"+valores[i][1]+"</td>";
                    cadena += "<td>"+valores[i][2]+"</td>";
                    cadena += "<td>"+valores[i][3]+"</td>";
                    cadena += "<td>"+valores[i][4]+"</td>";
                    cadena += "<td>"+valores[i][5]+"</td>";
                    cadena += "<td>"+valores[i][6]+"</td>";
                    cadena += "<td>"+valores[i][7]+"</td>";
                    cadena += "<td>"+valores[i][8]+"</td>";
                    cadena += "<td>"+valores[i][9]+"</td>";
                    cadena += "<td>"+valores[i][10]+"</td>";
                    cadena += "<td>"+valores[i][11]+"</td>";
                    cadena += "<td><div class='btn-group'> <button type='button' class='btn btn-info ' data-toggle='dropdown' aria-expanded='false'>Acción <span class='glyphicon glyphicon-cog'></span></button> <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-expanded='false'> <span class='caret'></span></button> <ul class='dropdown-menu' role='menu'> <li><a href='#' data-toggle='modal' data-target='#myModal_modificar' onclick='mostrar_clientes("+'"'+datos_array+'"'+");'>Modificar</a></li> <li class='divider'></li> <li><a href='#' data-toggle='modal' data-target='#myModal_eliminar'  onclick='eliminar_clientes("+'"'+datos_array+'"'+");' >Eliminar</a></li> </ul> </div></td>";
                    cadena += "</tr>";
                }
                cadena += "</tbody>";
                cadena += "</table>";
                
                $("#listar_cliente").html(cadena);
                var totaldatos = datos[1];
                var numero_paginas = Math.ceil(totaldatos/5); // el Math.ceil acerca el resultado a prox entero.
                var buscar_cliente = $("#buscarclientes").val();
                
                var paginar = "<ul class='pagination'>";
                if (pagina>1){
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_clientes("+'"'+buscar_cliente+'","'+1+'"'+")'>&laquo;</a></li>";
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_clientes("+'"'+buscar_cliente+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";   
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
                        paginar += "<li><a href='javascript:void(0)' onclick='lista_clientes("+'"'+buscar_cliente+'","'+i+'"'+")'>"+i+"</a></li>";
                    }
                }
                
                if (pagina<numero_paginas){
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_clientes("+'"'+buscar_cliente+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";
                    paginar += "<li><a href='javascript:void(0)' onclick='lista_clientes("+'"'+buscar_cliente+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";
                }
                else {
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
                    paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
                }
                paginar += "</ul>";
                $("#paginador_cliente").html(paginar);
            }
            else {
                var nodatos = "No hay datos que mostrar";
                $("#listar_cliente").html(nodatos);
            }
        },
        
        error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
            alert("Se produjo un error");
        } 
    });
}


/*
function eliminar_cliente(datos){
	var d2=datos.split("*");
	var id_usuarioe = d2[0];
	$("#id_usuarioe").val(d2[0]);
	$("#nombreuser").text(d2[2]+" "+d2[3]);


}
*/



function mostrar_clientes(datos){
    //alert(datos);
    var d=datos.split("*");
    //alert(d.length);

    $("#id_user2").val(d[0]);
    $("#id_tipouser2").val(d[1]);
    $("#id_nomtipo").val(d[1]);

    $("#nombre2").val(d[2]);
    $("#clave2").val(d[3]);
    $("#email2").val(d[4]);
    $("#fechalta2").val(d[5]);
    $("#estado2").val(d[6]);
}

