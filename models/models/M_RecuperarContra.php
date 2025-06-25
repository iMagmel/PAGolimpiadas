<?php

include_once("./conexionbd.php");

class RecuperarContrasena {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

    public function rec($email) {
        $email = $_POST["email"];
        $bytes = random_bytes(5);
        $token = bin2hex($bytes);
        $codigo = rand(1000, 9999);

        include("./mensajemail.php");

        if($enviado) {
            $sql = "INSERT INTO Contraseñas (email, token, codigo) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email, $token, $codigo]);

            echo "<p>Verifica tu mail para restablecer tu cuenta</p>";
        }
    }

    public function RecuperarContra($email, $codigo) {
        $sql = "SELECT codigo FROM Contraseñas WHERE Email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        include("../models/models/mensajemail.php");
        
        if($result && $result['codigo'] == $codigo) {
            echo "código correcto";
            header("Location: cambiarcontra.php");
            exit();
        } else {
            echo "código incorrecto";
        }
    }
}
?>