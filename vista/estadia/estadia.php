<?php
require_once __DIR__ . '/../../controllers/C_Estadia.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$estadiaModel = new Estadia();
$estadias = $estadiaModel->getEstadia();

$estadiasAgrupadas = [];
foreach ($estadias as $estadia) {
    $tipo = $estadia['Tipo_Estadia'];
    $estadiasAgrupadas[$tipo][] = $estadia;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estadia.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Estadías | SkyWay</title>
</head>
<body>
<header>
  <div class="header-container">
    <div class="logo">
      <h2>SkyWay Travel</h2>
    </div>
    <nav class="nav-bar">
      <ul class="nav-links">
        <li><a href="/PAGolimpiadas/vista/pagprincipal/index.php">Inicio</a></li>
        <li><a href="#contacto">Contacto</a></li>
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
              Mi cuenta: <?php echo htmlspecialchars($_SESSION['nombre'] ?? $_SESSION['usuario'] ?? 'Usuario'); ?>
            </p>
            <a href="/PAGolimpiadas/controllers/logout.php" class="button">Cerrar sesión</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</header>

<main>
  <?php foreach ($estadiasAgrupadas as $tipo => $grupo): ?>
    <h2 class="subtitulo"><?php echo htmlspecialchars($tipo); ?></h2>
    <section class="tarjetas-texto">
      <?php foreach ($grupo as $est): ?>
        <article class="tarjeta">
          <h3><?php echo htmlspecialchars($est['Estadia']); ?></h3>
          <p>
            Dirección: <?php echo htmlspecialchars($est['Calle']) . ' ' . $est['Nro']; ?>,
            Piso <?php echo $est['Piso']; ?>, Depto <?php echo $est['Depto']; ?>
          </p>
          <div class="estrellas"></div>
          <button onclick = "redirigir()">Agregar al carrito</button>
        </article>
      <?php endforeach; ?>
    </section>
    <br><br><br>
  <?php endforeach; ?>
</main>

<footer id="contacto">
  <p>© 2023 SkyWay Travel. Todos los derechos reservados.</p>
  <nav class="footer-links">
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=skywayturismos@gmail.com" target="_blank">
      📧 Deja tu mensaje! (skywayturismos@gmail.com)
    </a>
    <a href="https://www.argentina.gob.ar/normativa/nacional/decreto-2182-1972-18905/texto" target="_blank" rel="noopener noreferrer">
      Decreto N°2182
    </a>
  </nav>
</footer>
</body>
<script>  
function redirigir() {
    window.location.href = "/PAGolimpiadas/vista/carrito/carro.php";
}
</script>
</html>
