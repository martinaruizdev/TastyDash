<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
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

            if (isset($_GET['restaurante'])) {

                $fk = $_GET['restaurante'];

                $consulta = "SELECT * FROM productos WHERE resProducto = $fk ";
                $resultado = mysqli_query($con, $consulta);

                if ($resultado != NULL) {

                    while ($filas = mysqli_fetch_array($resultado)) {
                        echo "
            <div class=card-prod>
            <figure>
            <img src=../imgs/$filas[imagen] alt= $filas[nomProd]  >
            </figure>
            <h2>$filas[nomProd]</h2>
            <p>$filas[descProd]</p>
            <p><strong> Precio: $$filas[precio]</strong></p>
            <button><a href=>Ordenar</a></button>
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