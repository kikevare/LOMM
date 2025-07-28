<?php
require('conexion.php');
$id = $_REQUEST['id'];
$sql = "UPDATE tbequipo_maquinaria set id_licitacion = '' where id_licitacion='$id'";
if ($conexion->query($sql) === TRUE) {
    
    
} else {

}
$sql2 = "UPDATE tb_licitaciones set estado_activo = '2' where id_licitacion='$id'";
if ($conexion->query($sql2) === TRUE) {
    
    
} else {

}
?>