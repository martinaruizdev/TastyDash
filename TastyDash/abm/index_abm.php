<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>TastyDash - ABM</title>
</head>

<body>

    <div id="wrapper">
        <header id="abm">
            <h1>ABM | TastyDash</h1>
        </header>

        <main>
            <section id="agregar">
                <h2>Categorías</h2>
                <div class="contenedor-cards">

                    <?php
                    include_once("../connect/conf.php");

                    $consulta = "SELECT * FROM categorias";
                    $resultado = mysqli_query($con, $consulta);

                    if ($resultado != NULL) {
                        //mientras siga tirando resultado...
                        while ($filas = mysqli_fetch_array($resultado)) {
                            
                            echo "
                <div class=card-abm>
                <h3> $filas[tipo] </h3>
                <button><a href=modificar/mod_categorias.php?id=$filas[id_categoria] >Modificar</a></button>
                <button><a href=baja/baja_categorias.php?id=$filas[id_categoria] >Eliminar</a></button>
                </div>
                    
                    ";
                        }
                    }

                    ?>
                </div>
                
                <h3>Agregar Categoría</h3>
                <form action="alta/alta_categorias.php" method="get">
                    <div>
                        <label for="titulo">Nombre categoría:</label>
                        <input type="text" name="titulo" id="titulo">
                    </div>
                    <div>
                        <input class="btn" type="submit" value="Guardar Cambios">
                    </div>
                </form>

                <h2>Restaurantes</h2>
                <div class="contenedor-cards">
                <?php

                $consulta = "SELECT * FROM restaurantes";
                $resultado = mysqli_query($con, $consulta);

                if ($resultado != NULL) {
                    //mientras siga tirando resultado...
                    while ($filas = mysqli_fetch_array($resultado)) {

                        echo "
                <div class=card-abm>
                <h3> $filas[nomRes] </h3>
                <button><a href=modificar/mod_restaurantes.php?id=$filas[id_restaurante] >Modificar</a></button>
                <button><a href=baja/baja_rest.php?id=$filas[id_restaurante] >Eliminar</a></button>
                </div>
                    
                ";
                    }
                }

                ?>

                </div>
                <h3>Agregar Restaurante</h3>
                <form action="alta/alta_rest.php" method="get" >
                    <div>
                        <label for="nomRes">Nombre del restaurante:</label>
                        <input type="text" name="nomRes" id="nomRes">
                    </div>
                    <div>
                        <label for="distancia">Distancia:</label>
                        <input type="number" name="distancia" id="distancia">
                    </div>

                    <div>
                    <label for="categoriaRes" >Categoria:</label>
                    <select name="categoriaRes" id="categoriaRes" >
                        <?php
                        $consulta = "SELECT * FROM categorias";

                        $resultado = mysqli_query($con,$consulta);
                    
                            if($resultado!=NULL){
                    
                                while($filas = mysqli_fetch_array($resultado)){
                                    echo "
                                        <option value=$filas[id_categoria] >$filas[tipo]</option>
                                    
                                    ";
                        
                                }
                        
                            }
                        ?>

                    </select>
                    </div>


                    <div>
                        <input class="btn" type="submit" value="Guardar Cambios">
                    </div>
                </form>

                <h2>Productos de Restaurantes</h2>
                <div class="contenedor-cards">
                <?php

                $consulta = "SELECT * FROM productos";
                $resultado = mysqli_query($con, $consulta);

                if ($resultado != NULL) {
                    //mientras siga tirando resultado...
                    while ($filas = mysqli_fetch_array($resultado)) {

                        echo "
                <div class=card-prod>
                <figure>
                <img src=../imgs/$filas[imagen] alt=$filas[nomProd]>
                </figure>
                <h3> $filas[nomProd] </h3>
                <p>$filas[descProd]</p>
                <p><strong> Precio: $$filas[precio]</strong></p>

                <button><a href=baja/baja_productos.php?id=$filas[id_producto] >Eliminar</a></button>
                </div>
                    
                ";
                    }
                }

                ?>

                </div>

                <h3>Agregar Producto de Restaurante</h3>
                <form action="alta/alta_productos.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="imagen">Imagen Del Producto:</label>
                        <input type="file" name="imagen" id="imagen">
                    </div>
                    <div>
                        <label for="nomProd">Nombre del Producto:</label>
                        <input type="text" name="nomProd" id="nomProd">
                    </div>
                    <div>
                        <label for="descProd">Descripción del Producto:</label>
                        <input type="text" name="descProd" id="descProd"> 
                    </div>
                    <div>
                        <label for="precio">Precio del Producto:</label>
                        <input type="number" name="precio" id="precio">
                    </div>
                    <div>
                    <label for="resProducto" >Restaurante:</label>
                    <select name="resProducto" id="resProducto" >
                        <?php
                        $consulta = "SELECT * FROM restaurantes";

                        $resultado = mysqli_query($con,$consulta);
                    
                            if($resultado!=NULL){
                    
                                while($filas = mysqli_fetch_array($resultado)){
                                    echo "
                                        <option value=$filas[id_restaurante] >$filas[nomRes]</option>
                                    
                                    ";
                        
                                }
                        
                            }
                        ?>

                    </select>
                    </div>
                    <div>
                        <input class="btn" type="submit" value="Guardar Cambios">
                    </div>
                </form>
            </section>

            <section id="descuentos">
                <h2>Descuentos imperdibles</h2>
                <div class="contenedor-cards">

                <?php

                    $consulta = "SELECT * FROM descuentos";
                    $resultado = mysqli_query($con, $consulta);

                    if ($resultado != NULL) {
                        //mientras siga tirando resultado...
                        while ($filas = mysqli_fetch_array($resultado)) {
                            echo "
                <div class=card-desc>
                <p class=descuento>$filas[descuento]% OFF</p>
                <figure>
                <img src=../imgs/$filas[imagen] alt=$filas[nombreProd] >
                </figure>
                <h3>$filas[nombreProd]</h3>
                <p>$filas[descripcion]</p>

                <button><a href=baja/baja_descuentos.php?id=$filas[id_descuento] >Eliminar</a></button>
                </div>
                    ";
                        }
                    }
                    ?>

                </div>

                <div id="agregarDesc">
                    <h3>Agregar producto con descuento</h3>
                    <form action="alta/alta_descuentos.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="cantDesc">Cantidad de descuento:</label>
                            <input type="number" name="cantDesc" id="cantDesc">
                        </div>
                        <div>
                            <label for="fotoDesc">Imagen de producto:</label>
                            <input type="file" name="fotoDesc" id="fotoDesc">
                        </div>
                        <div>
                            <label for="tituloDesc">Nombre de producto:</label>
                            <input type="text" name="tituloDesc" id="tituloDesc">
                        </div>
                        <div>
                            <label for="descripDesc">Descripción del producto:</label>
                            <input type="text" name="descripDesc" id="descripDesc">
                        </div>

                        <div>
                            <input class="btn" type="submit" value="Guardar Cambios">
                        </div>
                    </form>
                </div>
            </section>
    </div>
    </main>

    <?php
    include_once("../components/footer.php");
    ?>
</body>

</html>