<?php
require_once __DIR__ . '/../models/models/M_Viajes.php';

$viajesModel = new Viajes();
$viajes = $viajesModel->getViaje();

$viajesAgrupados = [];

foreach ($viajes as $viaje) {
    $pais = $viaje['Id_Pais'];
    if (!isset($viajesAgrupados[$pais])) {
        $viajesAgrupados[$pais] = [];
    }
    $viajesAgrupados[$pais][] = $viaje;
}
?>
