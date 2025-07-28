<?php 
include('conexion.php');
$nombre = $_REQUEST['nombre'];
$licitacion = $_REQUEST['numer'];
$sql = "SELECT * from tbequipo_maquinaria where denominacion like '$nombre%' order by denominacion asc";
$resultado=mysqli_query($conexion,$sql); ?>
<div class="licitacion" id="<?php echo $licitacion ?>" style="color: white;"></div>
<div id="re">

</div>
<section class="fila">
<?php
while ($fila = mysqli_fetch_assoc($resultado))
{ ?>   
<div class="carta2" id="<?php echo $licitacion ?>">
<div class="imagen"> <img src="imgs/view-heavy-machinery-used-construction-industry.jpg" alt=""></div>
<div class="efila">
DENOMINACION:
<p><?php echo $fila['denominacion'] ?></p>    
</div>
<div class="efila">
MARCA:
<p><?php echo $fila['marca_del_equipo'] ?></p>    
</div>
<div class="efila">
DISPONIBILIDAD:
<p><?php 
if ($fila['id_licitacion']!=null ) {
   echo "En uso en:"."<b>".$fila['id_licitacion']."</b>";
} else 
{
    echo "Disponible";
} ?></p>    
</div>
<?php if ($fila['id_licitacion']!=null ) { ?>
    <p style="color: red; font-family: 'Special Gothic Condensed One', sans-serif; font-size: 15px; text-align: center; "> ELEMENTO NO DISPONIBLE...</p>
 <?php }  else { ?>

<button class="agregar" id="<?php echo $fila['id_equipo'] ?> ">
    Agregar
</button>
<section id="agregado">

</section>
<?php } ?> 

</div>
<?php
}
?>
</section>
<script>
    $(document).ready(function() 
{
    $(".agregar").click(function () {
        var numero = $(".carta2").attr("id");
        var id = $(this).attr("id");
        
        url = "ajax_agrega_alic.php";
        $.ajax({
            type: "POST",
            url: url,
            data: { id:id, numero:numero },
            success: function (data) {
                
                $("#re").html(data);

            },
            error: function(data)
            {
                console.log("error");
                

            }
        })
    })
})
</script>
<style>
    .agregar
    {
        width: 120px;
        height: 30px;
        background:  rgb(220, 163, 6);
        margin-left: 30%;
        margin-top: 20px;
        border-radius: 5px;
        border: none;
        box-shadow: rgba(69, 69, 69, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 16px;
        transition: 1s;
    }
    .agregar:hover
    {
        cursor: pointer;
        border:solid 2px black;
        transition: 1s;
    }
    .efila 
    {
        width: 100%;
        height: 60px;
        text-align: center;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 18px;
        margin-bottom: 5px;
    }
    .efila p
    {
        width: 100%;
        height: 100%;
        font-size: 14px;
        font-family: sans-serif;
        text-align: center;
    }
    .carta2 
    {
        width: 300px;
        height: 410px;
        background: white;
        border-radius: 10px;
        box-shadow: rgba(69, 69, 69, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        margin-left: 10px;
    }
    .imagen 
{
    width: 100%;
    height: 140px;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}
.imagen img 
{
    width: 100%;
    height: 100%;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}
#agregado 
{
    font-family: Arial, Helvetica, sans-serif;
    color: green;
    text-align: center;
}
</style>
