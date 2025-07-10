  <?php
  require_once __DIR__ . '/../../controllers/C_Viajes.php';
  if (PHP_SESSION_NONE === session_status()) {
      session_start();
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <title>Destinos</title>

      <link rel="stylesheet" href="paquetes.css">
  </head>
  <body>
  <header>
    <div class="header-container">
      <div class="logo">
        <h2>SkyWay Travel</h2>
      </div>

      <nav class="nav-bar">
        <ul class="nav-links">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Contactos</a></li>
        </ul>
      </nav>

        <div class="icons">
      <a href="#"><i class='bx bx-cart'></i></a>

  <div class="login-dropdown">
        <a href="#" class="login-btn"><i class='bx bx-user-circle'></i></a>
        <div class="login-menu">
          
            <?php if (!isset($_SESSION['Id_Usuario'])): ?>
              <a href="/PAGolimpiadas/vista/iniciosesion/login.php">Iniciar sesión</a>
              <a href="/PAGolimpiadas/controllers/logupController.php">Registrarte</a>
            <?php else: ?>
              <p style="margin: 0.5em 1em; font-weight: bold;">
                Mi cuenta: <?php echo htmlspecialchars($_SESSION['nombre'] ?? $_SESSION['usuario'] ?? 'usuario'); ?>
              </p>
              <a href="/PAGolimpiadas/controllers/logout.php" class="button">Cerrar sesión</a>
            <?php endif; ?>
        </div>
      </div>

    </div>
  </header>
  <br><br><br><br><br>

  <div class="productos-container">

  <h2 class="titulo-seccion">Destinos disponibles</h2>
  <div class="productos-container">

    <?php foreach ($viajes as $via): ?>
      <div class="producto">
        <div class="producto-info">
          <h3><?php echo htmlspecialchars($via['Destino']); ?></h3>
          <p><?php echo htmlspecialchars($via['Descripcion']); ?></p>
          <p><strong>Salida:</strong> <?php echo $via['Fecha_Salida']; ?> | 
            <strong>Vuelta:</strong> <?php echo $via['Fecha_Vuelta']; ?></p>
          <button class="btn-agregar" onclick="redirigir()">Agregar al carrito</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>


  </div>

  <br><br><br><br>


  <footer>
      <p>© 2023 SkyWay Travel. Todos los derechos reservados.</p>
      <nav class="footer-links">
        <a href="#contacto">Contacto</a>
        <a href="#">Políticas de cancelación</a>
        <a href="https://www.argentina.gob.ar/normativa/nacional/decreto-2182-1972-18905/texto" target="_blank"
          rel="noopener noreferrer">Decreto N°2182</a>
      </nav>
    </footer>
  <script>

    function redirigir() {
    window.location.href = "/PAGolimpiadas/vista/estadia/estadia.php";
  }

  </script>
  </body>
  </html>