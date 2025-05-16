<?php

Class ctrCategoria{

    public function ctrNuevaCategoria($datos){
        $table = "categorias";
        $respuesta = (new mdlCategoria) -> mdlNuevaCategoria($table, $datos);
        return $respuesta;
    }
}


?>