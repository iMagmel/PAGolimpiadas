<?php
require_once __DIR__ . "/../models/models/DatosAuxiliares.php";
require_once __DIR__ . "/registrarusu.php";

$error = '';
$datosAux = new DatosAuxiliares();

// Obtener datos para selects
$generos = $datosAux->obtenerGeneros();
$tiposDoc = $datosAux->obtenerTiposDocumento();
$localidades = $datosAux->obtenerLocalidadesJerarquia();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $id_genero = $_POST['genero'] ?? '';
    $id_tipo_doc = $_POST['tipodoc'] ?? '';
    $documento = $_POST['doc'] ?? '';
    $fecha_nacimiento = $_POST['fnacimiento'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['contraseña'] ?? '';
    $id_rol = 2;
    $id_localidad = $_POST['localidad'] ?? '';

    $registrar = new registrarusu();
    $resultado = $registrar->RegistrarUsuario(
        $nombre, $apellido, $id_tipo_doc, $documento,
        $id_localidad, $id_genero, $sexo,
        $fecha_nacimiento, $email, $usuario, $password, $id_rol
    );

    if ($resultado === true) {
        header('Location: login.php');
        exit();
    } else {
        $error = $resultado;
    }
}

// Mostrar vista
require_once __DIR__ . '/../vista/logup.php';
