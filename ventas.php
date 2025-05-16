<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Mascotas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tienda de Mascotas 🐾</h1>

    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Valor Unitario</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <!-- Producto 1 -->
            <tr>
                <td>1</td>
                <td>Comida</td>
                <td>Alimento Gato 1Kg</td>
                <td>5000</td>
                <td><button onclick="agregarAlCarrito(1, 'Comida', 'Alimento Gato 1Kg', 5000)">Agregar</button></td>
            </tr>
            <!-- Producto 2 -->
            <tr>
                <td>2</td>
                <td>Juguetes</td>
                <td>Pelota Perro</td>
                <td>3000</td>
                <td><button onclick="agregarAlCarrito(2, 'Juguetes', 'Pelota Perro', 3000)">Agregar</button></td>
            </tr>
        </tbody>
    </table>

    <h2>🛒 Carrito</h2>
    <table class="cart-table" id="carrito">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Valor</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <h3>Total: $<span id="total">0</span></h3>

    <script src="script.js"></script>
</body>
</html>
