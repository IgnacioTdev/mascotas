// script.js

document.addEventListener('DOMContentLoaded', () => {
  const carritoBody = document.querySelector('#carrito tbody');
  const totalSpan = document.getElementById('total');
  const tablaProductos = document.getElementById('tablaProductos').querySelector('tbody');
  const buscador = document.getElementById('buscador');
  const formIngresoProducto = document.getElementById('formIngresoProducto');
  const modalIngresoProducto = new bootstrap.Modal(document.getElementById('modalIngresoProducto'));

  let carrito = [];

  // Función para actualizar el total del carrito
  function actualizarTotal() {
    let total = carrito.reduce((acc, item) => acc + item.cantidad * item.valor, 0);
    totalSpan.textContent = total.toLocaleString();
  }

  // Función para renderizar el carrito en la tabla
  function renderizarCarrito() {
    carritoBody.innerHTML = '';
    carrito.forEach((item, index) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${item.nombre}</td>
        <td>${item.categoria}</td>
        <td>${item.cantidad}</td>
        <td>$${item.valor.toLocaleString()}</td>
        <td>$${(item.valor * item.cantidad).toLocaleString()}</td>
        <td>
          <button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito(${index})">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      `;
      carritoBody.appendChild(tr);
    });
    actualizarTotal();
  }

  // Función para agregar producto al carrito
  window.agregarAlCarrito = function(id, nombre, valor) {
    // Buscar fila de producto para obtener categoría y cantidad seleccionada
    const fila = document.querySelector(`#tablaProductos tbody tr:nth-child(${id})`);
    if (!fila) return alert('Producto no encontrado.');

    const categoria = fila.querySelector(`#categoria-${id}`).value;
    const cantidadSelect = fila.querySelector(`#cantidad-${id}`);
    const cantidad = parseInt(cantidadSelect.value);
    const stockElem = document.getElementById(`stock-${id}`);
    const stock = parseInt(stockElem.textContent);

    if (cantidad > stock) {
      return alert('No hay suficiente stock disponible.');
    }

    // Buscar si producto ya está en carrito
    const indexCarrito = carrito.findIndex(item => item.id === id);
    if (indexCarrito >= 0) {
      // Actualizar cantidad (sin superar stock)
      if (carrito[indexCarrito].cantidad + cantidad <= stock) {
        carrito[indexCarrito].cantidad += cantidad;
      } else {
        return alert('No puedes agregar más que el stock disponible.');
      }
    } else {
      carrito.push({ id, nombre, categoria, cantidad, valor });
    }

    renderizarCarrito();
  };

  // Función para eliminar producto del carrito
  window.eliminarDelCarrito = function(index) {
    carrito.splice(index, 1);
    renderizarCarrito();
  };

  // Función para procesar venta
  window.procesarVenta = function() {
    if (carrito.length === 0) {
      return alert('El carrito está vacío.');
    }

    // Actualizar stock en tabla productos
    carrito.forEach(item => {
      const stockElem = document.getElementById(`stock-${item.id}`);
      let stockActual = parseInt(stockElem.textContent);
      stockActual -= item.cantidad;
      stockElem.textContent = stockActual;
      // Reset cantidad seleccionada a 1
      const cantidadSelect = document.getElementById(`cantidad-${item.id}`);
      if (cantidadSelect) cantidadSelect.value = '1';
    });

    carrito = [];
    renderizarCarrito();
    alert('Venta registrada con éxito.');
  };

  // Función para agregar nuevo producto desde modal
  formIngresoProducto.addEventListener('submit', (e) => {
    e.preventDefault();

    const id = parseInt(document.getElementById('inputId').value);
    const categoria = document.getElementById('inputCategoria').value;
    const nombre = document.getElementById('inputNombre').value.trim();
    const proveedor = document.getElementById('inputProveedor').value.trim();
    const valor = parseInt(document.getElementById('inputValor').value);
    const stock = parseInt(document.getElementById('inputStock').value);

    // Validar si ID ya existe
    if (document.querySelector(`#tablaProductos tbody tr td:first-child:contains('${id}')`)) {
      alert('El ID ya existe.');
      return;
    }
    // Insertar nueva fila en tabla productos
    const nuevaFila = document.createElement('tr');
    nuevaFila.innerHTML = `
      <td>${id}</td>
      <td>
        <select id="categoria-${id}" class="form-select form-select-sm">
          <option ${categoria === 'Gatos' ? 'selected' : ''}>Gatos</option>
          <option ${categoria === 'Perros' ? 'selected' : ''}>Perros</option>
          <option ${categoria === 'Juguetes' ? 'selected' : ''}>Juguetes</option>
          <option ${categoria === 'Accesorios' ? 'selected' : ''}>Accesorios</option>
        </select>
      </td>
      <td>${nombre}</td>
      <td>${proveedor}</td>
      <td>$${valor.toLocaleString()}</td>
      <td id="stock-${id}">${stock}</td>
      <td>
        <select id="cantidad-${id}" class="form-select form-select-sm" style="width:80px; margin:auto;">
          ${Array.from({length: 10}, (_, i) => `<option>${i+1}</option>`).join('')}
        </select>
      </td>
      <td>
        <button class="btn btn-success btn-sm" onclick="agregarAlCarrito(${id}, '${nombre}', ${valor})">
          <i class="fas fa-cart-plus"></i>
        </button>
        <button class="btn btn-primary btn-sm ms-1" onclick="editarProducto(this)">
          <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-warning btn-sm ms-1 d-none" onclick="guardarProducto(this)">
          <i class="fas fa-save"></i>
        </button>
        <button class="btn btn-danger btn-sm ms-1" onclick="eliminarProducto(this)">
          <i class="fas fa-trash"></i>
        </button>
      </td>
    `;
    tablaProductos.appendChild(nuevaFila);

    formIngresoProducto.reset();
    modalIngresoProducto.hide();
  });

  // Función para filtrar productos en la tabla según el buscador
  buscador.addEventListener('input', () => {
    const filtro = buscador.value.toLowerCase();
    const filas = tablaProductos.querySelectorAll('tr');
    filas.forEach(fila => {
      const nombreProd = fila.children[2].textContent.toLowerCase();
      if (nombreProd.includes(filtro)) {
        fila.style.display = '';
      } else {
        fila.style.display = 'none';
      }
    });
  });

  // Funciones placeholder para editar, guardar y eliminar producto
  window.editarProducto = function(btn) {
    const fila = btn.closest('tr');
    const selects = fila.querySelectorAll('select');
    const celdasInput = fila.querySelectorAll('td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6)');
    // Activar edición
    selects.forEach(s => s.removeAttribute('disabled'));
    celdasInput.forEach(td => {
      const text = td.textContent.replace('$','').replace(/\./g,'');
      const input = document.createElement('input');
      input.type = td.cellIndex === 4 ? 'number' : 'text';
      input.value = text;
      input.classList.add('form-control', 'form-control-sm');
      td.textContent = '';
      td.appendChild(input);
    });
    btn.classList.add('d-none');
    fila.querySelector('button.btn-warning').classList.remove('d-none');
  };

  window.guardarProducto = function(btn) {
    const fila = btn.closest('tr');
    const selects = fila.querySelectorAll('select');
    const celdasInput = fila.querySelectorAll('td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6)');
    // Guardar edición
    selects.forEach(s => s.setAttribute('disabled', ''));
    celdasInput.forEach(td => {
      const input = td.querySelector('input');
      if (!input) return;
      let valor = input.value;
      if (td.cellIndex === 4) valor = `$${parseInt(valor).toLocaleString()}`;
      td.textContent = valor;
    });
    btn.classList.add('d-none');
    fila.querySelector('button.btn-primary').classList.remove('d-none');
  };

  window.eliminarProducto = function(btn) {
    if (confirm('¿Seguro quieres eliminar este producto?')) {
      const fila = btn.closest('tr');
      fila.remove();
    }
  };

});
