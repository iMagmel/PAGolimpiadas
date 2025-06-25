<?php

class C_CodigoContra {
    public static function codigo($codigo, $email, $token) {
        include_once("../models/models/M_CodigoContra.php");
        $codigocontra = new Codigocontra();
        $codigocontra->codigo($codigo, $email, $token);
    }
}

?>