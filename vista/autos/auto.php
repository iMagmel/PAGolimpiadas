<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Autos para Todos</title>
  <link rel="stylesheet" href="auto.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="logo">🚗 Autos para tu aventura</div>
    <nav>
      <a href="../pagprincipal/index.php">Inicio</a>
      <a href="#familiares">Familiares</a>
      <a href="#lujo">Lujo</a>
      <a href="#economicos">Económicos</a>
    </nav>
  </header>

  <section class="hero">
    <div class="overlay">
      <h1>Encuentra el auto perfecto</h1>
      <p>Autos para cada estilo de vida: familia, lujo o economía.</p>
    </div>
  </section>

  <section class="categorias">
    <h2>Explora nuestras categorías</h2>
    <div class="botones">
      <button onclick="filtrarCategoria('todos')">Todos</button>
      <button onclick="filtrarCategoria('familiar')">Familiares</button>
      <button onclick="filtrarCategoria('lujo')">Lujo</button>
      <button onclick="filtrarCategoria('economico')">Económicos</button>
    </div>
  </section>

<section class="autos" id="autos">
  <!-- Familiares -->
  <div class="auto-card familiar" onclick="mostrarDetalles(this)">
    <h3>Familiar Comfort</h3>
    <p class="resumen">Cómodo y seguro para toda la familia.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Toyota Corolla Cross 2023</p>
      <p><strong>Motor:</strong> 2.0L - 170 CV</p>
      <p><strong>Transmisión:</strong> Automática CVT</p>
      <p><strong>Capacidad:</strong> 5 pasajeros</p>
      <p><strong>Consumo:</strong> 7.1 L/100km</p>
    </div>
  </div>

  <div class="auto-card familiar" onclick="mostrarDetalles(this)">
    <h3>Familiar Plus</h3>
    <p class="resumen">Espacioso y moderno para viajes largos.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Chevrolet Spin LTZ 2023</p>
      <p><strong>Motor:</strong> 1.8L - 105 CV</p>
      <p><strong>Capacidad:</strong> 7 pasajeros</p>
      <p><strong>Transmisión:</strong> Manual 5 velocidades</p>
      <p><strong>Extras:</strong> Tercera fila de asientos</p>
    </div>
  </div>

  <div class="auto-card familiar" onclick="mostrarDetalles(this)">
    <h3>Familiar EcoVan</h3>
    <p class="resumen">Ideal para familias numerosas y viajes.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Renault Kangoo Stepway</p>
      <p><strong>Motor:</strong> 1.6L - 115 CV</p>
      <p><strong>Transmisión:</strong> Manual 6 velocidades</p>
      <p><strong>Capacidad:</strong> 5 pasajeros + gran baúl</p>
    </div>
  </div>

  <!-- Lujo -->
  <div class="auto-card lujo" onclick="mostrarDetalles(this)">
    <h3>Lujo Supreme</h3>
    <p class="resumen">Diseño sofisticado y tecnología de punta.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> BMW Serie 5 2024</p>
      <p><strong>Motor:</strong> 2.0L Turbo - 250 CV</p>
      <p><strong>Transmisión:</strong> Automática 8 velocidades</p>
      <p><strong>Interior:</strong> Cuero, pantalla 12”</p>
    </div>
  </div>

  <div class="auto-card lujo" onclick="mostrarDetalles(this)">
    <h3>Elegance Premium</h3>
    <p class="resumen">Para quienes exigen lo mejor.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Mercedes-Benz C300 AMG</p>
      <p><strong>Motor:</strong> 2.0L Turbo - 258 CV</p>
      <p><strong>Suspensión:</strong> Adaptativa</p>
      <p><strong>Extras:</strong> Cámara 360°, asistente en ruta</p>
    </div>
  </div>

  <div class="auto-card lujo" onclick="mostrarDetalles(this)">
    <h3>Lujo Eléctrico</h3>
    <p class="resumen">Movilidad premium con energía limpia.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Tesla Model 3 Long Range</p>
      <p><strong>Autonomía:</strong> 580 km</p>
      <p><strong>Tracción:</strong> Integral AWD</p>
      <p><strong>0-100 km/h:</strong> 4.4 segundos</p>
    </div>
  </div>

  <!-- Económicos -->
  <div class="auto-card economico" onclick="mostrarDetalles(this)">
    <h3>Económico Plus</h3>
    <p class="resumen">Movilidad accesible y práctica.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Renault Kwid 2022</p>
      <p><strong>Motor:</strong> 1.0L - 66 CV</p>
      <p><strong>Transmisión:</strong> Manual 5 velocidades</p>
      <p><strong>Consumo:</strong> 5.4 L/100km</p>
    </div>
  </div>

  <div class="auto-card economico" onclick="mostrarDetalles(this)">
    <h3>Ciudadano Compacto</h3>
    <p class="resumen">Perfecto para trayectos urbanos.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Fiat Mobi Like</p>
      <p><strong>Motor:</strong> 1.0L Firefly - 75 CV</p>
      <p><strong>Capacidad:</strong> 5 pasajeros</p>
      <p><strong>Extras:</strong> Aire, dirección asistida, USB</p>
    </div>
  </div>

  <div class="auto-card economico" onclick="mostrarDetalles(this)">
    <h3>EcoCity</h3>
    <p class="resumen">Bajo consumo y fácil de estacionar.</p>
    <div class="detalles">
      <p><strong>Modelo:</strong> Peugeot 208 Like</p>
      <p><strong>Motor:</strong> 1.2L PureTech - 82 CV</p>
      <p><strong>Consumo:</strong> 5.2 L/100km</p>
      <p><strong>Transmisión:</strong> Manual</p>
    </div>
  </div>
</section>

  <footer id="contacto">
    <p>© 2023 SkyWay Travel. Todos los derechos reservados.</p>
    <nav class="footer-links">
      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=skywayturismos@gmail.com" target="_blank">
        Deja tu mensaje! (skywayturismos@gmail.com)
      </a>
      <a href="https://www.argentina.gob.ar/normativa/nacional/decreto-2182-1972-18905/texto" target="_blank" rel="noopener noreferrer">Decreto N°2182</a>
    </nav>
  </footer>

  <script src="filtro.js"></script>
</body>
</html>
