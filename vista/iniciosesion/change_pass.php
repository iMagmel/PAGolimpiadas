<?php
session_start();
if (!isset($_SESSION['recuperar_email'])) {
  header("Location: /PAGolimpiadas/vista/iniciosesion/forget_pass.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Nueva contraseña</title>
  <link rel="stylesheet" href="/../PAGolimpiadas/vista/css/mail.css">
</head>
<body>

  <form class="form-validacion" method="POST" action="../../controllers/CambioContraseña.php">
    <h2>Restablecer contraseña</h2>

    <p class="descripcion-principal">
      Ingresá y confirmá tu nueva contraseña para acceder nuevamente a tu cuenta.
    </p>

    <input type="password" name="nueva" placeholder="Nueva contraseña" required>
    <input type="password" name="confirmar" placeholder="Confirmar contraseña" required>

    <button type="submit">Cambiar contraseña</button>

    <p class="descripcion-secundaria">
      Recordá que la nueva contraseña reemplazará la anterior inmediatamente.
    </p>
  </form>

</body>
</html>
