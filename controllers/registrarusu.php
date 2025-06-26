
<?php

require_once __DIR__ . "/../models/models/M_SPRegistro.php";

class registrarusu {

    public function RegistrarUsuario(
        $nombre, $apellido, $id_tipo_doc, $documento,
        $id_localidad, $id_genero, $sexo,
        $fecha_nacimiento, $email, $usuario, $password, $id_rol
    ) {
        $modelo = new SP_Registrar(); 

        $result = $modelo->Registro(
            $nombre, $apellido, $id_tipo_doc, $documento,
            $id_localidad, $id_genero, $sexo,
            $fecha_nacimiento, $email, $usuario, $password, $id_rol
        );

        return $result;
    }
}