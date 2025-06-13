<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "controllers/iniciarsesion.php";
   
    $log = iniciarsesion::VerifyLog($_POST["usuariol"], $_POST["passwordl"], $_POST["emaill"]);  
}
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "controllers/registrarusu.php";
    $log = registrarusu::Registro($_POST["nombrer"], $_POST["apellidor"], $_POST["tipodocumentor"],
     $_POST["documentor"], $_POST["localidadr"], $_POST["generor"], $_POST["sexor"], $_POST["nacimientor"],
      $_POST["telofonor"], $_POST["emailr"], $_POST["usuarior"], $_POST["contrasenar"]);  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="forms-container">
            <div class="forms" id="forms">
                <?php if ($error): ?>
                    <P style="color: red;"><?= $error ?></P>
                <?php endif;  ?>
                <form action="" id="sign-in" method = "POST">
                    <h2>login</h2>
                    <p>¿No tenes una cuenta? <a href="#" id="link-sing-in">Crear Cuenta</a></p>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="you@example.com">
                    </div>
                    <div class="input-container">
                        <label for="usuario">usuario</label>
                        <input id="usuario" type="usuario" placeholder="ingrese el nombre del usuario">
                    </div>
                    <div class="input-container">
                        <div class="forget">
                            <label for="password">Contraseña</label>
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        
                        <input id="password" type="password" placeholder="enter 5 characters or more">
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox">Mostrar Contraseña</label>
                    </div>
                    
                    <button>Iniciar Sesion</button>

                    <div class="line-width-text">
                        <span>or login with</span>
                    </div>

                    <br><br>

                </form>
                <form action="controllers/registrarusu.php" method="POST" id="sign-up">
                    <br><br>
                    <h2>Registro</h2>
                    <p>¿Ya tenes tu cuenta? <a href="#" id="link-sing-up">Iniciar Sesion</a></p>

                    <div class="input-container">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" name="nombrer" placeholder="Ingrese tu nombre">
                    </div>

                    <div class="input-container">
                        <label for="pais">Pais</label>
                        <input id="pais" type="pais" name="nombrer" placeholder="Ingrese su nacionalidad">
                    </div>

                    <div class="input-container">
                        <label for="pais">Seleccione su sexo</label>
                        <select name="sexor">
                            <option value="" disabled selected>Seleccione su sexo</option>
                            <option value="femenino">F</option>
                            <option value="masculino">M</option>
                            <option value="otro">otro</option>
                        </select>                       
                    </div>
                    <div class="input-container">
                        <label for="pais">Pais</label>
                        <input id="pais" type="pais" name="paisr" placeholder="Ingrese su nacionalidad">
                    </div>
                    <div class="input-container">

                        <select name="documento_seleccionado">
                            <option value="" disabled selected>Seleccione tipo de documento</option>
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                        <label for="documento">Documento </label>
                        <input  type="number" name="documentor" placeholder="Ingrese el número de documento">
                        

                    </div>

                    <div class="input-container">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" placeholder="Ingrese tu nombre">
                    </div>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="you@example.com">
                    </div>
                    <div class="input-container">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" type="usuario" placeholder="ingrese el nombre del usuario">
                    </div>
                    <div class="input-container">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="enter 5 characters or more">
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox">Mostrar contraseña</label>
                    </div>
                    <div class="input-container">
                        <label for="password"> Repetir contraseña</label>
                        <input id="password" type="password" placeholder="enter 5 characters or more">
                    </div>
                    
                    <button class="btn-register">Crear mi cuenta</button>

                   
                </form>
            </div>
        </div>
        <div class="banner">
            <div class="shape shape1"></div>
            <div class="shape shape2"></div>
            <div class="shape shape3"></div>
            <section>
                <h1>Bienvenido a tu <span>proxima ruta</span> </h1>
                <p>Registrate para tener tu cuenta</p>
                <img src="/images/banner.svg" alt="">
            </section>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sign" id="btn-sign-in">
                <img src="icons/crown.svg" alt="">
                <span>Registrarme</span>
            </div>
            <div class="sign"id="btn-sign-un">
                <img src="icons/rule.svg" alt="">
                <span>Registrarme</span>
            </div>
        </div>
    </div>



    <script src="scripts.js"></script>
</body>
</html>