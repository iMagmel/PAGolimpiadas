<?php

session_start();

if(isset($_POST["btnsubmit"])){
    
    if($_POST["usuario"] == $usuario && $_POST["password"] == $contrasena){

        $_SESSION["usuario"] = $usuario;
        $_SESSION["email"] = $email;
        $_SESSION["isLogged"] = true;

    }

    if(isset($_SESSION["isLogged"])){
        if($_SESSION["isLogged"] === true){
            echo ("inicio sesion!" $_SESSION["user"])
        }
        
    }

}

    var_dump($_SESSION);

?>