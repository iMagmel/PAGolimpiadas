<?php

class RegistrarUsuario{

    public RegistrarUsuario($idpersona, $usuario, $contrasena, $idrol){

        include_once("conexionbd.php");
        include_once("D_RegistrarUsuario.php");

        Conexion::ConexionBD();

        
        return models.M_RegistrarUsuario.RegistrarUsuario($idpersona, $usuario, $contrasena, $idrol);

    }

}

?>