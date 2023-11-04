<?php>
<?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMVL</title>
    <link rel="stylesheet" href="../assets/estilos.css">
</head>

<body>
    <!-----HEADER----->
    <?php require('../layout/header.html')?>
    <!----CUERPO---->
    <!------------SECCION 1------------------>
    <div class="seccion1">
        <div class="texto1">
            <div id="somos">
                <h3>SOMOS</h3>
            </div>
            <div>
                <img src="../assets/img/linea_seccion1-removebg-preview.png">
            </div>
            <div id="parrafo">
                <p>Formamos parte de la Red de Músicas de Medellín es un proyecto de la
                    Alcaldía de Medellín que aporta al fortalecimiento de la cultura ciudadana
                    a través de la formación musical de niños, niñas, adolescentes y jóvenes.</p>
            </div>
            <div>
                <a
                    href="https://www.medellin.gov.co/es/secretaria-cultura-ciudadana/red-de-practicas-artisticas-y-culturales/red-de-musicas-de-medellin/">
                    <button id="boton1">Más de nosotros</button>
                </a>
            </div>
        </div>

        <div class="image1">
            <img src="../assets/img/escuela2.0.png" alt="">
        </div>
    </div>
    <!------------SECCION 2------------------>
    <div class="seccion2">
        <div class="texto2">
            <div>
                <h3>NUESTROS PROCESOS</h3>
            </div>
            <div>
                <img src="../assets/img/linea_seccion1-removebg-preview.png" alt="">
            </div>
        </div>

        <div class="procesos">
            <div class="iniciacion">
                <div>
                    <img src="../assets/img/music-clef.png" alt="">
                </div>
                <div>
                    <p>Iniciacion musical</p>
                </div>
            </div>

            <div class="canto">
                <div>
                    <img src="../assets/img/microphone.png" alt="">
                </div>
                <div>
                    <p>Canto y movimiento</p>
                </div>
            </div>

            <div class="infancia">
                <div>
                    <img src="../assets/img/mental-health.png" alt="">
                </div>
                <div>
                    <p>Primera infancia</p>
                </div>
            </div>

            <div class="instrumento">
                <div>
                    <img src="../assets/img/violin.png" alt="">
                </div>
                <div>
                    <p>Instrumento</p>
                </div>
            </div>

        </div>

    </div>

    <!------------SECCION 3------------------>
    <div class="seccion3">
        <div class="formas">
            <div><img src="../assets/img/Frame 1.png" alt=""></div>
        </div>

        <div class="texto3">
            <div id="text">
                <h3>AQUÍ PODRÁS</h3>
            </div>
            <div>
                <img src="../assets/img/linea_seccion1-removebg-preview.png" alt="">
            </div>
            <div>
                <p>Gestionar el inventario de la escuela, de forma ágil y segura.</p>
            </div>
            <div>
                <a href="http://localhost/php/InicioSesion/Login.php">
                    <button id="boton2">Comenzar</button>
                </a>

            </div>
        </div>

    </div>

    <!------FOOTER------>
    <?php require('../layout/footer.html')?>
</body>

</html>