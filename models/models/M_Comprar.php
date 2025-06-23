<?php

require_once __DIR__ . '/conexionbd.php';

class SP_ComprarPro{
    private $conn;

    public function __construct(){
        $this-> conn = Conexion::ConexionBD();
    }

    public function comprar($usuario, $fechasalida, $fechavuelta, $cantidad, $transporte, $estadia){

        $sqle -> query("SELECT Id_Viaje FROM Viajes WHERE Fecha_Salida = $fechasalida AND Fecha_Vuelta = $fechavuelta")
        $id_viaje = $sqle -> execute();
        $sql = "EXEC SP_GuardarCompra ?, ?, ?, ?, ?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt = execute([$usuario, $id_viaje, $cantidad, $transporte, $estadia]);
        return $stmt;
    }
}

?>