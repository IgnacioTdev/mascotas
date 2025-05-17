// Simulamos stock inicial para cada producto
const stockProductos = {
    1: 10,
    2: 5,
    3: 10
};

let carrito = [];

function agregarAlCarrito(id, nombre, valor) {
    const cantidadSelect = document.getElementById(`cantidad-${id}`);
    const categoriaSelect = document.getElementById(`categoria-${id}`);

    let cantidad = parseInt(cantidadSelect.value);
    let categoria = categoriaSelect.value;

    if (isNaN(cantidad) || cantidad <= 0) {
        alert("Ingrese una cantidad válida");
        return;
    }

    if (cantidad > stockProductos[id]) {
        alert(`Stock insuficiente. Solo quedan ${stockProductos[id]} unidades disponibles.`);
        return;
    }

    // Ver si producto ya está en el carrito
    const index = carrito.findIndex(item => item.id === id);
    if (index === -1) {
        carrito.push({ id, categoria, nombre, valor, cantidad });
    } else {
        if (carrito[index].cantidad + cantidad > stockProductos[id]) {
            alert(`No puede agregar más de ${stockProductos[id]} unidades en total.`);
            return;
        }
        carrito[index].cantidad += cantidad;
    }

    stockProductos[id] -= cantidad;
    document.getElementById(`stock-${id}`).textContent = stockProductos[id];
    cantidadSelect.value = 1;

    actualizarCarrito();
}

function eliminarDelCarrito(index) {
    const item = carrito[index];
    stockProductos[item.id] += item.cantidad;
    document.getElementById(`stock-${item.id}`).textContent = stockProductos[item.id];
    carrito.splice(index, 1);
    actualizarCarrito();
}

function actualizarCarrito() {
    const tbody = document.querySelector("#carrito tbody");
    tbody.innerHTML = "";

    let total = 0;

    carrito.forEach((item, index) => {
        const subtotal = item.valor * item.cantidad;
        total += subtotal;

        const fila = document.createElement("tr");
        fila.innerHTML = `
            <td>${item.nombre}</td>
            <td>${item.categoria}</td>
            <td>${item.cantidad}</td>
            <td>$${item.valor.toLocaleString()}</td>
            <td>$${subtotal.toLocaleString()}</td>
            <td><button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito(${index})">Eliminar</button></td>
        `;
        tbody.appendChild(fila);
    });

    document.getElementById("total").textContent = total.toLocaleString();
}

function procesarVenta() {
    if (carrito.length === 0) {
        alert("El carrito está vacío.");
        return;
    }

    const datosVenta = carrito.map(item => ({
        id_producto: item.id,
        cantidad: item.cantidad,
        precio_unitario: item.valor
    }));

    fetch('ajax/ventas.ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ productos: datosVenta })
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            alert("¡Venta procesada correctamente!");
            carrito = [];
            actualizarCarrito();
        } else {
            alert("Error al procesar la venta.");
        }
    })
    .catch(error => {
        console.error("Error en la solicitud:", error);
        alert("Error en la comunicación con el servidor.");
    });
}