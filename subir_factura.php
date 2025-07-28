<?php
$carpetaDestino = "facturas/";
if (isset($_FILES["archivo"])) {
    $archivo = $_FILES["archivo"];
    $rutaDestino = $carpetaDestino . basename($archivo["name"]);
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }
    if (move_uploaded_file($archivo["tmp_name"], $rutaDestino)) {?>
        <script>
            alert("La factura se ha cargado correctamente...");
            window.history.back();
        </script>
        <?php
    } else { ?>
        <script>
        alert("La factura no ha podido cargarse...");
        window.history.back();
        </script>
        <?php }
} else { ?>
   <script>
    alert("No se ha seleccionado ningun archivo..");
    window.history.back();
   </script>
<?php }
?>

