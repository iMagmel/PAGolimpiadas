<?php

require_once __DIR__ . "models/models/M_SPLog.php";
require_once __DIR__ . "helpers/Encriptar.php";
    class iniciarsesion {


    function VerifyLog($usuario, $password, $email) {
        
        $clave_ingresada = $_POST["password"];
        $clave_hash = Encriptar :: SHA256($clave_ingresada);
        $modelo = new SP_Login();
        $result = $modelo->login($usuario, $password, $email);

        if ($result && $result["password"] === $clave_hash){
            session_start();
            $_SESSION["Id_Usuario"] = $result ["Id_Usuario"];
            header("Location : vista/index.php");
        } else {
            return "Usuario y contraseña incorrectos.";
        }
    }
}
?>