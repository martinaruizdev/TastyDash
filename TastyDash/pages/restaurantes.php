<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>TastyDash - Martina Ruiz</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <?php
            include_once("../components/nav.php");
            ?>
        </header>

        <main>
            <div class="contenedor-cards">

            <?php

            include_once("../connect/conf.php");

            if (isset($_GET['categoria'])) {

                $fk = $_GET['categoria'];

                $consulta = "SELECT * FROM restaurantes WHERE categoriaRes = $fk ";
                $resultado = mysqli_query($con, $consulta);

                if ($resultado != NULL) {

                    while ($filas = mysqli_fetch_array($resultado)) {
                        echo "
            <div class=card>
            <h2><a id=link href=productos.php?restaurante=$filas[id_restaurante]>$filas[nomRes]</a></h2>
            <p>$filas[distancia] km</p>
            </div>
            ";
                    }
                }
            } else {

                echo "Error de conexión";
            }

            ?>
            </div>
        </main>

    </div>

    <?php
    include_once("../components/footer.php");
    ?>
</body>

</html>