<?php

class Conexion{
    
    function ConexionBD(){

        $host = "localhost";
        $dbname = "";
        $username = "";
        $password = "";
        $puerto = 1433;

        try{

            $conn = new PDO("sqlsrv:Server = $host,$puerto; Database = $dbname, $username, $password");
            echo "Se conecto correctamente";
        
        }catch(PDOExcept $ex){
            
            echo("No se logro conectar con la base de datos: $dbname, error: $ex");

        }

        return $conn
        
    }

}

?>