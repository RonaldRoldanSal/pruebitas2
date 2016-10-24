<?php
class Modelo_Empleado {
        private $conexion;
        public function __construct() {
            require_once("../../Model/Model_Conexion.php");
            $this->conexion = new conexion();
            $this->conexion->conectar();   
        }
        
        // FUNCION PARA BUSCAR EMPLEADO
        function BuscarEmpleado($valor,$inicio=FALSE,$limite=FALSE){
            if($inicio!==FALSE && $limite!==FALSE){
                $sql="call sp_empl_listar('$valor',$inicio,$limite)";
            }
            else{
                $sql="call sp_empl_listar('$valor',$inicio,$limite)";
            }
            $this->conexion->conexion->set_charset('utf8');
            $resultados = $this->conexion->conexion->query($sql);
            $arreglo    = array();
            while($re=$resultados->fetch_array(MYSQLI_NUM)){
                $arreglo[]=$re;
            }
           return $arreglo;
            $this->conexion->cerrar();
    }
}
   