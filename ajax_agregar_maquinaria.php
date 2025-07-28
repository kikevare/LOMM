<?php 
include('conexion.php');
?>
<section class="insert_fondo">
<section class="insert__formulario">
    <section class="formulario_encabezado"><br><br><br>FORMULARIO NUEVA MAQUINARIA/EQUIPO</section>
    <section class="formulario_linea1">
 <p>Denominacion:</p> <input type="text" id="denominacion"> 
    </section>
    <section class="formulario_linea1">
 <p>Tipo:</p> <input type="text" id="tipo"> 
    </section>
    <section class="formulario_linea1">
 <p>Marca del Equipo:</p> <input type="text" id="marca"> 
    </section>
    <section class="formulario_linea1">
 <p>Numero de Serie:</p> <input type="text" id="serie"> 
    </section>
    <section class="formulario_linea1">
 <p>Capacidad del Equipo:</p> <input type="text" id="capacidad"> 
    </section>
    <section class="formulario_linea1">
 <p>Numero de Factura:</p> <input type="text" id="factura"> 
    </section>
    <section class="formulario_linea1">
 <p>Disponibilidad:</p> <select name="" id="disponibilidad">
    <option value="">--Seleccione--</option>
    <option value="1">Propia</option>
    <option value="2">Rentada</option>
    <option value="3">Por Adquirir</option>
 </select> 
    </section>
    <button class="boton" type="button">Guardar</button>
    <p style="font-size: 15px; font-family: sans-serif; color: lightgreen; text-align: center; margin-top: 40px;" class="valido" id="valido"></p>
    <p style="font-size: 15px; font-family: sans-serif; color: red; text-align: center; margin-top: 10px;" class="valido" id="valido2"></p>
</section>

</section>
<script>
    $(document).ready(function() 
{
    $(".boton").click(function () {
        var denominacion = $("#denominacion").val();
        var marca = $("#marca").val();
        var serie = $("#serie").val();
        var capacidad = $("#capacidad").val();
        var tipo = $("#tipo").val();
        var disponibilidad = $("#disponibilidad").val();
        var factura = $("#factura").val();
        url = "ajax_guardar_maquinaria.php";
        $.ajax({
            type: "POST",
            url: url,
            data: { denominacion:denominacion, marca:marca, serie:serie, capacidad:capacidad, tipo:tipo, factura:factura, disponibilidad:disponibilidad },
            success: function (data) {
               console.log("si se pudo");
               $('#valido').html("Se ha agregado el equipo con exito...")

            },
            error: function(data)
            {
                console.log("error");
                $('#valido2').html("No se ha podido guardar la informacion...")

            }
        })
    })
})
</script>
<style>
     .boton:hover
    {
        background:rgb(220, 163, 6);
        cursor: pointer;
        scale: 1.1;
        transition: 1s;
        border: solid 2px black;
    }
    .boton 
    {
        width: 140px;
        height: 35px;
        background:rgb(220, 163, 6);
        margin-top: 40px;
        margin-left: 240px;
        border-radius: 5px;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 16px;
        border: none;
        box-shadow: -1px 5px 8px 2px #000000;
        transition: 1s;
    }
    .formulario_linea1 select 
    {
        background: rgba(7, 0, 0, 0.75);
        border: none;
        width: 50%;
        height: 100%;
        margin-top: 5px;
        border-radius: 5px;
        color: white;
        font-family: sans-serif;
        font-size: 13px;
    }
    .formulario_linea1 p 
    {
        width: 25%;
        height: 100%;
        font-size: 17px;
        font-family: "Special Gothic Condensed One", sans-serif;
        color: white;
        margin-left: 70px;
        text-align: left;
        
    }
    .formulario_linea1 input 
    {
        background: rgba(7, 0, 0, 0.92);
        border: none;
        width: 50%;
        height: 100%;
        margin-top: 5px;
        border-radius: 5px;
        color: white;
        font-family: sans-serif;
        font-size: 13px;
    }
    .formulario_linea1 
    {
        margin-top: 5px;
        margin-bottom: 10px;
        width: 100%;
        height: 30px;
        display: flex;

    }
    .formulario_encabezado {
        width: 100%;
        height: 30px;
        margin-bottom: 140px;
        font-size: 22px;
        font-family: "Special Gothic Condensed One", sans-serif;
        color: #FFB20D;
        text-align: center;
    }
    .insert_fondo 
    {
        width: 100%;
        height: 100%;
        background-image: url(imgs/excavator-action.jpg);
        background-size: 100% 100%;
        display: inline-block;
    }
    .insert__formulario 
    {
        width: 600px;
        height: 600px;
        background:rgba(7, 0, 0, 0.75);
        border-radius: 10px;
        margin-left: 30%;
        margin-top: 5%;
        transition: 1s;
    }
    .insert__formulario:hover
    {
        box-shadow: -1px 5px 8px 2px #000000;
        transition: 1s;
    }
</style>