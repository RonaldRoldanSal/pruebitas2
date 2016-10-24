<?php
    require '../../Model/usuarios/usuarios_model.php';
    
    $email      =   $_POST["txt_email"];
    $M_usuario  =   new Modelo_Usuario();
    $recupepass =   $M_usuario->RecuperarContraseña($email);
    
    if (count($recupepass) > 0){
        $asunto = "ETEPSAC | Recuperación de Contraseña";
        $clave_decode = base64_decode($recupepass['user_pass']);
        
        // Envío del correo
        $cuerpo = "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'><title>Recuperación de Contraseña</title></head><body>
		<h1>Mensaje de Recuperación de Contraseña</h1><p>Usuario : ".$recupepass['user_nomb']."</p><p>Email : ".$email."</p>
		<p>Tu Contraseña es: ".$clave_decode."</p></body></html>";
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        
        // Dirección del Remitente
        $headers .= "From: EMPRESA DE TRANSPORTES EL PERUANITO SAC | 2016 <etepsac2016@gmail.com>\r\n"; 
        $envio_estado = @mail($email, $asunto, $cuerpo, $headers);
        if($envio_estado){
            echo "<script> alert('Envío Satisfactorio');location.href='../../View/index.php';</script>";    
        }
        else {
            echo "<script> alert('Error de envio!');location.href='../../View/index.php';</script>";
        }
    }
?>