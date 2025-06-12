<?php 

	require_once "conexion.php";

	$conexion=conexion();
	$idpaquete=$_POST['idpaquete'];
	$sql="CALL sp_eliminar_datos('$id')";//
	echo mysqli_query($conexion,$sql);
 ?>