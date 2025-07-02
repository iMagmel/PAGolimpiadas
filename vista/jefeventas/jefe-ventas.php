<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Jefe de Ventas</title>
  <link rel="stylesheet" href="/PAGolimpiadas/vista/css/jefeventas.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/v4-shims.min.css" />

</head>
<body>

  <div class="sidebar">
    <h2>SkyWay <br>
         Jefe De Ventas</h2>
    <a href="#inicio" class="active">Inicio</a>
    <a href="#usuarios">Usuarios</a>
    <a href="#compras">Compras</a>
    <a href="#paquetes">Paquetes</a>
    <a href="#buzon">Buzón</a>
    <a href="#buscar">Buscar</a>
    <a href="#agregar">Agregar</a>
    <a href="#modificar">Modificar</a>
    <a href="#eliminar">Eliminar</a>
  </div>


  <div class="main">


    <div class="topbar">
      <div class="user-icon" id="userToggle">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="dropdown" id="userDropdown">
        <p>Juan Burger</p>
        <button >Cerrar sesión</button>
      </div>
    </div>


    <div class="content">
      
      <section id="inicio" class="active">
        <h1>Inicio</h1>
        <div class="card-box">
          <div class="card"><h3>Total Ventas del Mes</h3><p>$1.250.000</p></div>
          <div class="card"><h3>Paquetes Vendidos</h3><p>328</p></div>
          <div class="card"><h3>Reservas Pendientes</h3><p>15</p></div>
        </div>
        <h3 style="margin-top:30px;">Top 5 Paquetes</h3>
        <table>
          <thead><tr><th>Paquete</th><th>Destino</th><th>Ventas</th></tr></thead>
          <tbody>
            <tr><td>Bariloche</td><td>Bariloche</td><td>120</td></tr>
            <tr><td>Cataratas</td><td>Iguazú</td><td>95</td></tr>
            <tr><td>Mendoza</td><td>Mendoza</td><td>70</td></tr>
            <tr><td>Mar del Plata</td><td>Mar del Plata</td><td>60</td></tr>
            <tr><td>Salta</td><td>Salta</td><td>53</td></tr>
          </tbody>
        </table>
      </section>

      <section id="usuarios">
        <h1>Usuarios Registrados</h1>
        <table>
          <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th></tr></thead>
          <tbody>
            <tr><td>1</td><td>Juan Pérez</td><td>juan@mail.com</td><td>Activo</td></tr>
            <tr><td>2</td><td>Laura Gómez</td><td>laura@mail.com</td><td>Inactivo</td></tr>
          </tbody>
        </table>
      </section>

      <section id="compras">
        <h1>Registros de Compras</h1>
        <table>
          <thead><tr><th>Usuario</th><th>Paquete</th><th>Destino</th><th>Fecha</th><th>Total</th></tr></thead>
          <tbody>
            <tr><td>Juan Pérez</td><td>Aventura</td><td>Salta</td><td>2025-06-15</td><td>$120.000</td></tr>
          </tbody>
        </table>
      </section>

      <section id="paquetes">
        <h1>Paquetes Disponibles</h1>
        <table>
          <thead><tr><th>ID</th><th>Nombre</th><th>Destino</th><th>Precio</th><th>Duración</th></tr></thead>
          <tbody>
            <tr><td>001</td><td>Bariloche</td><td>Bariloche</td><td>$150.000</td><td>7 días</td></tr>
          </tbody>
        </table>
      </section>

      <section id="buzon">
        <h1>Buzón de Mensajes</h1>
        <div class="buzon">
          <p><strong>[30/06 - 12:34]</strong> Juan compró "Salta" por $120.000</p>
          <p><strong>[30/06 - 11:00]</strong> Laura compró "Bariloche" por $150.000</p>
        </div>
      </section>

      <section id="buscar">
  <h1>Buscar</h1>
  <div class="campo-busqueda">
  <input type="text" id="inputBusqueda" placeholder="Buscar en la tabla...">
  <button onclick="filtrarTabla()">Buscar</button>
  </div>
  <div class="registro-unico buscar">

    <!-- Título y subtítulo -->
    <div class="titulo-busqueda">
      <p>Ingresá estadía, viaje o auto</p>
    </div>

    <!-- Combo Box de tipo de búsqueda -->
    <div class="tipo-busqueda">
      <label for="tipoBusqueda">Tipo de búsqueda:</label>
      <select id="tipoBusqueda" onchange="cambiarFiltro(this.value)">
        <option value="">Seleccionar</option>
        <option value="auto">Auto</option>
        <option value="estadia">Estadía</option>
        <option value="viaje">Viaje</option>
      </select>
    </div>
    
        <!-- AUTO -->
        <section id="tabla-auto" class="tabla-busqueda">
          <h1>Auto</h1>
          <table>
            <thead>
              <tr>
                <th>Label 1</th>
                <th>Label 2</th>
                <th>Label 3</th>
                <th>Label 4</th>
                <th>Label 5</th>
                <th>Label 6</th>
                <th>Label 7</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Item 1</td>
                <td>Item 2</td>
                <td>Item 3</td>
                <td>Item 4</td>
                <td>Item 5</td>
                <td>Item 6</td>
                <td>Item 7</td>
              </tr>
            </tbody>
          </table>
        </section>

        <!-- ESTADÍA -->
        <section id="tabla-estadia" class="tabla-busqueda">
          <h1>Estadía</h1>
          <table>
            <thead>
              <tr>
                <th>Label 1</th>
                <th>Label 2</th>
                <th>Label 3</th>
                <th>Label 4</th>
                <th>Label 5</th>
                <th>Label 6</th>
                <th>Label 7</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Item 1</td>
                <td>Item 2</td>
                <td>Item 3</td>
                <td>Item 4</td>
                <td>Item 5</td>
                <td>Item 6</td>
                <td>Item 7</td>
              </tr>
            </tbody>
          </table>
        </section>

        <!-- VIAJE -->
        <section id="tabla-viaje" class="tabla-busqueda">
          <h1>Viaje</h1>
          <table>
            <thead>
              <tr>
                <th>Label 1</th>
                <th>Label 2</th>
                <th>Label 3</th>
                <th>Label 4</th>
                <th>Label 5</th>
                <th>Label 6</th>
                <th>Label 7</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Item 1</td>
                <td>Item 2</td>
                <td>Item 3</td>
                <td>Item 4</td>
                <td>Item 5</td>
                <td>Item 6</td>
                <td>Item 7</td>
              </tr>
            </tbody>
          </table>
        </section>


  </div>
</section>


<section id="agregar">
  <h1>Agregar nuevo paquete</h1>

  <div class="registro-unico agregar">
    <form class="form-agregar" method="POST" action="../../controllers/AltaViajeController.php">

      <h2>Datos de Estadía</h2>
      <div class="campo">
        <label>Tipo de Estadia</label>

        <select> 
          <option value="Hotel">Hotel</option>
          <option value="Hostería">Hostería</option>
          <option value="PH">PH</option>
        </select>
      </div>
<div class="campo">
    <label>País</label>
    
    <select name="pais" id="pais" required>
        <option value="" name = "pais" disabled selected>Seleccione el país</option>
        <?php foreach ($paises as $pais): ?>
            <option value="<?= htmlspecialchars($pais['Id_Pais']) ?>"
                    <?= (isset($_POST['pais']) && $_POST['pais'] == $pais['Id_Pais']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($pais['Pais']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


      <div class="campo">
        <label>Calle</label>
        <input type="text" name="calle" required>
      </div>
      <div class="campo">
        <label>Número</label>
        <input type="number" name="nro" required>
      </div>
      <div class="campo">
        <label>Piso</label>
        <input type="text" name="piso" placeholder="Opcional">
      </div>
      <div class="campo">
        <label>Depto</label>
        <input type="text" name="depto" placeholder="Opcional">
      </div>

            <!-- Vuelo -->
      <h2>Datos del Vuelo</h2>
      <div class="campo">
        <label>Número de Vuelo</label>
        <input type="number" name="nro_vuelo" required>
      </div>
      <div class="campo">
        <label>Capacidad</label>
        <select name="capacidad" required>
          <option value="" disabled selected>Seleccionar capacidad</option>
          <?php for ($i = 30; $i <= 50; $i++): ?>
        <option value="<?= $i ?>"><?= $i ?></option>
          <?php endfor; ?>
        </select>
      </div>

      <!-- Auto -->
      <h2>Datos del Auto</h2>
      <div class="campo">
        <label>Marca</label>
        <input type="text" name="marca_auto" required>
      </div>
      <div class="campo">
        <label>Modelo</label>
        <input type="text" name="modelo_auto" required>
      </div>
      <div class="campo">
        <label>País de Origen</label>
        <!-- traerdesde la BD -->
        <select name="pais"></select>
      </div>

      <!-- Viaje -->
      <h2>Datos del Viaje</h2>
      <div class="campo">
        <label>País de destino</label>
        <input type="text" name="pais_viaje" required>
      </div>
      <div class="campo">
        <label>Destino</label>
        <input type="text" name="destino" required>
      </div>
      <div class="campo">
        <label>Descripción</label>
        <input type="text" name="descripcion" required>
      </div>
      <div class="campo">
        <label>Fecha de salida</label>
        <input type="date" name="salida" required>
      </div>
      <div class="campo">
        <label>Fecha de regreso</label>
        <input type="date" name="vuelta" required>
      </div>


      <div class="boton-guardar">
        <button type="submit">Guardar Paquete Completo</button>
      </div>
    </form>
  </div>
</section>


      <section id="modificar"><h1>Modificar</h1><div class="registro-unico agregar">
      
      <form class="form-agregar">
        <div class="campo">
        <label for="comboEliminar">Seleccionar opción</label>
        <select id="comboEliminar">
          <option value="">Seleccionar...</option>
          <option value="opcion1">Opción 1</option>
          <option value="opcion2">Opción 2</option>
          <option value="opcion3">Opción 3</option>
        </select>
      </div>
        <div class="campo"><label>Label 2</label><input type="text" placeholder="Item 2"></div>
        <div class="campo"><label>Label 3</label><input type="text" placeholder="Item 3"></div>
        <div class="campo"><label>Label 4</label><input type="text" placeholder="Item 4"></div>
        <div class="campo"><label>Label 5</label><input type="text" placeholder="Item 5"></div>
        <div class="campo"><label>Label 6</label><input type="text" placeholder="Item 6"></div>
        <div class="campo"><label>Label 7</label><input type="text" placeholder="Item 7"></div>
        <div class="campo"><label>Label 8</label><input type="text" placeholder="Item 8"></div>
        <div class="campo"><label>Label 9</label><input type="text" placeholder="Item 9"></div>
        <div class="campo"><label>Label 10</label><input type="text" placeholder="Item 10"></div>
        <div class="boton-guardar">
          <button type="submit">Guardar</button>
        </div>
      </form>
    </div>
  </section>
      <section id="eliminar"><h1>Eliminar</h1>
      <div class="registro-unico eliminar">

    <!-- Formulario eliminar -->
    <form class="form-eliminar">

      <div class="campo">
        <label for="comboEliminar">Seleccionar opción</label>
        <select id="comboEliminar">
          <option value="">Seleccionar...</option>
          <option value="opcion1">Opción 1</option>
          <option value="opcion2">Opción 2</option>
          <option value="opcion3">Opción 3</option>
        </select>
      </div>

      <div class="campo">
        <label for="datoEliminar1">Label 2</label>
        <input type="text" id="datoEliminar1" placeholder="Item 2">
      </div>

      <div class="campo">
        <label for="datoEliminar2">Label 3</label>
        <input type="text" id="datoEliminar2" placeholder="Item 3">
      </div>

      <!-- Botón eliminar -->
      <div class="boton-eliminar">
        <button type="submit">Eliminar</button>
      </div>

    </form>

  </div>
</section>

    </div>
  </div>

<script>
  // Navegación entre secciones
const links = document.querySelectorAll(".sidebar a");
const sections = document.querySelectorAll("section");

links.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    const id = link.getAttribute("href").substring(1);
    links.forEach(l => l.classList.remove("active"));
    link.classList.add("active");
    sections.forEach(sec => sec.classList.remove("active"));
    document.getElementById(id).classList.add("active");
  });
});

// Menú desplegable de usuario
const userToggle = document.getElementById('userToggle');
const dropdown = document.getElementById('userDropdown');

userToggle.addEventListener('click', () => {
  dropdown.classList.toggle('active');
});

function cambiarFiltro(tipo) {
  // Ocultar todas las tablas
  document.querySelectorAll('#buscar section').forEach(seccion => {
    seccion.style.display = 'none';
  });

  // Mostrar la tabla correspondiente
  if (tipo) {
    const tabla = document.getElementById(`tabla-${tipo}`);
    if (tabla) {
      tabla.style.display = 'block';
    }
  }
}
function filtrarTabla() {
  const texto = document.getElementById("inputBusqueda").value.toLowerCase();

  // Buscar la tabla que esté visible
  const secciones = ['auto', 'estadia', 'viaje'];
  let tablaVisible = null;

  for (let tipo of secciones) {
    const tabla = document.getElementById(`tabla-${tipo}`);
    if (tabla && tabla.style.display !== 'none') {
      tablaVisible = tabla.querySelector("table tbody");
      break;
    }
  }

  if (!tablaVisible) return;

  // Filtrar filas
  const filas = tablaVisible.querySelectorAll("tr");
  filas.forEach(fila => {
    const textoFila = fila.innerText.toLowerCase();
    fila.style.display = textoFila.includes(texto) ? '' : 'none';
  });
}



</script>

</body>
</html>
