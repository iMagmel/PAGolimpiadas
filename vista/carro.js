// Base de datos de productos
const productos = {
    'prod-1': {
        id: 'prod-1',
        nombre: 'Excursión a las Cataratas',
        descripcion: 'Tour guiado de día completo con almuerzo incluido',
        precio: 150,
        imagen: 'images/brasil.jfif'
    },
    'prod-2': {
        id: 'prod-2',
        nombre: 'City Tour Histórico',
        descripcion: 'Recorrido por los puntos históricos más importantes',
        precio: 80,
        imagen: 'images/tokio.jfif'
    },
    'prod-3': {
        id: 'prod-3',
        nombre: 'Paquete Aventura Extrema',
        descripcion: 'Rafting, trekking y tirolesa en un solo día',
        precio: 200,
        imagen: 'images/londres.jfif'
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const iconoCarrito = document.getElementById('icono-carrito');
    const carritoDiv = document.getElementById('carrito');
    const cerrarCarrito = document.getElementById('cerrar-carrito');

    if (iconoCarrito && carritoDiv) {
        iconoCarrito.addEventListener('click', () => {
            carritoDiv.classList.toggle('oculto');
        });
    }

    if (cerrarCarrito && carritoDiv) {
        cerrarCarrito.addEventListener('click', () => {
            carritoDiv.classList.add('oculto');
        });
    }
});

// Carrito como array de objetos
let carrito = [];

// Función para agregar productos al carrito
function agregarAlCarrito(productoId) {
    const producto = productos[productoId];
    
    const existe = carrito.find(item => item.id === producto.id);
    
    if (existe) {
        existe.cantidad += 1;
    } else {
        carrito.push({
            ...producto,
            cantidad: 1,
            fecha: new Date().toISOString().split('T')[0]
        });
    }

    actualizarCarrito();
    actualizarContadorCarrito();
    guardarCarritoLocalStorage();
    alert(`¡${producto.nombre} agregado al carrito!`);
}

// Función para actualizar visualmente el carrito
function actualizarCarrito() {
    const contenedor = document.getElementById('items-carrito');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    
    contenedor.innerHTML = '';

    if (carrito.length === 0) {
        contenedor.innerHTML = '<p style="text-align: center;">Tu carrito está vacío</p>';
        subtotalElement.textContent = '$0';
        totalElement.textContent = '$0';
        return;
    }

    let subtotal = 0;

    carrito.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'item-carrito';
        itemElement.innerHTML = `
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <img src="${item.imagen}" alt="${item.nombre}" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 4px;">
                <div>
                    <h4 style="margin: 0;">${item.nombre}</h4>
                    <p style="margin: 0; font-size: 14px;">$${item.precio} x ${item.cantidad}</p>
                </div>
            </div>
            <div class="controles-cantidad">
                <button onclick="cambiarCantidad('${item.id}', -1)">-</button>
                <span>${item.cantidad}</span>
                <button onclick="cambiarCantidad('${item.id}', 1)">+</button>
                <button onclick="eliminarDelCarrito('${item.id}')" style="margin-left: auto; margin-right: 40px;">Eliminar</button>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <label for="fecha-${item.id}">Fecha:</label>
                <input type="date" id="fecha-${item.id}" value="${item.fecha}" onchange="actualizarFecha('${item.id}', this.value)">
            </div>
        `;
        contenedor.appendChild(itemElement);
        subtotal += item.precio * item.cantidad;
    });

    subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
    totalElement.textContent = `$${subtotal.toFixed(2)}`;
}

// Función para cambiar cantidad
function cambiarCantidad(productoId, cambio) {
    const item = carrito.find(item => item.id === productoId);
    
    if (item) {
        item.cantidad += cambio;

        if (item.cantidad <= 0) {
            carrito = carrito.filter(item => item.id !== productoId);
        }

        actualizarCarrito();
        actualizarContadorCarrito();
        guardarCarritoLocalStorage();
    }
}

// Función para eliminar un producto del carrito
function eliminarDelCarrito(productoId) {
    carrito = carrito.filter(item => item.id !== productoId);
    actualizarCarrito();
    actualizarContadorCarrito();
    guardarCarritoLocalStorage();
}

// Función para actualizar la fecha
function actualizarFecha(productoId, nuevaFecha) {
    const item = carrito.find(item => item.id === productoId);
    if (item) {
        item.fecha = nuevaFecha;
        guardarCarritoLocalStorage();
    }
}

// Función para actualizar el contador del ícono del carrito
function actualizarContadorCarrito() {
    const contador = document.getElementById('cart-counter');
    const totalItems = carrito.reduce((total, item) => total + item.cantidad, 0);
    contador.textContent = totalItems;
}

// Guardar en localStorage
function guardarCarritoLocalStorage() {
    localStorage.setItem('carritoTurismo', JSON.stringify(carrito));
}

// Cargar carrito desde localStorage
function cargarCarritoLocalStorage() {
    const carritoGuardado = localStorage.getItem('carritoTurismo');
    if (carritoGuardado) {
        carrito = JSON.parse(carritoGuardado);
        actualizarCarrito();
        actualizarContadorCarrito();
    }
}

// Manejar finalizar compra
document.getElementById('finalizar-compra').addEventListener('click', () => {
    if (carrito.length === 0) {
        alert('Tu carrito está vacío');
        return;
    }

    document.getElementById('formulario-pago').style.display = 'block';
    window.scrollTo({
        top: document.getElementById('formulario-pago').offsetTop,
        behavior: 'smooth'
    });
});

// Enviar formulario
document.getElementById('form-pago').addEventListener('submit', (e) => {
    e.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;

    if (!nombre || !email || !telefono) {
        alert('Por favor completa todos los campos obligatorios');
        return;
    }

    setTimeout(() => {
        mostrarConfirmacion({
            cliente: { nombre, email, telefono },
            id: 'RES-' + Math.floor(Math.random() * 1000000),
            total: document.getElementById('total').textContent
        });
    }, 1500);
});

// Mostrar confirmación
function mostrarConfirmacion(datosCompra) {
    carrito = [];
    localStorage.removeItem('carritoTurismo');
    actualizarCarrito();
    actualizarContadorCarrito();

    document.getElementById('items-carrito').innerHTML = `
        <div class="confirmacion-compra">
            <h3>¡Gracias por tu compra, ${datosCompra.cliente.nombre}!</h3>
            <p>Hemos enviado los detalles a tu email: ${datosCompra.cliente.email}</p>
            <p>Número de reserva: ${datosCompra.id}</p>
            <p>Total pagado: ${datosCompra.total}</p>
            <a href="#" onclick="location.reload()" class="btn-volver">Volver al inicio</a>
        </div>
    `;

    document.getElementById('formulario-pago').style.display = 'none';
}

// Mostrar/ocultar datos de tarjeta
document.getElementById('metodo-pago').addEventListener('change', function() {
    const metodo = this.value;
    const datosTarjeta = document.getElementById('datos-tarjeta');

    if (metodo === 'tarjeta') {
        datosTarjeta.style.display = 'block';
    } else {
        datosTarjeta.style.display = 'none';
    }
});

// Inicializar al cargar la página
window.addEventListener('DOMContentLoaded', () => {
    cargarCarritoLocalStorage();

    if (document.getElementById('metodo-pago').value !== 'tarjeta') {
        document.getElementById('datos-tarjeta').style.display = 'none';
    }
});
