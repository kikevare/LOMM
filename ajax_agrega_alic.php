<?php 
include ('conexion.php');
$id = $_REQUEST['id'];
$numero = $_REQUEST['numero'];

$sql = "UPDATE tbequipo_maquinaria set id_licitacion = '$numero' where id_equipo='$id'";
if ($conexion->query($sql) === TRUE) {
    
    
} else {

}
?>

