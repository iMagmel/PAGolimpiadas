<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ventas - SkyWay Travel</title>
  <link rel="stylesheet" href="css/ventas.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>


    <nav>
            <a href="VistaJefeVentas.html">Servicios</a> 
            <a href="#buscar">Nosotros</a> 
            <a href="#agregar">Contacto</a> 
            <a href="Ventas.html">Administrar Viajes</a> 
            
        </nav>
    </nav>

<!-- Sección Buscar -->
<section id="buscar">
  <div class="registro-unico buscar">

    <!-- Título y subtítulo -->
    <div class="titulo-busqueda">
      <h2>BUSCAR PAQUETE</h2>
      <p>Ingresá destino, país o número de compra</p>
    </div>

    <!-- Barra de búsqueda -->
    <div class="buscador-container">
      <input type="text" placeholder="Buscar destino, país, número de compra...">
      <button class="btn-buscar"><i class="fas fa-search"></i></button>
    </div>

    <!-- Imagen centrada arriba -->
    <div class="imagen-item">
      <label class="imagen-label">
        <img src="images/Europa/Noruega.jpg" alt="Imagen Lugar" />
      </label>
    </div>

    <!-- Primera fila: Num Compra y Num Pasaje -->
    <div class="fila fila-doble">
      <div class="item">
        <span>Num Compra:</span>
        <label>123456</label>
      </div>

      <div class="item">
        <span>Num Pasaje:</span>
        <label>78910</label>
      </div>
    </div>

    <!-- Segunda fila: Cantidad Pasajes, Fecha, Estado -->
    <div class="fila fila-triple">
      <div class="item">
        <span>Cantidad Pasajes:</span>
        <label>3</label>
      </div>

      <div class="item">
        <span>Fecha Compra:</span>
        <input type="date" value="2025-06-16" disabled />
      </div>

      <div class="item">
        <span>Estado Compra:</span>
        <label>Confirmado</label>
      </div>
    </div>

  </div>
</section>

<!-- Sección Agregar/Eliminar -->
<section id="agregar">
  <h1>Agregar / Eliminar Productos</h1>
  <p>Agrega nuevos paquetes o elimina los existentes</p>

  <!-- Botones de Agregar y Eliminar centrados -->
  <div class="botones-agregar-eliminar">
    <button class="darle-accion" onclick="mostrarBoton('agregar')">Agregar</button>
    <button class="darle-accion" onclick="mostrarBoton('eliminar')">Eliminar</button>
  </div>

  <div class="registro-unico agregar-eliminar">
    <!-- Ítems en dos filas de tres -->
    <div class="item">
      <span>Destino:</span>
      <input type="text" placeholder="Ej: París, Roma...">
    </div>
    <div class="item">
      <span>Fecha salida:</span>
      <input type="date">
    </div>
    <div class="item">
      <span>Fecha vuelta:</span>
      <input type="date">
    </div>
    <div class="item">
      <span>Num pasaje:</span>
      <input type="number" placeholder="Ej: 2">
    </div>
    <div class="item">
      <span>Transporte:</span>
      <input type="text" placeholder="Ej: Avión, Tren, Bus...">
    </div>
    <div class="item">
      <span>Estadía:</span>
      <input type="text" placeholder="Ej: Hotel 4 estrellas...">
    </div>
  </div>

  <!-- Botones de acción que aparecen abajo -->
  <div class="acciones-finales">
    <button id="btnAgregar" style="display: none;">Confirmar Agregacion</button>
    <button id="btnEliminar" style="display: none;">Confirmar Eliminacion</button>
  </div>
</section>

  <footer>
    <p>© 2023 SkyWay Travel. Todos los derechos reservados.</p>
    <a href="#contacto">Contacto</a>
    <a href="#">Políticas de cancelación</a>
    <a href="https://www.argentina.gob.ar/normativa/nacional/decreto-2182-1972-18905/texto">Decreto N°2182</a>
  </footer>

    <script>
    function mostrarBoton(accion) {
      const btnAgregar = document.getElementById('btnAgregar');
      const btnEliminar = document.getElementById('btnEliminar');

      if (accion === 'agregar') {
        btnAgregar.style.display = 'inline-block';
        btnEliminar.style.display = 'none';
      } else if (accion === 'eliminar') {
        btnAgregar.style.display = 'none';
        btnEliminar.style.display = 'inline-block';
      }
    }
  </script>
</body>

</html>
