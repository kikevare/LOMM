<?php
include('conexion.php');
$sql = "SELECT * from tb_licitaciones where estado_activo='1'";
$resultado = mysqli_query($conexion,$sql);
?>



<section class="seccion_info">

<section class="fila">
<?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
<div class="carta" id="<?php echo $fila['id_licitacion'] ?>">
    <div class="carta_info">
        <div class="separador"></div>
    <p class="titulo">Nombre de Obra:</p>
    <p class="res2"><?php echo $fila['nombre'] ?></p>
    <p class="titulo">Numero de Licitacion:</p>
    <p class="res"><?php echo $fila['id_licitacion'] ?></p>
    <p class="titulo">Fecha de Inicio:</p>
    <p class="res"><?php echo $fila['fecha'] ?> </p>
    <p class="titulo">Fecha de Finalizacion:</p>
    <p class="res"><?php echo $fila['fecha_finalizacion'] ?></p>
    <p class="titulo">Ubicacion:</p>
    <p class="res"><?php echo $fila['ubicacion'] ?> </p>
    <p class="titulo">Estado de la Obra:</p>
    <p class="res"><?php if ($fila['estado_activo']=='1') {
        echo "Activo";
    }else 
    {
        echo "Terminada";
    } ?></p>
    <button type="button" class="boton_e" id="<?php echo $fila['id_licitacion'] ?>">Terminar Licitacion</button>
    </div>

</div>
<?php } ?>
</section>
</section>
<script>
    $(document).ready(function() 
{
    $(".carta").click(function () {
        var id = $(this).attr("id");
        var datastring = 'id='+ id;
        url = "ajax_info_licitacion.php";
        $.ajax({
            type: "POST",
            url: url,
            data: datastring,
            success: function (data) {
                $("#all_info").html(data);

            },
            error: function(data)
            {
                console.log("error");
                

            }
        })
    })
})
</script>
<script>
    $(document).ready(function() 
{
    $(".boton_e").click(function () {
        var id = $(this).attr("id");
        var datastring = 'id='+ id;
        url = "ajax_terminarlic.php";
        $.ajax({
            type: "POST",
            url: url,
            data: datastring,
            success: function (data) {
                

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
    .boton_e 
    {
        width: 180px;
        height: 30px;
        border-radius: 5px;
        font-family: sans-serif;
        font-weight: bold;
        margin-left: 60px;
        background:  rgb(220, 163, 6);
        border: none;
        transition: 1s;
    }
    .boton_e:hover 
    {
        cursor: pointer;
        scale: 1.1;
        transition: 1s;
    }
    .separador 
    {
        width: 100%;
        height: 6px;
    }
.res2 
{
    width: 100%;
    height: auto;
    font-family: sans-serif;
    font-size: 14px;
    text-align: center;
}
.res 
{
    width: 100%;
    height: 20px;
    font-family: sans-serif;
    font-size: 14px;
    text-align: center;
}
.titulo 
{
    font-family: "Special Gothic Condensed One", sans-serif;
    font-size: 17px;
    width: 100%;
    height: 20px;
    text-align: center;
    color:  rgb(220, 163, 6);
    
}
.seccion_info
{
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    background: black;
}    
.fila 
{
display: grid;
grid-template-columns: repeat(4, 1fr);
grid-template-rows: repeat(auto-fit, 1fr);
grid-column-gap: 14px;
grid-row-gap: 14px; 
}
.carta 
{
    width: 300px;
    height: 550px;
    border: solid 2px black;
    margin-left: 10px;
    margin-top: 15px;
    border-radius: 10px;
    background-size: 300px 550px;
    border: none;
    box-shadow: -1px 5px 8px 2px rgba(255, 255, 255, 0.23);
    transition: 1s;
    display: inline-block;
}
.fila .carta:nth-child(odd)
{
    background-image: url(imgs/beautiful-view-construction-site-city-sunset.jpg);
}
.fila .carta:nth-child(even)
{
    background-image: url(imgs/construction-silhouette.jpg);
}

.carta:hover
{
    border: solid 2px rgb(220, 163, 6);
    transition: 1s;
    cursor: pointer;
    transform: translate(0px, -10px) ;
    box-shadow: none;
}
.carta_info 
{
    width: 100%;
    height: 100%;
    background: rgba(7, 0, 0, 0.8);
    padding: 0;
    color: white;
    border-radius: 10px;
    margin-top: 0px;
    display: inline-block;
}

</style>