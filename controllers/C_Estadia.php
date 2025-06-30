<?php
require_once __DIR__ . '/../models/models/M_Estadia.php';

$estadiaModel = new Estadia();
$estadias = $estadiaModel->getEstadia();

$estadiasAgrupadas = [];

foreach ($estadias as $estadia) {
    $tipo = $estadia['Tipo_Estadia'];
    if (!isset($estadiasAgrupadas[$tipo])) {
        $estadiasAgrupadas[$tipo] = [];
    }
    $estadiasAgrupadas[$tipo][] = $estadia;
}
?>
