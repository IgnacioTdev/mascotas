<?php
    require_once 'conexion.php';

Class mdlCategoria{

    public function mdlNuevaCategoria($table, $datos){
        $sql = (new Conexion) -> Conectar()-> prepare("INSERT INTO $table VALUES(NULL, :categoria)");

        $sql -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);

        if ($sql -> execute()){
            return "ok";
        } else {
            return "error";
        }

    }
}



?>