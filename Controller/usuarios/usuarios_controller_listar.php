<?php
    require_once("../../Model/usuarios/usuarios_model.php");
    $boton = $_POST['boton'];
    
    if ($boton === 'buscar'){
        $inicio = 0;
        $limite = 5;
        if (isset($_POST['pagina'])){
            $pagina = $_POST['pagina'];
            $inicio = ($pagina - 1)*$limite;
        }
        $valor = $_POST['valor'];
        $ins   = new Modelo_Usuario();
        $a     = $ins->ListaUsuarios($valor);
        $b     = count($a);
        $c     = $ins->ListaUsuarios($valor,$inicio,$limite);
        
        // se imprime para poder exponerlos con json_encode javascript
        echo json_encode($c)."*".$b;
    }
?>

