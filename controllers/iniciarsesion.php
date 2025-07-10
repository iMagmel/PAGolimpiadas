<?php
require_once __DIR__ . '/../models/models/M_SPLog.php';
require_once __DIR__ . '/../helpers/Encriptar.php';
require_once __DIR__ . '/../helpers/PHPmailer.php';

class iniciarsesion {
public function VerifyLog($usuario, $password, $email) {

    if (empty($usuario) || empty($password) || empty($email)) {
        return "Todos los campos son obligatorios.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "El formato del email no es válido.";
    }

    $clave_hash = Encriptar::SHA256($password); 

    $modelo = new SP_Login();
    $stmt = $modelo->login($usuario, $clave_hash, $email);


    $result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result && isset($result["Id_Usuario"])) {

if ($result["Email_Confirmado"] == 0) {

    $cod = rand(1000, 9999);

    $conn = Conexion::ConexionBD();

    $sql = 'UPDATE Usuarios SET Codigo_Verificacion = ? WHERE Id_Usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cod, $result["Id_Usuario"]]);

    PHPMailers::enviarCode($result["Email"], $cod);

    session_start();
    $_SESSION["usuario_verificacion"] = $result["Id_Usuario"];

    header("Location: /PAGolimpiadas/vista/iniciosesion/V_CodigoContra.php");
    exit();

}


    session_start();
    $_SESSION["Id_Usuario"] = $result["Id_Usuario"];
    $_SESSION["nombre"] = $result["Nombre"]; 
    $_SESSION["usuario"] = $result["Usuario"];
    $_SESSION["Id_Rol"] = $result["Id_Rol"];

    if ($_SESSION["Id_Rol"] == 1) {
        header("Location: /PAGolimpiadas/controllers/C_Agregar.php");
        exit();
    } else if ($_SESSION["Id_Rol"] == 2) {
        header("Location: /PAGolimpiadas/vista/pagprincipal/index.php");
        exit();
    }
} else {
    return "Usuario y contraseña incorrectos.";
            }
    }
}
?>
