<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/carrito.css">
  <link rel="stylesheet" href="../css/styles.css">


  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <title>Inicio | SkyWay </title>
</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <h2>SkyWay Travel</h2>
      </div>

      <nav class="nav-bar">
        <ul class="nav-links">
          <li><a href="#inicio">Inicio</a></li>
          <li class="dropdown">
            <a href="#servicios">Servicios</a>
            <ul class="dropdown-menu">
              <li><a href="#servicios">Combos de viajes</a></li>
              <li><a href="#servicios">Alquiler de autos</a></li>
              <li><a href="#servicios">Estadías</a></li>
            </ul>
          </li>
              <li><a href="#contacto">Contacto</a></li>

        </ul>
      </nav>

      <div id = "inicio" class="icons">
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
  </header>
  <main>
    
    <section id="nosotros" style="view-timeline-name: --section-nojs">
      <header>
        <h1>Acerca de SkyWay Travel</h1>
        <i class="fas fa-globe-americas world-icon"></i>
        <p>¡Descubre el mundo con SkyWay Travel!</p>
      </header>

      <div class="div-padre">
        <div class="columna">
          <h3>Tu aventura, nuestra pasión.</h3>
          <p>En SkyWay, creemos que cada viaje es una historia por contar. Nos dedicamos a diseñar experiencias únicas
            que conectan a los viajeros con los destinos más increíbles. Nos apasiona transformar sueños en itinerarios
            inolvidables, cuidando cada detalle para que tu aventura sea perfecta.</p>
        </div>
        <div class="columna">
          <h3>¿Por qué elegirnos?</h3>
          <p>No vendemos viajes, creamos recuerdos.</p>
          <ul>
            <li>Experiencias Personalizadas: Desde viajes en familia hasta escapadas románticas o aventuras extremas,
              creamos paquetes a tu medida.</li>
            <li>Compromiso con la Sostenibilidad: Promovemos un turismo responsable que respeta culturas locales y
              medio ambiente.</li>
            <li>Atención 24/7: Soporte continuo antes, durante y después de tu viaje.</li>
            <li>Enviamos ofertas imperdibles a nuestros usuarios.</li>
          </ul>
        </div>
      </div>
    </section>

    <?php if (!isset($_SESSION['Id_Usuario'])): ?>
    <section id="log" style="view-timeline-name: --section-scrollstate">
      <header>
        <h1>¿Tienes una cuenta o querés registrarte?</h1>
        <p>Accedé a tu cuenta para ver tus reservas, gestionar tus viajes o registrate y comenzá a planear tu próxima
          aventura con SkyWay Travel.</p>
        <div class="boton-centro">
          <button>
            <a href="/../PAGolimpiadas/vista/iniciosesion/login.php"> <i class='bx bx-log-in-circle'></i> Iniciar / Registrar </a>
          </button>
        </div>
      </header>
    </section>
    <?php endif; ?>




    <section id="servicios" style="view-timeline-name: --section-nojs">
      <header>
        <h1>Servicios & Paquetes</h1>
      </header>

      <div class="cards-container">
        <div class="card">
          <i class='bx bx-package icon'></i>
          <h3>Combos de viajes</h3>
          <p>
            Explora nuestras ofertas exclusivas de combos de viajes que combinan transporte, alojamiento y actividades
            para que vivas la experiencia completa sin preocupaciones.
          </p>
          <button class="btn-outline"><a href="../paquetes/paquetes.html">Ver más</a></button>
        </div>


        <div class="card">
          <i class='bx bx-car icon'></i>
          <h3>Alquiler de autos</h3>
          <p>
            Elige entre una amplia variedad de autos modernos y seguros para recorrer tu destino a tu ritmo. Tarifas
            competitivas y servicio de primera garantizados.
          </p>
          <button class="btn-outline"><a href="../autos/autos.html">Ver más</a></button>
        </div>


        <div class="card">
          <i class='bx bx-bed icon'></i>
          <h3>Estadía</h3>
          <p>
            Reserva estadías en hoteles confortables y acogedores para descansar tras un día lleno de aventuras. Calidad
            y comodidad en cada alojamiento seleccionado.
          </p>
          <button class="btn-outline"><a href="../estadia/estadia.php">Ver más</a></button>
        </div>
      </div>
    </section>

  </main>

  <footer id="contacto">
  <p>© 2023 SkyWay Travel. Todos los derechos reservados.</p>
  <nav class="footer-links">
    <a id = "contacto" href="https://mail.google.com/mail/?view=cm&fs=1&to=skywayturismos@gmail.com" target="_blank">
  Deja tu mensaje! (skywayturismos@gmail.com)
</a>
    <a href="https://www.argentina.gob.ar/normativa/nacional/decreto-2182-1972-18905/texto" target="_blank" rel="noopener noreferrer">Decreto N°2182</a>
  </nav>
</footer>


</body>

</html>