<?php
require_once __DIR__ . '/../models/models/conexionbd.php';
session_start();

if (!isset($_SESSION['usuario_verificacion'])) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['usuario_verificacion'];
$codigo = $_POST['codigo'] ?? '';

$conn = Conexion::ConexionBD();

$sql = 'SELECT * FROM Usuarios WHERE Id_Usuario = ? AND Codigo_Verificacion = ?';
$stmt = $conn->prepare($sql);
$stmt->execute([$id_usuario, $codigo]);

if ($stmt->fetch()) {
    $update_sql = 'UPDATE Usuarios SET Email_Confirmado = 1, Codigo_Verificacion = NULL WHERE Id_Usuario = ?';
    $conn->prepare($update_sql)->execute([$id_usuario]);

    unset($_SESSION['usuario_verificacion']);
    header("Location: ../vista/pagprincipal/index.php");
    exit();
}else{
        echo "<p style = 'color: red;'>Codigo incorrecto. Intenta denuevo</p>";
}

?>