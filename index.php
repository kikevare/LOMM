<?php
session_start();
include ('conexion.php');
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index::SGD</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Special+Gothic+Condensed+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap');
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<div id="loader">
        <div class="spinner"></div>
    </div>
<div id="miModal" class="modal">
    <div class="modal-contenido">
        <a href="#" class="cerrar-modal">×</a>
        <h2>Subir Archivo de Factura:</h2>
        <form action="subir_factura.php" method="post" enctype="multipart/form-data">
    <label for="archivo">Selecciona un archivo:</label>
    <input type="file" name="archivo" id="archivo">
    <input type="submit" value="Subir archivo">
</form>
<br>
    </div>
</div>


<script>
    $(document).ready(function() 
{
    $(".licitacion").click(function () {
        
        url = "ajax_licitacion.php";
        $.ajax({
            type: "POST",
            url: url,
            success: function (data) {
                $("#all_info").html(data);
            }
        })
    })
})
</script>
<script>
    $(document).ready(function() 
{
    $(".activas_lici").click(function () {
        
        url = "ajax_licitaciones_activas.php";
        $.ajax({
            type: "POST",
            url: url,
            success: function (data) {
                $("#all_info").html(data);
            }
        })
    })
})
</script>
<script>
    $(document).ready(function() 
{
    $(".nueva_maquinaria").click(function () {
        
        url = "ajax_agregar_maquinaria.php";
        $.ajax({
            type: "POST",
            url: url,
            success: function (data) {
                $("#all_info").html(data);
            }
        })
    })
})
</script>
<body>
    <section class="all_contenido">
        <section class="all_menu">
        <div class="all_menu_logo">
<img src="imgs/logo.jpg" alt="">
        </div>
        <section class="all_menu_botones">
        <button type="button" class="licitacion"> Nueva Licitacion</button>
        <button type="button" class="activas_lici">Licitaciones Activas</button>
        <button type="button" class="nueva_maquinaria">Nueva Maquinaria</button>
       <a href="#miModal"> <button type="button">Agregar Factura</button></a>
       <a href="logout.php"> <button type="button">Cerrar Sesion</button></a>
       
        </section>
        </section>
        <section class="all_info" id="all_info">
           

        </section>
    </section>
    <script src="script.js"></script>
</body>
</html>
<style>
    .all_menu_logo 
    {
        width: 100%;
        height: 135px;
        background: black;
        margin-top: 0;
    }
    .all_menu_logo img
    {
        width: 100%;
        height: 90%;
    }   
     body
    {
        width: 1535px;
        height: 726px;
        padding: 0;
        margin: 0;
        overflow: hidden;
    }
    .all_contenido 
    {
        width: 100%;
        height: 100%;
        display: flex;
    }
    .all_menu 
    {
        width: 250px;
        height: 100%;
        border: solid 2px black;
        background: #FFB20D;
        display: inline-block;
    }
    .all_menu p 
    {
        width: 100%;
        height: 60px;
        border: solid 2px black;
        border-right: none;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 30px;
        text-align: center;
        background: black;
        color: white;
        margin-top: 0;
    }
    .all_menu button 
    {
        width: 100%;
        height: 35px;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 22px;
        background: #FFB20D;
        transition: 1s;
        border: none;
        border-bottom: solid 2px black;
        margin-top: 1px;
       
    }
    .all_menu button:hover 
{
    background: black;
    color: white;
    transition: 1s;
    cursor: pointer;
}
.all_menu_botones 
{
    width: 100%;
    height: 110px;
    margin-top: 130px;
}
.all_info 
{
    width: 100%;
    height: 730px;
    background-image: url(imgs/heavy-machines-construction-workers-working-building.jpg);
    background-size: cover;
}
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: none;
    justify-content: center;
    align-items: center;
}

.modal:target {
    display: flex;
}

.modal-contenido {
    background: black;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    height: 130px;
    text-align: center;
    color: white;
    border: solid 2px white;

}

.cerrar-modal {
    position: absolute;
    right: 15px;
    top: 15px;
    text-decoration: none;
    font-size: 30px;
    font-weight: bold;
    color: red;
}
#loader {
    position: fixed;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* Animación del spinner */
.spinner {
    width: 50px;
    height: 50px;
    border: 5px solid #ccc;
    border-top-color: #007bff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Animación de giro */
@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

</style>