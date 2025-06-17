<?php

require_once __DIR__ '/../models/models/M_Comprar.php'

class ProductosComp{

    public function ComprarPro($usuario, $fechasalida, $fechavuelta, $cantidad, $transporte, $estadia){

        $modelo = new SP_ComprarPro();
        $stmt = $modelo -> comprar($usuario, $fechasalida, $fechavuelta , $cantidad, $transporte, $estadia);
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);

    }

}

?>