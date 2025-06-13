<?php
require_once __DIR__ . "models/models/conexionbd.php";


class SP_Registrar{
    private $conn;
    public function __construct(){
        $this->conn=Conexion::ConexionBD()
    }

    public function Registro($nombre, $apellido , $id_tipo_doc, $documento, $id_localidad , $id_genero, $sexo, 
    $fecha_nacimiento , $telefono, $email , $usuario , $password) {
        $sql = "EXEC SP_RegistroUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute[($nombre, $apellido , $id_tipo_doc, $documento, $id_localidad , $id_genero, $sexo, 
    $fecha_nacimiento , $telefono, $email , $usuario , $password)];
        
        return $stmt;
    }
}
?>