<?php
require_once __DIR__ . "models/models/conexionbd.php";


class SP_Login{
    private $conn;
    public function __construct(){
        $this->conn=Conexion::ConexionBD()
    }

    public function login($usuario, $password, $email) {
        $sql = "EXEC SP_Login ?, ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute[($usuario, $password, $email)];
        
        return $stmt;
    }
}
?>