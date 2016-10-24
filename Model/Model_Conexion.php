<?php

    class conexion {
        private $servidor;
        private $usuario;
        private $password;
        private $basedatos;
        public  $conexion;
        
        public function __construct(){
            $this->servidor     =   "localhost";
            $this->usuario      =   "root";
            $this->password     =   "";
            $this->basedatos    =   "bdproyectotransporte"; 
        }
        
        function conectar(){
            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->basedatos);
            
            //$this->conexion = set_charset("utf8");     
        }
        
        function cerrar(){
            $this->conexion->close();
        }
    }
 
?>