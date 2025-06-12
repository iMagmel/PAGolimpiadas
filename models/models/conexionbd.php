<?php

STATIC class Conexion{
    
    public static function ConexionBD() {
        $host = "localhost";
        $dbname = "olimpiadas";
        $username = "sa";
        $password = "";
        $puerto = 1433;

        try{}
            $conn = new PDO("sqlsrv:Server = $host,$puerto; Database = $dbname, $username, $password");
        }catch(PDOExcept $ex){
            die("No se logro conectar con la base de datos: $dbname, error: $ex");
        }

        return $conn
        
    }

?>