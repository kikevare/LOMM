<?php 
include('conexion.php');
$id_licitacion = $_GET['id_licitacion'];
$sql = "SELECT * from tb_licitaciones where id_licitacion='$id_licitacion'";
$resultado = mysqli_query($conexion,$sql);
$fila = mysqli_fetch_assoc($resultado);
$sql2= "SELECT * from tbequipo_maquinaria where id_licitacion='$id_licitacion'";
$resultado2=mysqli_query($conexion,$sql2);
header('content-type:application/vnd.ms-excel; charset=ISO-8859-1');
header("content-Disposition:attachment; filename=licitacion$id_licitacion.xls")

?>
<table>
        <caption>Relacion de Maquinaria y Equipo de Construccion</caption>
        <tr>
        <th style="border: solid 2px black;">Denominacion</th>
        <th style="border: solid 2px black;">Tipo</th>
        <th style="border: solid 2px black;">Marca del Equipo</th>
        <th style="border: solid 2px black;">Serie y Numero de Equipo</th>
        <th style="border: solid 2px black;">Capacidad del Equipo</th>
        <th style="border: solid 2px black;">Propia</th>
        <th style="border: solid 2px black;">Rentada</th>
        <th style="border: solid 2px black;">Por Adquirir</th>
        <th style="border: solid 2px black;">Ubicacion Actual</th>
        <th style="border: solid 2px black;">Lapso durante el cual se utilizara
</th>
        </tr>
        <?php while ($fila2 = mysqli_fetch_assoc($resultado2)) {
            
         ?>
        <tr>
        <th style="border: solid 2px black; font-weight: lighter;"><?php echo $fila2['denominacion'] ?></th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php echo $fila2['tipo']?> </th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php echo $fila2['marca_del_equipo']?> </th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php echo $fila2['numero_serie']?></th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php echo $fila2['capacidad_equipo']?></th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php if ($fila2['propiedad']=='1') {
            echo "x";
        } else
        {
            echo " ";
        } ?></th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php if ($fila2['propiedad']=='2') {
            echo "X";
        } else
        {
            echo " ";
        } ?></th>
        <th style="border: solid 2px black; font-weight: lighter;"><?php if ($fila2['propiedad']=='3') {
            echo "X";
        } else
        {
            echo " ";
        } ?></th>
        <th style="border: solid 2px black; font-weight: lighter;">Chilpancingo, Gro</th>
        <th style="border: solid 2px black; font-weight: lighter;"></th>
        
    </tr>
       
        <?php  } ?>
        </table>