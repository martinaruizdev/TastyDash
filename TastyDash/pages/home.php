<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>TastyDash - Martina Ruiz</title>
</head>

<body>
    <div id="wrapper">
        <header>
        <?php
        include_once("../components/nav.php");
        ?>
        <div id="hero-header">
            <div id="texto-hero">
                <h1>Descubre <span>restaurantes</span> y ordena tus comidas favoritas</h1>
                <h2>Explora sabores auténticos desde la comodidad de tu casa con TastyDash.</h2>
                <button><a href="#categorias">Ordena ahora</a></button>
            </div>
            <div id="burrito">
                <figure>
                    <img src="../imgs/burrito.png">
                </figure>
            </div>
            </div>
        </header>

        <main>
            <section id="categorias">
                <h2>Categorías</h2>
                <div class="contenedor-cards">

                    <?php
                    include_once("../connect/conf.php");

                    if ($con != NULL) {

                        $consulta = "SELECT * FROM categorias";
                        $resultado = mysqli_query($con, $consulta);

                        if ($resultado != NULL) {
                            //mientras siga tirando resultado...
                            while ($filas = mysqli_fetch_array($resultado)) {
                                echo "
                <div class=card>
                <h3><a href=restaurantes.php?categoria=$filas[id_categoria] id=link> $filas[tipo] </a></h3>
                </div>
                    ";
                            }
                        }
                    } else {
                        echo "<h1>Error en la conexión con la BD</h1>";
                    }
                    ?>

                </div>
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
                            <button><a href=>Ordenar</a></button>
                            </div>
                    ";
                        }
                    }
                    ?>

                </div>
            </section>
    </div>

    <section id="section-naranja">
        <figure>
        <img src="../imgs/fondo1.png" alt="pastas">
        </figure>

        <div id="texto-naranja">
        <h3>¿Qué es TastyDash?</h3>
        <p>En TastyDash, nos apasiona llevarte lo mejor de la gastronomía local e internacional, directamente a la comodidad de tu hogar. Con nuestra app, disfrutar de tus platos favoritos nunca ha sido tan fácil y conveniente. Colaboramos con una amplia red de restaurantes, asegurándonos de ofrecerte una diversidad culinaria que abarca desde las recetas más tradicionales hasta las más innovadoras. En TastyDash tenemos justo lo que necesitas. Nuestra misión es transformar cada comida en una experiencia memorable, garantizando rapidez, calidad y sabor en cada entrega. Descubre una nueva forma de disfrutar de la comida con TastyDash, donde tu satisfacción es nuestra prioridad.</p>
        </div>

    </section>

    <section id="section-hamb">
        <div id="texto-hamb">
        <h3>¿Por Qué Elegir TastyDash?</h3>
        <ul>
            <li><strong>Variedad:</strong> Ofrecemos una amplia gama de opciones culinarias para satisfacer todos los paladares.</li>
            <li><strong>Rapidez:</strong> Nos aseguramos de que tu comida llegue caliente y a tiempo.</li>
            <li><strong>Calidad:</strong> Trabajamos solo con los mejores restaurantes, garantizando que cada bocado sea una experiencia deliciosa.</li>
            <li><strong>Comodidad:</strong> Realiza tu pedido fácilmente desde nuestro sitio web o nuestra app móvil, disponible en iOS y Android.</li>
        </ul>
        <p>No esperes más. Descarga la app de TastyDash y comienza a disfrutar de una experiencia gastronómica única, sin moverte de tu casa.</p>
        </div>

        <figure>
            <img src="../imgs/fondo2.png" alt="hamburguesa">
        </figure>
    </section>
    </main>

    <?php
    include_once("../components/footer.php");
    ?>
</body>

</html>