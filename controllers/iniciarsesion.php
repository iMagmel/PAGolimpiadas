<?php
require_once __DIR__ . '/../models/models/M_SPLog.php';
require_once __DIR__ . '/../helpers/Encriptar.php';
class iniciarsesion {
    public function VerifyLog($usuario, $password, $email) {
        $clave_hash = Encriptar::SHA256($password); 

        $modelo = new SP_Login();
        $stmt = $modelo->login($usuario, $clave_hash, $email);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && $result["Id_Usuario"]) {
            session_start();
            $_SESSION["Id_Usuario"] = $result["Id_Usuario"];
            $_SESSION["Id_Rol"] = $result["Id_Rol"];
            header("Location: ../vista/index.html");
            exit();
        } else {
            return "Usuario y contraseña incorrectos o email no confirmado.";
        }
    }
}   
?>
