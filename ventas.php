<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js" defer></script>
<body class="bg-light">

<div class="container py-4">
    <h1 class="text-center mb-4">🐾 Tienda de Mascotas</h1>

    <!-- Tabla de productos -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Lista de Productos</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Valor Unitario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Comida</td>
                        <td>Alimento Gato 1Kg</td>
                        <td>$5.000</td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="agregarAlCarrito(1, 'Comida', 'Alimento Gato 1Kg', 5000)">Agregar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Juguetes</td>
                        <td>Pelota Perro</td>
                        <td>$3.000</td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="agregarAlCarrito(2, 'Juguetes', 'Pelota Perro', 3000)">Agregar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Carrito -->
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5 class="mb-0">🛒 Carrito de Compras</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped text-center" id="carrito">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Valor</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="text-end">
                <h4>Total: <span class="text-success">$<span id="total">0</span></span></h4>
            </div>
        </div>
    </div>
</div>

</body>
</html>
