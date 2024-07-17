<?php

include_once("../../connect/conf.php");

$tipo;

if(isset($_GET['cat']) and isset($_GET['id'])){

    $id = $_GET['id'];
    $tipo = $_GET['cat'];

    $consulta = "UPDATE categorias SET tipo='$tipo' WHERE id_categoria='$id'";

    mysqli_query($con,$consulta);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>ABM | Modificación de categorias</title>
</head>
<body>
    <main>
        <div id="wrapper">
    <div class="contenedor">
        <h1>¡La categoría fue modificada con éxito!</h1>
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