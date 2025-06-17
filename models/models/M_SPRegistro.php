<?php
require_once __DIR__ . "/conexionbd.php";

class SP_Registrar {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

    public function Registro($nombre, $apellido, $id_tipo_doc, $documento, $id_localidad, $id_genero, $sexo, 
                            $fecha_nacimiento, $email, $usuario, $password) {
        try {
            $sql = "EXEC SP_RegistroUsuario ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
            
            
            $password_hash = hash('sha256', $password);

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $nombre, $apellido, $usuario, $sexo,
                $id_genero, $id_localidad, $id_tipo_doc,
                $documento, $fecha_nacimiento, $email, $password_hash
            ]);

            return ""; 

        } catch (PDOException $e) {
           return "Error al registrar usuario: " . $e->getMessage();
        }
    }
}
?>
