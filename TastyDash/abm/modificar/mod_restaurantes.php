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

    <?php

    include_once("../../connect/conf.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "SELECT * FROM restaurantes WHERE id_restaurante='$id' ";

        $resultado = mysqli_query($con, $consulta);

        if ($resultado != NULL) {
            //mientras siga tirando resultado...
            while ($filas = mysqli_fetch_array($resultado)) {

                echo "
            <form action=mod_rest.php method=get>
            <div>
                <label for=rest >Restaurantes:</label>
                <input name=id type=hidden value=$filas[id_restaurante]>
                <input id=rest name=rest type=text value=$filas[nomRes]>
            </div>
            <div>
                <input class=inp type=submit value=Modificar>
            </div>
        </form>
    
    ";
            }
        }
    }

    ?>
    </div>
    </main>
    <?php
    include_once("../../components/footer.php");
    ?>
</body>

</html>