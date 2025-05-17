<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Tienda de Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="views/js/script.js" defer></script>
</head>
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
                        <th>Stock</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <select id="categoria-1" class="form-select form-select-sm">
                                <option selected>Gatos</option>
                                <option>Perros</option>
                                <option>Juguetes</option>
                                <option>Accesorios</option>
                            </select>
                        </td>
                        <td>Alimento Gato 1Kg</td>
                        <td>$5.000</td>
                        <td id="stock-1">10</td>
                        <td>
                            <select id="cantidad-1" class="form-select form-select-sm" style="width:80px; margin:auto;">
                                <option>1</option><option>2</option><option>3</option><option>4</option>
                                <option>5</option><option>6</option><option>7</option><option>8</option>
                                <option>9</option><option>10</option>
                            </select>
                        </td>
                        <td><button class="btn btn-success btn-sm" onclick="agregarAlCarrito(1, 'Alimento Gato 1Kg', 5000)">Agregar</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <select id="categoria-2" class="form-select form-select-sm">
                                <option>Gatos</option>
                                <option>Perros</option>
                                <option selected>Juguetes</option>
                                <option>Accesorios</option>
                            </select>
                        </td>
                        <td>Pelota Perro</td>
                        <td>$3.000</td>
                        <td id="stock-2">5</td>
                        <td>
                            <select id="cantidad-2" class="form-select form-select-sm" style="width:80px; margin:auto;">
                                <option>1</option><option>2</option><option>3</option><option>4</option>
                                <option>5</option><option>6</option><option>7</option><option>8</option>
                                <option>9</option><option>10</option>
                            </select>
                        </td>
                        <td><button class="btn btn-success btn-sm" onclick="agregarAlCarrito(2, 'Pelota Perro', 3000)">Agregar</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <select id="categoria-3" class="form-select form-select-sm">
                                <option>Gatos</option>
                                <option selected>Perros</option>
                                <option>Juguetes</option>
                                <option>Accesorios</option>
                            </select>
                        </td>
                        <td>Alimento perrogit 1Kg</td>
                        <td>$5.000</td>
                        <td id="stock-3">10</td>
                        <td>
                            <select id="cantidad-3" class="form-select form-select-sm" style="width:80px; margin:auto;">
                                <option>1</option><option>2</option><option>3</option><option>4</option>
                                <option>5</option><option>6</option><option>7</option><option>8</option>
                                <option>9</option><option>10</option>
                            </select>
                        </td>
                        <td><button class="btn btn-success btn-sm" onclick="agregarAlCarrito(3, 'Alimento perrogit 1Kg', 5000)">Agregar</button></td>
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
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Valor Unitario</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="text-end">
                <h4>Total: <span class="text-success">$<span id="total">0</span></span></h4>
            </div>
            <button class="btn btn-success" onclick="procesarVenta()">Registrar Venta</button>
        </div>
    </div>
</div>
</body>
</html>
