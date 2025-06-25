<?php
class C_ResetearContra {
    public static function CambiarContra($email, $Contraseña, $VContraseña) {
        include_once("./models/models/M_ReseatearContra.php");
        $resetear = new ReseatearContra();
        $resetear->CambiarContra($email, $Contraseña, $VContraseña);
    }
}

?>