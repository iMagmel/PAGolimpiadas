<?php
require_once __DIR__ . '/../models/models/M_Recuperacion.php';
session_start();

$email = $_SESSION['recuperar_email'] ?? '';
$codigo = $_POST['codigo'] ?? '';
$modelo = new M_Recuperacion();

$correcto = $modelo->verificarCodigo($email, $codigo);


if ($correcto) {
    header("Location: /PAGolimpiadas/vista/iniciosesion/change_pass.php");
} else {
    echo "Codigo Incorrecto";
}


?>