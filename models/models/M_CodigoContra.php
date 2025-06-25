<?php
include_once("./conexionbd.php");

class Codigocontra {
    private $email;
    private $token;
    private $codigo;
    private $conn;

    public function __construct() {
        $this->email = $_POST["email"] ?? '';
        $this->token = $_POST["token"] ?? '';
        $this->codigo = $_POST["codigo"] ?? '';
        $this->conn = Conexion::ConexionBD();
    }
    
    public function codigo() {
        try {
            $sql = "SELECT * FROM Contraseñas WHERE email = ? AND token = ? AND codigo = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$this->email, $this->token, $this->codigo]);

            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
                $fecha = $fila['fecha']; // Asumo que la columna se llama 'fecha'
                $fecha_actual = date("Y-m-d H:i:s");

                $seconds = strtotime($fecha_actual) - strtotime($fecha);
                $minutos = $seconds / 60;

                if ($minutos > 30) {
                    echo "token vencido";
                } else {
                    echo "todo correcto";
                    header("Location: /olvidarcontra.html");
                    exit();
                }
            } else {
                echo "código incorrecto";
            }
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }
}
?>