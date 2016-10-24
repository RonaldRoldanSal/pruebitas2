<?php
    class Modelo_Usuario {
        private $conexion;
        public function __construct(){
            require_once("../../Model/Model_Conexion.php");
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }
        
        // FUNCION PARA ACTUALIZAR PASSWORD DE USUARIOS
        function ActualizarContraseña($id_usuario, $contraseña_nueva){
            $actualizar_contraseña = "call sp_usuarios_actualizar_pass('$id_usuario', '$contraseña_nueva')";
            
            if ($this->conexion->conexion->query($actualizar_contraseña)){
                return true;
            }
            else {
                return false;
            }
            mysqli_close($this->conexion->conexion);
        }
        
        // FUNCION PARA LISTAR BUSQUEDA USUARIOS POR NOMBRE O EMAIL
        function ListaUsuarios($valor, $inicio=FALSE, $limite=FALSE){
            if ($inicio!==FALSE && $limite!==FALSE){
                $sql = "SELECT user.user_id, tipuser.tipuser_desc, user.user_nomb, user.user_pass, user.user_email, user.user_fechalta, user.user_estd FROM user INNER JOIN tipuser ON user.tipuser_id = tipuser.tipuser_id WHERE user_nomb like '%".$valor."%' or user_email like '%".$valor."%' ORDER BY user_id ASC LIMIT $inicio, $limite";                                                                                                                                   
            }
            else {
                $sql = "SELECT user.user_id, tipuser.tipuser_desc, user.user_nomb, user.user_pass, user.user_email, user.user_fechalta, user.user_estd FROM user INNER JOIN tipuser ON user.tipuser_id = tipuser.tipuser_id WHERE user_nomb like '%".$valor."%' or user_email like '%".$valor."%' ORDER BY user_id DESC";
            }
            $this->conexion->conexion->set_charset('utf8');
            $resultados = $this->conexion->conexion->query($sql);
            $arreglo    = array();
            while ($re=$resultados->fetch_array(MYSQL_NUM)){
                $arreglo[] = $re;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
        
        // FUNCION PARA VALIDAR LOGIN
        function VerificarUsuario($usuario, $contraseña){
            $consultar_usuario = $this->conexion->conexion->query("call sp_usuarios_verificar('$usuario','$contraseña')");
            
            if($consultar_usuario->num_rows > 0){
                $data_usuario = $consultar_usuario->fetch_assoc();
                echo $consultar_usuario->num_rows;
                return $data_usuario;
            }
            else {
                return FALSE;
            }
            mysqli_close($this->conexion->conexion);
        }
        
        // FUNCION PARA RECUPERAR LA CONTRASEÑA DE UN USUARIO
        function RecuperarContraseña($email){
            $consulta_contraseña = $this->conexion->conexion->query("call sp_usuarios_recuperar_pass('$email')");
            
            if ($consulta_contraseña->num_rows > 0){
                $data = $consulta_contraseña->fetch_assoc();
                return $data;
            }
            else {
                return "error";
            }
            mysqli_close($this->conexion->conexion);
        }
        
        // FUNCION PARA MODIFICAR USUARIOS
        function ModificarUsuario($usuario, $tipousuario, $empleado, $nombre, $clave, $fechalta, $fechbaja, $estado, $email){
            $consulta_modificar = $this->conexion->conexion->query("call sp_user_actualizar('$usuario','$tipousuario','$empleado','$nombre','$clave','$fechalta','$fechbaja','$estado','$email')");
            
            if ($consulta_modificar->num_rows > 0){
                $data = $consulta_modificar->fetch_assoc();
                return $data;
            }
            else {
                return "error";
            }
            mysqli_close($this->conexion->conexion);
        }
        
        // FUNCION PARA AGREGAR NUEVO USUARIO - ADMIN
        function AgregarNuevoUsuario($tipousuario1, $empleado1, $nombre1, $clave1, $fechalta1, $fechbaja1, $estado1, $email1){
            $consulta = "call sp_user_insertar('$tipousuario1','$empleado1','$nombre1','$clave1','$fechalta1','$fechbaja1','$estado1','$email1')";
            
            if ($this->conexion->conexion->query($consulta)){
                
                echo "<script>alert('Se Registró Correctamente!');location.href='../../View/index.php';</script>";
                
                return 1;
            }
            else {
                return FALSE;
                echo "<script>alert('Error en Registro')</script>";
            }
            $this->conexion->cerrar();
        }
        
        // FUNCION PARA ELIMINAR USUARIO - ADMIN
        function EliminarUsuario($id_usuario){
            $consulta = "call sp_user_eliminar($id_usuario)";
            
            if ($this->conexion->conexion->query($consulta)){
                echo "<script>alert('Se eliminó exitosamente!');location.href'../../View/index.php';</script>";
                return true;
            }
            else {
                return FALSE;
                echo "<script>alert('Error al eliminar!')</script>";
            }
            $this->conexion->cerrar();
        }
        
    }
    
    /*
    
    $instancia = new Modelo_Usuario();
    #borraste el postman ?ja no lo tengo ya!
    #esta con timestap   si la fecha alta (fecha hora del servidor) la fecha de baja (time satamp) pero manualmente 
    #julio espera... la fecha de baja permite valores nulos xD xd mira mi bd espera.... orre este archivo en el chrome aversh ok
    if($instancia->AgregarNuevoUsuario('1','1','juan','123','16-12-12','','a','juan@gmail.com')){
        echo 'ok';
        
    }
    else{
        echo 'error';
    }
        
    */
    
    
    ?>

