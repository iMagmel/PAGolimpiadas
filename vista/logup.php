<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "/../controllers/registrarusu.php"; 

    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $usuario = $_POST['usuario'] ?? ''; 
    $sexo = $_POST['sexo'] ?? '';
    $id_genero = $_POST['genero'] ?? '';
    $id_localidad = $_POST['localidad'] ?? '';
    $id_tipo_doc = $_POST['tipodoc'] ?? '';
    $documento = $_POST['doc'] ?? '';
    $fecha_nacimiento = $_POST['fnacimiento'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['contraseña'] ?? '';

    $reg = new registrarusu();
    $error =  $reg->RegistrarUsuario(
        $nombre, 
        $apellido, 
        $usuario, 
        $sexo, 
        $id_genero, 
        $id_localidad, 
        $id_tipo_doc, 
        $documento, 
        $fecha_nacimiento, 
        $email, 
        $password
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style.css" />
  <title>Registrarse | SkyWay</title>
</head>
<body>
  <div class="container" id="container">
    <div class="forms-container">
      <div class="forms" id="forms">
      
        <!-- REGISTRO -->
        <form action="" id="sign-up" class="form-register" method = "POST">

          <h2>Registrarse</h2>
          <p>¿Ya tenes cuenta?<a href="login.php" id="link-sing-up">Inicia sesión</a></p>

          <div class="input-container">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" placeholder="Ingrese su nombre">
          </div>

          <div class="input-container">
            <label for="nombre">Apellido</label>
            <input id="nombre" type="text" name = "apellido" placeholder="Ingrese su apellido">
          </div>

          <div class="input-container">
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" placeholder="ingrese el nombre del usuario" name = "usuario">
          </div>

          <div class="input-container">
            <label for="sexo">Seleccione su sexo</label>
            <select name = "sexo">
              <option value="" disabled selected>Seleccione su sexo</option>
              <option value="1">F</option>
              <option value="2">M</option>
              
            </select>
          </div>
          <div class="input-container">
            <label for="genero">Seleccione su genero</label>
            <select name="Genero" name = "genero">
              <option value="" disabled selected>Seleccione su genero</option>
              <option value="1">Femenino</option>
              <option value="2">Masculino</option>
              <option value="3">No binario</option>
            </select>
          </div>


          <div class="input-container">
            <label for="pais">Pais</label>
            <input id="pais" type="text" placeholder="Ingrese su nacionalidad" name = "localidad">
          </div>

          <div class="input-container">
            <label for="documento">Tipo y número de documento</label>
            <select name="documento_seleccionado" name = "tipodoc">
              <option value="" disabled selected>Seleccione tipo de documento</option>
              <option value="1">DNI</option>
              <option value="2  ">Pasaporte</option>
            </select>
            <input type="number" placeholder="Ingrese el número de documento" name = "doc">
          </div>

          <div class="input-container">
            <label for="pais">Fecha de nacimiento</label>
            <input id="pais" type="date" placeholder="Indique su nacimiento (dd/mm/aaaa)" name = "fnacimiento">
          </div>

          <div class="input-container">
            <label for="email">Direccion Email</label>
            <input id="email" type="email" placeholder="you@example.com" name = "email">
          </div>



          <div class="input-container">
            <label for="password">Contraseña</label>
            <input id="password" type="password" placeholder="enter 5 characters or more" name = "contraseña">
          </div>

          <div class="remember-me">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Mostrar contraseña</label>
          </div>

          <button type="submit" class="btn-sign-un"> Confirmar registro </button>

            <div >
                  <a href="index.html" class="btn-sign-un"> Volver al Inicio</a>
            </div>
                <?php if ($error): ?>
                    <div class="error-message" style="color:red; margin-top:10px;">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
        </form>
      </div>
    </div>

    <div class="banner">
      <div class="shape shape1"></div>
      <div class="shape shape2"></div>
      <div class="shape shape3"></div>
      <section>
        <h1>bienvenido a tu <span>proxima ruta</span></h1>
        <p>login tu acces your account</p>
        <img src="/images/banner.svg" alt="">
      </section>
    </div>

    <div class="sidebar" id="sidebar">
      <!-- <div class="sign" id="btn-sign-in">
        <img src="icons/crown.svg" alt="">
        <span>Sign in</span>
      </div>
      <div class="sign" id="btn-sign-un">
        <img src="icons/rule.svg" alt="">
        <span>Sign up</span>
      </div>
    </div> -->
  </div>

  <script src="scripts.js"></script>
</body>
</html>
