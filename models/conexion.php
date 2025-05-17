<?php
class Conexion {
    public static function conectar() {
        $link = new PDO("mysql:host=localhost;dbname=tiendademascotas ;charset=utf8", "root", " ");
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }
}
?>
