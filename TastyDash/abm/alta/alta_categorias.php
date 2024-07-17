<?php

include_once("../../connect/conf.php");

$titulo;

if(isset($_GET['titulo'])){
    $titulo = $_GET['titulo'];

    $consulta = "INSERT INTO categorias (`tipo`) VALUES ('$titulo')";

    mysqli_query($con,$consulta);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>TastyDash ABM | Alta de categorias</title>
</head>
<body>
    <main>
        <div id="wrapper">
    <div class="contenedor">
        <h1>¡La categoría fue agregada con éxito!</h1>
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