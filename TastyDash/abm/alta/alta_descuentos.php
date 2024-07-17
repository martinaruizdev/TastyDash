<?php

include_once("../../connect/conf.php");

$cantDesc;
$fotoDesc;
$tituloDesc;
$descripDesc;

if(isset($_POST['cantDesc'])){
    $cantDesc = $_POST['cantDesc'];
    $tituloDesc = $_POST['tituloDesc'];
    $descripDesc = $_POST['descripDesc'];

    $temporal = $_FILES ['fotoDesc']['tmp_name'];
    $fotoDesc = time().".png";

    move_uploaded_file($temporal, "../../imgs/$fotoDesc");

    $consulta = "INSERT INTO descuentos (descuento, imagen, nombreProd, descripcion) VALUES ('$cantDesc','$fotoDesc','$tituloDesc','$descripDesc')";

    mysqli_query($con,$consulta);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>TastyDash ABM | Alta de productos en oferta</title>
</head>
<body>
    <main>
        <div id="wrapper">
    <div class="contenedor">
        <h1>¡El producto fue agregado con éxito!</h1>
        <button><a href="../index_abm.php">Volver atrás</a></button>
        <button><a href="../../pages/home.php">Volver al inicio</a></button>
    </div>
    </div>
    </main>
    <?php
    include_once("../../components/footer.php");
    ?>
</body>
</html>