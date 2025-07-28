<?php
session_start();
require('conexion.php');
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$sql = "Select * from usuarios where usuario = '$username'";
$resultado = mysqli_query($conexion,$sql);
while ($fila = mysqli_fetch_assoc($resultado)) {
    if ($username==$fila['usuario']&&$password==$fila['contraseña']) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else { ?>
        <script>
            alert("Usuario o Contraseña inavalidos...");
            header("Location: login.php");
    
        </script>
        <img src="imgs/error.png" alt="" width="100%" height="100%">
        <?php } 
        }

?>



