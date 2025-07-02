<?php
require_once __DIR__ . '/../models/models/DatosAuxiliares.php';

class ObtenerData {
    private $datos;

    public function __construct() {
        $this->datos = new DatosAuxiliares();
    }

    public function getGeneros() {
        return $this->datos->obtenerGeneros();
    }

    public function getTiposDocumento() {
        return $this->datos->obtenerTiposDocumento();
    }

    public function getLocalidades() {
        return $this->datos->obtenerLocalidadesJerarquia();
    }
    
    public function getPaises() {
        return $this->datos->obtenerPaises();
        require_once __DIR__ . "/../../jefeventas(prueba)/jefe-ventas.php";
    }
}
?>

