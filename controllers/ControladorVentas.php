<?php
require_once "..models/ModeloVentas.php";

class ControladorVentas {
    public function ctrRegistrarVenta($datos) {
        return ModeloVentas::registrarVenta($datos);
    }
}
?>
