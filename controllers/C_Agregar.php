<?php
// Incluir el modelo
require_once __DIR__ . '/../models/models/M_Agregar.php';
require_once  __DIR__ . '/../models/models/DatosAuxiliares.php';


$datosAux = new DatosAuxiliares();
$paises = $datosAux->obtenerPaises();
$tipo_estadia = $datosAux->obtenerTipoEstadia();
// renderiza la vista
require __DIR__ . '/../vista/jefeventas/jefe-ventas.php';

// Instanciar el modelo
$modelo = new M_Agregar();

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $tipo_estadia = $_POST['tipo_estadia'];
    $pais = $_POST['pais'];
    $calle = $_POST['calle'];
    $nro = $_POST['nro'];
    $piso = $_POST['piso'];
    $depto = $_POST['depto'];


    $modelo->insertarEstadia($pais, $calle, $nro, $piso, $depto, $tipo_estadia);


}


require_once __DIR__ . '/../vista/jefeventas/jefe-ventas.php';
?>

