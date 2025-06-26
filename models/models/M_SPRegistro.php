<?php
require_once __DIR__ . "/conexionbd.php";

class SP_Registrar {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::ConexionBD();
    }

    public function Registro($nombre, $apellido, $id_tipo_doc, $documento,
                             $id_localidad, $id_genero, $sexo,
                             $fecha_recibida, $email, $usuario, $password, $id_rol) {
        try {
            $fecha_recibida = trim($fecha_recibida);

            if (empty($fecha_recibida)) {
                return "Error: la fecha está vacía.";
            }

            // Validación simplificada y robusta de fecha
            $fecha_obj = DateTime::createFromFormat('Y-m-d', $fecha_recibida);
            if (!$fecha_obj || $fecha_obj->format('Y-m-d') !== $fecha_recibida) {
                return "Error: La fecha recibida no es válida o no está en formato YYYY-MM-DD.";
            }

            // Obtener Id_Pais desde Id_Localidad
            $sqlPais = "
                SELECT p.Id_Pais
                FROM Localidad l
                JOIN Partido pa ON l.Id_Partido = pa.Id_Partido
                JOIN Provincia pr ON pa.Id_Provincia = pr.Id_Provincia
                JOIN Pais p ON pr.Id_Pais = p.Id_Pais
                WHERE l.Id_Localidad = ?
            ";
            $stmtPais = $this->conn->prepare($sqlPais);
            $stmtPais->execute([$id_localidad]);
            $rowPais = $stmtPais->fetch(PDO::FETCH_ASSOC);

            if (!$rowPais || !isset($rowPais['Id_Pais'])) {
                return "Error: No se pudo obtener el país desde la localidad.";
            }

            $id_pais = $rowPais['Id_Pais'];

            // Usar hash sha256 correctamente
            $password_hash = hash("sha256", $password);

            // Llamada al procedimiento almacenado con parámetros
            $sql = "DECLARE @registrado BIT;
                    EXEC SP_RegistroUsuario ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @registrado OUTPUT;
                    SELECT @registrado AS registrado;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $nombre,
                $apellido,
                $documento,
                $id_tipo_doc,
                $id_genero,
                $sexo,
                $fecha_obj->format('Y-m-d'),
                $email,
                $usuario,
                $password_hash,
                $id_rol,
                $id_pais
            ]);

            // Mover al siguiente result set para capturar el valor output
            $stmt->nextRowset();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado === false) {
                return header("Location: ../vista/login.php");
                exit();
            }

            if (isset($resultado['registrado'])) {
                return $resultado['registrado'] == 1 ? true : "El correo electrónico ya está registrado.";
            } else {
                return "Resultado inesperado: no se encontró el campo 'registrado'.";
            }

        } catch (PDOException $e) {
            return "Error al registrar usuario: " . $e->getMessage();
        }
    }
}
?>
