<?php

require_once '../controllers/categorias.controller.php';
require_once '../models/categorias.model.php';


Class ajaxCategoria{
    public $_categoria;

    public function ajaxNuevaCategoria(){
        $datos = array("categoria" =>         $this->_categoria);
        $respuesta = (new ctrCategoria) -> ctrNuevaCategoria($datos);
        echo $respuesta;
    }

}


$tipoOperacion = $_POST["tipoOperacion"];

if ($tipoOperacion == "nuevaCategoria"){
    $nuevaCategoria = (new ajaxCategoria);
    $nuevaCategoria -> _categoria = $_POST["categoria"];
    $nuevaCategoria -> ajaxNuevaCategoria();
}

?>