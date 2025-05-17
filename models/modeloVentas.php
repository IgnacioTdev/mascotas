<?php
require_once "Conexion.php";

class ModeloVentas {
    static public function registrarVenta($datos) {
        $db = Conexion::conectar();

        // Verificar stock actual
        $stmtStock = $db->prepare("SELECT Cantidad_Stock FROM Productos WHERE ID_Producto = ?");
        $stmtStock->execute([$datos['id_producto']]);
        $stockActual = $stmtStock->fetchColumn();

        if ($stockActual === false) {
            return "error: producto no encontrado";
        }

        if ($stockActual < $datos['cantidad']) {
            return "error: stock insuficiente";
        }

        // Insertar venta
        $stmt = $db->prepare("INSERT INTO Ventas (Producto_ID, Cantidad, Precio_Unitario, Total) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $datos['id_producto'],
            $datos['cantidad'],
            $datos['precio_unitario'],
            $datos['total']
        ]);

        // Actualizar stock
        $stmtUpdate = $db->prepare("UPDATE Productos SET Cantidad_Stock = Cantidad_Stock - ? WHERE ID_Producto = ?");
        $stmtUpdate->execute([$datos['cantidad'], $datos['id_producto']]);

        return "ok";
    }
}
?>
