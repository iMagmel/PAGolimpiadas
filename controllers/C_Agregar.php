<?php

require_once __DIR__ . '/../models/models/M_Agregar.php';
require_once  __DIR__ . '/../models/models/DatosAuxiliares.php';


$datosAux = new DatosAuxiliares();
$localidades = $datosAux->obtenerLoc();
$tipo_estadia = $datosAux->obtenerTipoEstadia();


$modelo = new M_Agregar();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

