<?php
require_once __DIR__ . '/conexionbd.php';

class Viajes {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

public function getViaje() {
    try {
        $sql = "EXEC SP_ObtenerViajes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$datos) {
            throw new Exception("No se devolvieron viajes desde la BD.");
        }

        return $datos;
    } catch (Exception $e) {
        die("Error al obtener viajes: " . $e->getMessage());
    }
}


}
?>
