<?php 
include ('conexion.php');
$nombre = $_REQUEST['nombre'];
$numero = $_REQUEST['numero'];
$fecha = $_REQUEST['fecha'];
$fecha_final = $_REQUEST['fecha_fin'];
$ubicacion = $_REQUEST['ubicacion'];
$estado='1';
$sql = "INSERT INTO tb_licitaciones (id_licitacion, nombre, fecha, estado_activo, fecha_finalizacion, ubicacion) VALUES ('$numero', '$nombre', '$fecha','$estado','$fecha_final','$ubicacion')";
mysqli_query($conexion, $sql);
?>