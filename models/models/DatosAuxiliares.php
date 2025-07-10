<?php
require_once __DIR__ . '/conexionbd.php';

class DatosAuxiliares {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }


    public function obtenerGeneros() {
        $sql = "SELECT DISTINCT Id_Genero, Genero FROM Genero ORDER BY Genero";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function obtenerTiposDocumento() {
        $sql = "SELECT DISTINCT Id_TipoDoc, TipoDoc FROM dbo.Tipo_Doc ORDER BY TipoDoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

public function obtenerUbicaciones() {
    $sql = "
        SELECT 
            l.Id_Localidad,
            CONCAT(pa.Pais, ' - ', pr.Provincia, ' - ', p.Partido, ' - ', l.Localidad) AS Ubicacion
        FROM Localidad l
        INNER JOIN Partido p ON l.Id_Partido = p.Id_Partido
        INNER JOIN Provincia pr ON p.Id_Provincia = pr.Id_Provincia
        INNER JOIN Pais pa ON pr.Id_Pais = pa.Id_Pais
        ORDER BY pa.Pais, pr.Provincia, p.Partido, l.Localidad
    ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public function usuarioExiste($usuario) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM Usuarios WHERE Usuario = ?");
        $stmt->execute([$usuario]);
        return $stmt->fetchColumn() > 0;
    }

        public function obtenerTipoEstadia() {
            $sql = "SELECT Tipo_Estadia FROM dbo.Estadia";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }
}

?>
