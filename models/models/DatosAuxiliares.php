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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTiposDocumento() {
        $sql = "SELECT DISTINCT Id_TipoDoc, TipoDoc FROM dbo.Tipo_Doc ORDER BY TipoDoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerLocalidadesJerarquia() {
        $sql = "
            SELECT DISTINCT
                L.Id_Localidad, 
                P.Pais, 
                Pr.Provincia, 
                Pa.Partido, 
                L.Localidad AS NombreCompleto
            FROM dbo.Localidad L
            INNER JOIN dbo.Partido Pa ON L.Id_Partido = Pa.Id_Partido
            INNER JOIN dbo.Provincia Pr ON Pa.Id_Provincia = Pr.Id_Provincia
            INNER JOIN dbo.Pais P ON Pr.Id_Pais = P.Id_Pais
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

  public function obtenerLoc() {
    $sql = "SELECT 
                L.Id_Localidad,
                ISNULL(PS.Pais, '') + ', ' + ISNULL(PR.Provincia, '') + ', ' + ISNULL(PA.Partido, '') + ', ' + ISNULL(L.Localidad, '') AS NombreCompleto
            FROM dbo.Localidad L
            JOIN dbo.Partido PA ON L.Id_Partido = PA.Id_Partido
            JOIN dbo.Provincia PR ON PA.Id_Provincia = PR.Id_Provincia
            JOIN dbo.Pais PS ON PR.Id_Pais = PS.Id_Pais
            ORDER BY NombreCompleto";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
