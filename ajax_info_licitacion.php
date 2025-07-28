<?php 
include('conexion.php');
$id_licitacion = $_REQUEST['id'];
$sql = "SELECT * from tb_licitaciones where id_licitacion='$id_licitacion'";
$resultado = mysqli_query($conexion,$sql);
$fila = mysqli_fetch_assoc($resultado);
$sql2= "SELECT * from tbequipo_maquinaria where id_licitacion='$id_licitacion'";
$resultado2=mysqli_query($conexion,$sql2);

?>
<section class="all_licitacion">
    <section class="informacion_licitacion">
<div class="nombre"><p>Obra: <br><?php echo $fila['nombre'] ?></p></div>
<div class="nombre"><p>Ubicacion: <br><?php echo $fila['ubicacion'] ?></p></div>
<div class="nombre"><p>Numero de Licitacion: <br><?php echo $fila['id_licitacion'] ?></p></div>
<div class="licita" id="<?php echo $id_licitacion ?>" style="color: white;">  </div>
    </section>
    <p style="color: white; font-family: Special Gothic Condensed One , sans-serif; font-size: 22px; width: 100%; text-align: center; margin-top: 40px;">RELACION DE MAQUINARIA Y EQUIPO DE CONSTRUCCION</p>
    <section id="toda_tabla">
    <section class="tabla" id="tabla"> 
        <section class="tabla_encabezados">
        
        <div>Denominacion</div>
        <div>Tipo</div>
        <div>Marca del Equipo</div>
        <div>Serie y # de Equipo</div>
        <div>Capacidad del Equipo</div>
        <div>Propia</div>
        <div>Rentada</div>
        <div>Por Adquirir</div>
        <div>Ubicacion Actual</div>
        <div>Lapso de Uso</div>
        <div>Eliminar</div>
        <div>Factura</div>
        </section>
        <?php while ($fila2 = mysqli_fetch_assoc($resultado2)) {
            
         ?>
        <section class="resultados" id="resultados<?php echo $fila2['id_equipo'] ?>">
        <div><?php echo $fila2['denominacion'] ?></div>
        <div><?php echo $fila2['tipo']?> </div>
        <div><?php echo $fila2['marca_del_equipo']?> </div>
        <div class="serie"><?php echo $fila2['numero_serie']?></div>
        <div><?php echo $fila2['capacidad_equipo']?></div>
        <div><?php if ($fila2['propiedad']=='1') {
            echo "x";
        } else
        {
            echo " ";
        } ?></div>
        <div><?php if ($fila2['propiedad']=='2') {
            echo "X";
        } else
        {
            echo " ";
        } ?></div>
        <div><?php if ($fila2['propiedad']=='3') {
            echo "X";
        } else
        {
            echo " ";
        } ?></div>
        <div>Chilpancingo, Gro</div>
        <div><?php echo $fila['fecha']." "." "." ".$fila['fecha_finalizacion'] ?></div>
        <div><img src="imgs/eliminar.png" alt=""  style="margin-top: 15px;" id="<?php echo $fila2['id_equipo'] ?>" class="imagen_2"></div>
        <div><a href="facturas/<?php echo $fila2['numero_factura'] ?>.pdf" target="_blank" rel="noopener noreferrer"><img src="imgs/PDF_file_icon.png" alt="" width="40px" height="80%" style="margin-top: 5px;"></a></div>
        
        </section>
        
        <?php  } ?>
 <section></section>
         <br>   <a href="excel_crear.php?id_licitacion=<?php echo $id_licitacion ?>" style="text-decoration: none; color: white; margin-right: 15px; margin-top: 10px;">Descargar Excel</a>
        </section>
    </section>
    <p style="color: white; font-family: Special Gothic Condensed One , sans-serif; font-size: 22px; width: 100%; text-align: center; margin-top: 40px;">AGREGAR MAQUINARIA A LA LICITACION.</p>
    <section class="busqueda_datos">
<input type="text" name="buscar" id="ibusqueda" placeholder="Busqueda"><button id="buscar" class="buscar" type="button">OK</button>
    </section>
    <section class="busqueda_resultados" id="busqueda_resultados">

    </section>
</section>
   
    
    
</section>
<script>
    $(document).ready(function() 
{
    $(".buscar").click(function () {
        var nombre = $("#ibusqueda").val();
        var numer = $(".licita").attr("id");
    
        url = "ajax_busqueda.php";
        $.ajax({
            type: "POST",
            url: url,
            data: { nombre:nombre, numer:numer },
            success: function (data) {
                $("#busqueda_resultados").html(data);
                

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
    $(".imagen_2").click(function () {
        var id = $(this).attr("id");
        var datastring = 'id='+ id;
    
        url = "ajax_eliminar.php";
        $.ajax({
            type: "POST",
            url: url,
            data: datastring,
            success: function (data) {
                
                $("#resultados"+id).hide();


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
    .serie 
    {
        overflow-x: hidden;
    }
    #buscar 
    {
        background: goldenrod;
        height: 100%;
        border: none;
        border-radius: 5px;
    }
    #buscar:hover
    {
        cursor: pointer;

    }
    .busqueda_datos 
    {
        width: 100%;
        height: 30px;
        display: flex;

    }
    .busqueda_datos p 
    {
        width: 4%;
        height: 100%;
        font-family: Special Gothic Condensed One , sans-serif;
        font-size: 18px;
        color: white;
        margin-left: 60px;
        
    }
    .busqueda_datos input 
    {
        width: 230px;
        height: 25px;
        background: rgba(7, 0, 0, 0.75);
        margin-right: 10px;
        color: white;
        font-family: sans-serif;
        font-size: 14px;
        border-radius: 5px;
        margin-left: 50px;
    }
    .tabla_encabezados div 
    {
        width: 8.33%;
        height: 100%;
        border-right: solid 1px white;
        color:  black;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 16px;
        text-align: center;
    }
    .tabla_encabezados
    {
        width: 95%;
        height: 40px;
        border-bottom: solid 1px white;
        border-left: solid 1px white;
        border-top: solid 1px white;
        display: flex;
        background: rgb(224, 165, 2);


    }
    .resultados div 
    {
        width: 8.33%;
        height: 100%;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 14px;
        text-align: center;
        border-bottom: solid 2px black;
        overflow-y: hidden;
    }
    .resultados:nth-child(odd)
    {
        background: black;
        color: white;
    }
    .resultados:nth-child(even)
    {
        background: rgb(43, 42, 42);
        color: white;
       }
    

    .resultados 
    {
        width: 95%;
        height: 50px;
        display: flex;
        background: white;
        
    }
    .tabla 
    {
        width: 95%;
        height: auto;
        margin-top: 50px;
        margin-left: 60px;
        
    }
    .nombre 
    {
        width: 33.3%;
        height: 100%;
        border-right: solid 2px rgb(220, 163, 6);
        border-left: solid 2px rgb(220, 163, 6);
        border-bottom: solid 2px rgb(220, 163, 6);
        border-top: solid 2px rgb(220, 163, 6);
        border-radius: 10px;
    }
    .nombre p 
    {
        width: 100%;
        height: 50%;
        text-align: center;
        color: white;
        font-family: "Special Gothic Condensed One", sans-serif;
        text-justify: distribute;
    }
    .all_licitacion 
    {
        width: 100%;
        height: 100%;
        background: black;
        padding: 0;
        display: inline-block;
        overflow-y: scroll;
    }
    .informacion_licitacion 
    {
        width: 100%;
        height: 100px;
        display: flex;
    }
    .fila
    {
display: grid;
grid-template-columns: repeat(4, 1fr);
grid-template-rows: repeat(auto-fit, 1fr);
grid-column-gap: 14px;
grid-row-gap: 14px; 
    }
    .busqueda_resultados
    {
        width: 100%;
        max-height: 100%;
        background: black;
        margin-top: 20px;
    }
   .imagen_2 
   {
    max-width: 30px;
    max-height: 25px;
   }
   .imagen_2:hover 
   {
    cursor: pointer;
   }
</style>