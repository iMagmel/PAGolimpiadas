<?php
require_once __DIR__ . '/../models/models/M_Viajes.php';
$viajesModel = new Viajes();
$viajes = $viajesModel->getViaje();


?>
