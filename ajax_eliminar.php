<?php
require('conexion.php');
$id_equipo = $_REQUEST['id'];
$lic = "";
$sql = "UPDATE tbequipo_maquinaria set id_licitacion = '$lic' where id_equipo='$id_equipo'";
if ($conexion->query($sql) === TRUE) {
    
    
} else {

}

?>