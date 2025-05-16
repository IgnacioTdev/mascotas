let carrito = [];
let total = 0;

function agregarAlCarrito(id, categoria, nombre, valor) {
    carrito.push({ id, categoria, nombre, valor });
    actualizarCarrito();
}

function eliminarDelCarrito(index) {
    total -= carrito[index].valor;
    carrito.splice(index, 1);
    actualizarCarrito();
}

function actualizarCarrito() {
    const tbody = document.querySelector("#carrito tbody");
    tbody.innerHTML = "";
    total = 0;

    carrito.forEach((producto, index) => {
        const fila = document.createElement("tr");

        total += producto.valor;

        fila.innerHTML = `
            <td>${producto.nombre}</td>
            <td>$${producto.valor}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito(${index})">Eliminar</button>
            </td>
        `;
        tbody.appendChild(fila);
    });

    document.getElementById("total").innerText = total;
}
