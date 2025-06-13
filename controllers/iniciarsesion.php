<?php

require_once __DIR___ . "models/models/M_SPLog.php";

    function VerifyLog($usuario, $password, $email) {
        $models = new SP_Login();
        $result = $modelo->login($usuario, $password, $email);

        if ($resullt){
            session_start();
            $_SESSION["Id_Usuario"] = $resullt ["Id_Usuario"];
            $_SESSION["Id_Rol"] =  $result ["Id_Rol"]

            header("Location : vista/index.php")
        }
    }
?>