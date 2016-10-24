<?php
    require_once("../../Model/empleados/empleados_model.php");
    $lista = array();
    
    if (isset($_POST['valor'])){
        $valor = '%'.$_POST['valor'].'%';
        $inicio = 0;
        $limite = 5;
        if (isset($_POST['pagina'])){
            $pagina = $_POST['pagina'];
            $inicio = ($pagina - 1)*$limite;
        }
        
        $instancia = new Modelo_Empleado();
        $lista = $instancia->BuscarEmpleado($valor, $inicio,$limite);  
    }
        // se imprime para poder exponerlos con json_encode javascript
        echo json_encode($lista)."*".  count($lista);
    
?>