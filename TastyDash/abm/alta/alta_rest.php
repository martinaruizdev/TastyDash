<?php

include_once("../../connect/conf.php");

$nomRes;
$distancia;
$categoriaRes;

if(isset($_GET['nomRes']) or isset($_GET['distancia']) or isset($_GET['categoriaRes'])) {
    
    $nomRes = $_GET['nomRes'] ;
    $distancia = $_GET['distancia'] ;
    $categoriaRes = $_GET['categoriaRes'] ;

    $consulta = "INSERT INTO restaurantes(nomRes, distancia, categoriaRes) VALUES ('$nomRes','$distancia', '$categoriaRes')";

    mysqli_query($con,$consulta);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>TastyDash ABM | Alta de restaurantes</title>
</head>
<body>
    <main>
        <div id="wrapper">
    <div class="contenedor">
        <h1>¡El restaurante fue agregado con éxito!</h1>
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