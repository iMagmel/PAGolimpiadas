<?php

class Cconexion{

    public function ConexionBD(){

        $host = 'localhost';
        $dbname = 'BD_GESTION';
        $username = '(local)';
        $password = '';
        $puerto = 1433;

        try{
            $conn = new PDO("sqlsrv:Server=$host,$puerto;Database=$dbname",$username,$password);
            echo "se conecto correctamente a la base de datos";
        }catch(PDOException $ex){
            echo ("No se logró conectar la base de datos : $dbname, error: $ex");
        }

        return $conn;

    }

}

?>