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


    if (empty($nombre) || !preg_match('/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/u', $nombre)) {
        $error = "El nombre es obligatorio";
    } elseif (empty($apellido) || !preg_match('/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/u', $apellido)) {
        $error = "El apellido es obligatorio";
    } elseif (empty($usuario) || strlen($usuario) < 4 || !preg_match('/^[a-zA-Z0-9_]+$/', $usuario)) {
        $error = "El nombre de usuario debe tener al menos 4 caracteres.";
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Debe ingresar un email válido.";
    } elseif (empty($password) || strlen($password) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } elseif (empty($sexo)) {
    $error = "Debe seleccionar un sexo.";
    } elseif ($datosAux->usuarioExiste($usuario)) {
    $error = "El nombre de usuario ya está registrado. Elegí otro.";
    } elseif ($id_genero <= 0) {
        $error = "Debe seleccionar un género.";
    } elseif ($id_tipo_doc <= 0) {
        $error = "Debe seleccionar un tipo de documento.";
    } elseif (empty($documento)) {
        $error = "Debe ingresar un número de documento.";
    } elseif ($id_localidad <= 0) {
        $error = "Debe seleccionar una localidad.";
    } elseif (empty($fecha_nacimiento)) {
        $error = "La fecha de nacimiento es obligatoria.";
        } else {
        $fecha_obj = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);
        if (!$fecha_obj || $fecha_obj->format('Y-m-d') !== $fecha_nacimiento) {
            $error = "Formato de fecha inválido. Usá AAAA-MM-DD.";
        } else {    
            $hoy = new DateTime();
            $edad = $fecha_obj->diff($hoy)->y;
            if ($edad < 18) {
                $error = "Debés ser mayor de 18 años para registrarte.";
            }
        }
    }



    if (empty($error)) {
        $tipo_doc_nombre = '';
        foreach ($tiposDoc as $tipo) {
            if ($tipo['Id_TipoDoc'] == $id_tipo_doc) {
                $tipo_doc_nombre = strtolower(trim($tipo['TipoDoc']));
                break;
            }
        }

        if ($tipo_doc_nombre === 'dni') {
            if (!preg_match('/^[0-9]{7,8}$/', $documento)) {
                $error = "El DNI debe tener entre 7 y 8 dígitos numéricos.";
            }
        } elseif ($tipo_doc_nombre === 'pasaporte') {
            if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $documento)) {
                $error = "El Pasaporte debe tener entre 6 y 12 caracteres alfanuméricos.";
            }
        } else {
            $error = "Tipo de documento no reconocido.";
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
        header("Location: /PAGolimpiadas/vista/iniciosesion/login.php");
        exit();            
        } else {
            $error = $resultado;
        }
    }
}

require_once __DIR__ . '/../vista/registro/logup.php';
?>
