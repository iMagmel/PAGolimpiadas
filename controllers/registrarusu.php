<?php

require_once __DIR__ . "models/models/M_SPRegistro.php";
require_once __DIR__ . "helpers/Encriptar.php";
class registrarusu{

    function RegistrarUsuario($nombre, $apellido , $id_tipo_doc, $documento, $id_localidad , $id_genero, $sexo, 
    $fecha_nacimiento , $telefono, $email , $usuario , $password) {
        $clave_ingresada = $password;
        $clave_hash = Encriptar :: SHA256($clave_ingresada);
        $models = new SP_Registrar();
        $result = $modelo->Registro($nombre, $apellido , $id_tipo_doc, $documento, $id_localidad , $id_genero,
         $sexo, $fecha_nacimiento , $telefono, $email , $usuario , $password);

        if ($result && $result["password"] === $clave_hash){
            header("Location : vista/login.php");
        } else {
            return "Usuario y contraseña incorrectos.";
        }
    }       
}
?>