<?php
require_once __DIR__ . '/../models/models/M_Recuperacion.php';
require_once __DIR__ . '/../helpers/Encriptar.php';
session_start();

$email = $_SESSION['recuperar_email'] ?? '';
$nueva_contraseña = $_POST['nueva_contraseña'] ?? '';
$confirmacion_contraseña = $_POST['confirmacion_contraseña'] ?? '';

if ($nueva_contraseña !== $confirmacion_contraseña) {
    die("Las contraseñas no coinciden.");
}

$modelo = new M_Recuperacion();
$clave_hash = Encriptar::SHA256($nueva_contraseña);
$modelo->cambiarContraseña($email, $clave_hash);

unset($_SESSION['recuperar_email']);
echo "Contraseña cambiada exitosamente. Puedes iniciar sesión con tu nueva contraseña.";
header("Location: /PAGolimpiadas/vista/iniciosesion/login.php");
?>