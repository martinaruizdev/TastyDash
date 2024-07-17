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

        $consulta = "SELECT * FROM categorias WHERE id_categoria='$id' ";

        $resultado = mysqli_query($con, $consulta);

        if ($resultado != NULL) {
            //mientras siga tirando resultado...
            while ($filas = mysqli_fetch_array($resultado)) {

                echo "
            <form action=mod_cat.php method=get>
            <div>
                <label for=cat >Categoria:</label>

                <input name=id type=hidden value=$filas[id_categoria]>
                <input id=cat name=cat type=text value=$filas[tipo]>
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