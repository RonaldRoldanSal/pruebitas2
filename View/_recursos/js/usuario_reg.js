


function registrar_usuario(){
  alert("loool");

 ///el netbeans te muestra lo que tiene el archivo ... interesante
      var reg_usuario = new FormData($("#form_user_reg")[0]);
          $.ajax({
                url: '../Controller/usuarios/usuarios_controller_agregar.php',
                type: 'POST',
                data: reg_usuario,
                cache:false,
               contentType: false,
               processData: false,
               beforeSend:function(){
                  
                  
                  alert("enviando");

               },
               success: function(datos)
               {
                $("#respuesta").html(datos);
                  if(datos=='1'){
                   // $("#correcto").show(200).delay(2500).hide(200);
                   // 
                   alert("correcto reg");
                //    limpiar_alumno();
                  }
                  else{
                    //$("#error").show(200).delay(2500).hide(200);
                    alert("fail");
                    //llego aqui
                  }   
               },error: function(jqXHR, textStatus, errorThrown)
              {
                // Handle errors here
                console.log('ERRORRR: ' + textStatus);
                console.log('ERRORRR: ' + jqXHR);
                console.log('ERRORRR: ' + errorThrown);
                // STOP LOADING SPINNER
              }
           });
  }





function validaciones(){
    //var nombre_alumno = $("#nombre_alumno").val();
    //var ape_paterno = $("#ape_paterno").val();
    //var ape_materno = $("#ape_materno").val();
    //var dni_alumno = $("#dni_alumno").val();
    //var domicilio_alumno = $("#domicilio_alumno").val();
    //var telefono_alumno = $("#telefono_alumno").val();/
    
    var nombre_alumno = document.getElementById("nombre_alumno").value;
    var ape_paterno = document.getElementById("ape_paterno").value;
    var ape_materno = document.getElementById("ape_materno").value;
    var dni_alumno = document.getElementById("dni_alumno").value;
    var domicilio_alumno = document.getElementById("domicilio_alumno").value;
    var telefono_alumno = document.getElementById("telefono_alumno").value;
    var dia = document.getElementById("dia").selectedIndex;
    var mes = document.getElementById("mes").selectedIndex;
    var year = document.getElementById("year").selectedIndex;
    var sexo_alumno = document.getElementsByName("sexo_alumno");
    var imagen_alumno = document.getElementById("imagen_alumno").value;

    var seleccionado = false;
    for(var i = 0; i<sexo_alumno.length;i++){
      if(sexo_alumno[i].checked){
        seleccionado = true;
        break;
      }
    }

///////////todas las validaciones
    if (nombre_alumno == null || nombre_alumno.length == 0 || /^\s+$/.test(nombre_alumno)) {
        //nombre_alumno.style.borderColor= #dd4b39;
      alert("falta el nombre");
      return false;
    }
    else if(ape_paterno == null || ape_paterno.length == 0 || /^\s+$/.test(ape_paterno)){
      alert("falta apellido p");
      return false;
    }
    else if (ape_materno == null || ape_materno.length == 0 || /^\s+$/.test(ape_materno)){
      alert("falta ape materno");
      return false;
    }
    else if ((dni_alumno.length >=0) && (dni_alumno.length < 8) || dni_alumno==''){
      ///!(/^\d{8}$/.test(dni_alumno)
      alert("falta dni o no son 8");
      return false;
    }
    else if(dia ==null || dia==0){
      alert("falta el dia");
      return false;
    }
    else if(mes ==null || mes==0){
      alert("falta el mes");
      return false;
    }
    else if(year==null || year ==0){
      alert("falta el año");
      return false;
    }
    else if(!seleccionado){
      alert("selecciona un sexo xD");
      return false;
    }
    else if(imagen_alumno.length==0){
      alert("falta imagen");
      return false;
    }

    else{
      return true;
      alert("verdaderos");
    }

}



/*************ELIMINAR ALUMNO******************/

$("#eliminaralumno").click(function(event){

  var idalumno = $("#idalumno").val();

        $.ajax({
            url:'Controller/alumno/controller_delete_alumno.php',
            type:'POST',
            data:'idalumno='+idalumno,
            beforeSend: function(){

            },
            success: function(data){
              if(data=='correcto'){
                alert("se elimino correctamente");
              }
              else{
                alert("se produjo un error, recargar pagina");
              }
              
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
              alert("se produjo un error");
              console.log(XMLHttpRequest);
              console.log(textStatus);
              console.log(errorThrown);
              console.log(jqXHR);
            }



        });

    listar_alumnos('','1');
  });

/*************MODIFICAR ALUMNO******************/

function mod_alumno(){

       var mod_alumno = new FormData($("#mod_alumno")[0]);

        $.ajax({
            url:'Controller/alumno/controller_mod_alumno.php',
            type:'POST',
            data: mod_alumno,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
              alert("modificando");
            },
            success: function(data){
              $("#respuesta2").html(data);
              if(data=='correcto'){
                //alert("se modifico correctamente");
                $("#correcto").show(200).delay(2500).hide(200);
                //$('#myModal_modificar').modal('hide');
                listar_alumnos('','1');
              }
              else{
                //alert("se produjo un error, recargar pagina");
                $("#error").show(200).delay(2500).hide(200);
              }
              
            },
            error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
              alert("se produjo un error");
              console.log(XMLHttpRequest);
              console.log(textStatus);
              console.log(errorThrown);
              console.log(jqXHR);
            }



        });

    


  
}





