<?php
require_once "../controllers/ControladorVentas.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipoOperacion']) && $_POST['tipoOperacion'] === 'registrarVenta') {
    $datos = [
        "id_producto" => intval($_POST['id_producto']),
        "cantidad" => intval($_POST['cantidad']),
        "precio_unitario" => floatval($_POST['precio_unitario']),
        "total" => floatval($_POST['total']),
    ];

    if ($datos["id_producto"] <= 0 || $datos["cantidad"] <= 0 || $datos["precio_unitario"] <= 0) {
        echo "error: datos inválidos";
        exit;
    }

    $respuesta = (new ControladorVentas)->ctrRegistrarVenta($datos);

    echo $respuesta;

} else {
    echo "error: solicitud no válida";
}
?>
