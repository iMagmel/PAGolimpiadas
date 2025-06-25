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
//         var_dump($fecha_recibida);
// exit;


// bool in
// C:\xampp\htdocs\PAGolimpiadas\models\models\M_SPRegistro.php
// on line
// 24


// Warning
// : Trying to access array offset on value of type bool in
// C:\xampp\htdocs\PAGolimpiadas\models\models\M_SPRegistro.php
// on line
// 24



       $fecha_recibida = trim($fecha_recibida);

$date = DateTime::createFromFormat('Y-m-d', $fecha_recibida);
$errors = DateTime::getLastErrors();

if ($date && $errors['warning_count'] == 0 && $errors['error_count'] == 0) {
    $fecha_nacimiento = $fecha_recibida;
} else {
    return "Error: Fecha de nacimiento inválida. Formato esperado: yyyy-mm-dd";
}



        if ($id_tipo_doc == 0 || $id_localidad == 0 || $id_genero == 0) {
            return "Error: Faltan campos obligatorios.";
        }


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
        $password_hash = hash('sha256', $password);

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
            $fecha_nacimiento,
            $email,
            $usuario,
            $password_hash,
            $id_rol,
            $id_pais
        ]);

        $stmt->nextRowset(); 
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado === false) {
    $errorInfo = $stmt->errorInfo();
    return "No se pudo obtener el resultado del procedimiento. Detalles: " . implode(" | ", $errorInfo);
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
