<?php 
include ('conexion.php');
$denominacion = $_REQUEST['denominacion'];
$marca = $_REQUEST['marca'];
$serie = $_REQUEST['serie'];
$capacidad = $_REQUEST['capacidad'];
$tipo = $_REQUEST['tipo'];
$estado='1';
$disponibilidad = $_REQUEST['disponibilidad'];
$factura = $_REQUEST['factura'];
$sql = "INSERT INTO tbequipo_maquinaria (denominacion, tipo, marca_del_equipo, numero_serie, capacidad_equipo,numero_factura,propiedad) VALUES ('$denominacion', '$tipo', '$marca','$serie','$capacidad','$factura','$disponibilidad')";
mysqli_query($conexion, $sql);
?>