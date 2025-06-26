<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css"/>
    <title>Iniciar sesión | SkyWay</title>
</head>
<body>


<div class="container" id="container">
    <div class="forms-container">
        <div class="forms" id="forms">
            <form method="POST" action="" id="sign-in">
                <h2>Recuperar cuenta</h2>
                <p>Por favor, ingrese su correo electronico para enviar la <b>verificacion numerica</b></p>
                <div class="input-container">
                    <label for="email">Direccion Email</label>
                    <input id="email" name="email" type="email" placeholder="you@example.com" />
                </div>

               <a href="olvidarcontra.html"><button type="submit" class="button"> Siguiente </button></a> 

                <p>¿No tenes cuenta? <a href="logup.php" id="link-sing-in">Registrarte</a></p>

            </form>
        </div>
    </div>

    <div class="banner">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
        <section>
            <h1>bienvenido a tu <span>proxima ruta</span> </h1>
            <p>login tu acces your account</p>
            <img src="/images/banner.svg" alt="" />
        </section>
    </div>

    <div class="sidebar" id="sidebar"></div>
</div>


</body>
</html>
