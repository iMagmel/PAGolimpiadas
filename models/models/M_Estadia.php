<?php
require_once __DIR__ . '/conexionbd.php';

class Estadia {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

    public function getEstadia() {
        $sql = "EXEC SP_ObtenerEstadia";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
