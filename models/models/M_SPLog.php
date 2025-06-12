<?php
require_once __DIR__ . "models/models/conexionbd.php";
Conexion::ConexionBD();
ConexionBD() = new Conexion;
class SP_Login{
public function login($usuario, $password, $email){ 
$sql = "EXEC SP_Login ?, ?, ?";
$params = [$usuario, $password, $email];
$stmt = sqlsrv_query($conn, $sql, $params);
return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }
}
?>