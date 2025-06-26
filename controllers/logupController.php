<?php

require_once __DIR__ . "/../models/models/DatosAuxiliares.php";
require_once __DIR__ . "/registrarusu.php";

$error = '';
$datosAux = new DatosAuxiliares();

$generos = $datosAux->obtenerGeneros();
$tiposDoc = $datosAux->obtenerTiposDocumento();
$localidades = $datosAux->obtenerLocalidadesJerarquia();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $usuario = trim($_POST['usuario'] ?? '');
    $sexo = $_POST['sexo'] ?? '';
    $id_genero = (int) ($_POST['genero'] ?? 0);
    $id_tipo_doc = (int) ($_POST['tipodoc'] ?? 0);
    $documento = trim($_POST['doc'] ?? '');
    $fecha_nacimiento = trim($_POST['fnacimiento'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['contraseña'] ?? '';
    $id_localidad = (int) ($_POST['localidad'] ?? 0);
    $id_rol = 2;

    if (empty($fecha_nacimiento)) {
        $error = "La fecha de nacimiento es obligatoria.";
    } else {
        $fecha_obj = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);
        $errors_fecha = DateTime::getLastErrors();

        if (!$fecha_obj || $errors_fecha['warning_count'] > 0 || $errors_fecha['error_count'] > 0) {
            $error = "Formato de fecha inválido. Usá AAAA-MM-DD.";
        }
    }

    if (empty($error)) {
   

        $registrar = new registrarusu();
        $resultado = $registrar->RegistrarUsuario(
            $nombre, $apellido, $id_tipo_doc, $documento,
            $id_localidad, $id_genero, $sexo,
            $fecha_nacimiento, $email, $usuario, $password, $id_rol
        );

        if ($resultado === true) {
            include_once __DIR__ . "/../vista/login.php";
            exit();
        } else {
            $error = $resultado;
        }
    }
}

// Mostrar vista
require_once __DIR__ . '/../vista/logup.php';
?>
