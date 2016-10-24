<?php
    class Modelo_Cliente {
        private $conexion;
        public function __construct() {
            require_once("../../Model/Model_Conexion.php");
            $this->conexion = new conexion();
            $this->conexion->conectar();   
        }
        
        // FUNCION PARA LISTAR CLIENTE
        function ListaClientes($valor,$inicio=FALSE,$limite=FALSE){
            if($inicio!==FALSE && $limite!==FALSE){
                $sql="SELECT clie.clie_id,tipdoc.tipdoc_abrev,pers.pers_numdoc,pers.pers_nombemp,pers.pers_nomb,pers.pers_apepat,pers.pers_apemat,pers.pers_dire,pers.pers_tele,pers.pers_sexo,pers.pers_edad,pers.pers_estd FROM clie INNER JOIN pers ON clie.pers_id = pers.pers_id INNER JOIN tipdoc ON pers.tipdoc_id = tipdoc.tipdoc_id WHERE pers_nomb like '%".$valor."%' ORDER BY clie_id ASC LIMIT $inicio,$limite";
            }
            else{
                $sql="SELECT clie.clie_id,tipdoc.tipdoc_abrev,pers.pers_numdoc,pers.pers_nombemp,pers.pers_nomb,pers.pers_apepat,pers.pers_apemat,pers.pers_dire,pers.pers_tele,pers.pers_sexo,pers.pers_edad,pers.pers_estd FROM clie INNER JOIN pers ON clie.pers_id = pers.pers_id INNER JOIN tipdoc ON pers.tipdoc_id = tipdoc.tipdoc_id WHERE pers_nomb like '%".$valor."%' ORDER BY clie_id DESC";
            }
            $this->conexion->conexion->set_charset('utf8');
            $resultados = $this->conexion->conexion->query($sql);
            $arreglo    = array();
            while($re=$resultados->fetch_array(MYSQL_NUM)){
                $arreglo[]=$re;
            }
            return $arreglo;
            $this->conexion->cerrar();
	}
    }
?>


