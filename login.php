<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Special+Gothic+Condensed+One&display=swap');
    </style>
</head>

<body>
    <section class="login">
        <section class="area_login">
            <section class="area_login_encabezado">
                <p>:: BIENVENIDO ::</p>
                <p>:: INICIO DE SESION ::</p>
            </section>
            <div class="imagen">
    <img src="imgs/User_icon.png" alt="">
            </div>
            <section class="area_login_input">
            <form action="log_OK.php" method="POST">
                <p>Usuario:</p>
                <input type="text" placeholder="Usuario" name="username" required> <br>
                <p>Contraseña:</p>
                <input type="password" name="password" id="" placeholder="Contraseña" required> 
                <button type="submit" class="boton_inicio">Iniciar Sesion</button>
                </form>
            </section>
        </section>

    </section>
</body>
<style>
    .imagen 
    {
        width: 120px;
        height: 100px;
        border-radius: 20px;
        border: solid 3px white;
        margin-left: 190px;
        box-shadow: -1px 5px 8px 2px #000000;
    }
    .imagen img 
    {
        width: 100%;
        height: 90%;
    }
    .boton_inicio {
        width: 140px;
        height: 35px;
        background:rgb(220, 163, 6);
        margin-top: 35px;
        margin-left: 190px;
        border-radius: 5px;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 16px;
        border: none;
        box-shadow: -1px 5px 8px 2px #000000;
        transition: 1s;

    }
    .boton_inicio:hover
    {
        background:rgb(220, 163, 6);
        cursor: pointer;
        scale: 1.1;
        transition: 1s;
    }

    .area_login_input input {
        width: 60%;
        height: 30px;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 17px;
        margin-left: 100px;
        border-radius: 5px;
        box-shadow: -1px 5px 8px 2px #000000;
    }

    .area_login_input p {
        width: 100%;
        height: 30px;
        color: white;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 20px;
        text-align: center;
    }

    .area_login_input {
       
        width: 100%;
        height: 50%;
        display: inline-block;
    }

    .area_login_encabezado p {
        width: 100%;
        height: 30px;
        color: white;
        font-family: "Special Gothic Condensed One", sans-serif;
        font-size: 24px;
        text-align: center;

    }

    .login {
        width: 100%;
        height: 100%;
        background-image: url(imgs/construction-workers-sunset.jpg);
        background-size: cover;
        display: inline-block;
    }

    .area_login {
        width: 500px;
        height: 600px;
        border: solid 3px white;
        background: black;
        margin-left: 550px;
        margin-top: 50px;
        border-radius: 20px;
        box-shadow: -1px 5px 8px 2px #000000;
        transition: 1s;
    }

    .area_login:hover {
        border: solid 3px orange;
        transition: 2s;
    }
    body
    {
        width: 1535px;
        height: 726px;
        padding: 0;
        margin: 0;
        overflow: hidden;
    }
</style>

</html>