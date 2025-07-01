<?php
require_once __DIR__ . '/conexionbd.php';

class Viajes {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

    public function getViaje() {
        $sql = "EXEC SP_ObtenerViajes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
