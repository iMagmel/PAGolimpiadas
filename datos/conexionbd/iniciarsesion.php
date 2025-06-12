<?php

    public function IniciarSesion(){

        $n_usuario = '';
        $contrasena = '';

        try{
            include_once("../conexionbd/conexion_bd.php");
            $conexion = new Cconexion();
            $conexion -> ConexionBD();

            $sql = "EXEC sp_BuscarUsuario(?,?)";
            $declaracion = $conexion->prepare($sql);

            if ($declaracion) {
                $declaracion->bind_param("ss", $n_usuario, $contrasena);
                $declaracion->execute();
                $resultado = $declaracion->get_result();
                if ($resultado && $resultado->num_rows > 0) {
                    header("location: /proyecto-dw/index.php");
                    exit();
                } else {
                    echo "<br>❌ Usuario no encontrado";
                }

                $declaracion->close();
            } else {
                echo "<br>❌ Error al preparar la consulta: " . $conexion->error;
            }

        }catch(PDOException $ex){
            echo ("No se logró conectar la base de datos : $dbname, error: $ex");
        }
    }

?>