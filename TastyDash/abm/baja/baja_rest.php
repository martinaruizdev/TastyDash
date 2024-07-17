<?php

include_once("../../connect/conf.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $consulta = "DELETE FROM restaurantes WHERE id_restaurante='$id' ";

    mysqli_query($con,$consulta);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>ABM | Baja de restaurante</title>
</head>
<body>
    <main>
        <div id="wrapper">
    <div class="contenedor">
        <h1>¡El restaurante fue eliminado con éxito!</h1>
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