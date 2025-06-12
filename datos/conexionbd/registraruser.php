<?php

    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $n_usuario = $_POST['n_usuario'] ?? null;
    $email = $_POST['email'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;
    $rcontrasena = $_POST['rcontrasena'] ?? null;

    if (!$nombre || !$apellido || !$n_usuario || !$email || !$contrasena || !$rcontrasena) {
    echo "⚠️ Por favor complete todos los campos del formulario.";
    } else {
    if ($contrasena !== $rcontrasena) {
        echo "<br>❌ Las contraseñas no coinciden.";
        exit;
    }

public function RegistrarUser(){

    include_once("../conexionbd/conexion_bd.php");
    $conexion = new Cconexion();
    $conexion -> ConexionBD();

    $sql = "EXEC sp_CrearUsuario(?, ?, ?, ?, ?)";
    $declaracion = $conexion->prepare($sql);

    if ($declaracion) {
        $declaracion->bind_param("sssss", $nombre, $apellido, $n_usuario, $email, $contrasena);

        if ($declaracion->execute()) {
            echo "<br>✅ Usuario registrado correctamente.";
        } else {
            echo "<br>❌ Error al ejecutar el procedimiento: " . $declaracion->error;
        }

        $declaracion->close();
    } else {
        echo "<br>❌ Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();

}
?>