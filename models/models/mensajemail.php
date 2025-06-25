<?php

$para = $email;
$titulo = 'Restablecer password empresa';
$codigo = rand(1000, 9999);

$mensaje = '
<html>
    <head>
        <title>Restablecer</title>
    </head>
    <body>
        <h1>Nombre de la empresa</h1>
        <div>
            <p>Restablecer contraseña</p>
            <h3>'.$codigo.'</h3>
            <p><a href="localhost/PAGolimpiadas/vista/mail.html?Email='.$email.'&Token='.$token.'">
            Para restablecer da click aqui</a></p>
            <p><small>Si usted no envio este codigo, por favor de omitir</small></p>
        </div>
    </body>
</html>
';

$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$enviado = false;

if(mail($para, $titulo, $mensaje, $cabeceras)){
    $enviado = true;
}



?>