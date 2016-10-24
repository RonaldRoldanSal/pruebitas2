<?php 
    require_once("../../Model/clientes/clientes_model.php");
    $boton= $_POST['boton'];
    if($boton==='buscar')
    {
        $inicio = 0;
        $limite = 5;
        if (isset($_POST['pagina'])) {
            $pagina=$_POST['pagina'];
            $inicio = ($pagina - 1) * $limite;
    }
    $valor=$_POST['valor'];
        $ins=new Modelo_Cliente();
        $a= $ins->ListaClientes($valor);
        $b=count($a);
        $c= $ins->ListaClientes($valor,$inicio,$limite);
        ///se imprime para poder exponerlos con json_encode javascript
        echo json_encode($c)."*".$b;
    }

?>