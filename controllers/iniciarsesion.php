<?php

require_once("conexionbd.php");
Conexion::ConexionBD();

if($_SERVER["REQUEST_METHOD"] == "POST"){
        
            $email = $_POST["email"] ?? '';
            $usuario = $_POST["usuario"] ?? '';
            $password = $_POST["password"] ?? '';
            
        if($email && $usuario && $password){
              
                $sql = "SP_Login(?, ?, ?)";

                $declaracion = $conexion->prepare($sql);

                $declaracion->bind_param("sss", $email, $usuario, $password);

                if($declaracion->execute())
                {
                    echo "<br> Datos cargados correctamente";
                }
                else
                {
                    echo "<br> No se ejecuta la consulta correctamente";
                }

                $declaracion -> close();
                $conexion -> close();
            }
        }
        else
        {
            echo"Escriba todos los valores";
        }
else
{
    echo("Error: Acceso no permitido");
}

?>