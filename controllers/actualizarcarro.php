<?php 

	require_once "models/models/conexionbd.php";

	$conexion = Conexion::ConexionBD();

	$id_paquete=$_POST['id_paquete'];
	$nombreP=$_POST['nombreP'];
	$descripcion=$_POST['descripcion'];
    $precio = $_POST['precio']

	$sql="CALL sp_actualizar_datos('$id_paquete',
									'$nombreP',
									'$descripcion',
									'$precio')";
									
	echo mysqli_query($conexion,$sql);
 ?>