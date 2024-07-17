<?php

include_once("../../connect/conf.php");

$imagen;
$nomProd;
$descProd;
$precio;
$resProducto;


if(isset($_POST['nomProd']) or isset($_POST['descProd']) or isset($_POST['precio']) or isset($_POST['resProducto'])) {
    
    $nomProd = $_POST['nomProd'] ;
    $descProd = $_POST['descProd'] ;
    $precio = $_POST['precio'] ;
    $resProducto = $_POST['resProducto'];

    $temporal = $_FILES ['imagen']['tmp_name'];
    $imagen = time(). ".png"; 

    move_uploaded_file($temporal, "../../imgs/$imagen");

    $consulta = "INSERT INTO productos(imagen, nomProd, descProd, precio, resProducto) VALUES ('$imagen','$nomProd','$descProd','$precio','$resProducto')";

    mysqli_query($con,$consulta);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>TastyDash ABM | Alta de productos de restaurantes</title>
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