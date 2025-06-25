<?php

include_once("./conexionbd.php");

class ReseatearContra {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

    public function CambiarContra($email, $Contraseña, $VContraseña) {
        if ($Contraseña === $VContraseña) {
            $sql = "UPDATE Usuarios SET contraseña = ? WHERE Email = ?";
            $stmt = $this->conn->prepare($sql);

            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . $this->conn);
            }

            $hash = password_hash($Contraseña, PASSWORD_DEFAULT);

            $stmt->execute([$hash, $email]);

            include("./mensajemail.php");

            echo "✅ Contraseña cambiada";
            header("Location: login.php");
            exit();
        } else {
            echo "Las contraseñas no coinciden";
        }
    }
}

?>





?>