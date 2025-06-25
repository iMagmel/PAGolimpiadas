<?php

class C_Recuperacion {
    public static function RecuperarContrasena($email) {
        include_once("../models/models/M_RecuperarContra.php");
        $recuperar = new RecuperarContrasena();
        $recuperar->rec($email);
    }
}

?>