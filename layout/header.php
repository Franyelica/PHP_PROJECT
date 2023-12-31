<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../../PHP_PROJECT/assets/NewHeader.css">

<body>

    <!---ENCABEZADO--->
    <header>
        <div class="header-container">
            <div class="elementos">
                <div class="logo">
                    <img src="../../PHP_PROJECT/assets/img/REMM3.png" alt="Logo_Red">
                </div>
                <div id="titulo">
                    <h2>Escuela de Musica Villa Laura</h2>
                </div>

                <div id="menu">
                    <?php if(!empty($usuario)): ?>
                    <p> <br> Bienvenido<br>
                        <?= $usuario['email']; ?>
                    <br>Tu sesion esta iniciada</p>
                    <a href="logout.php">
                        <img src="../../PHP_PROJECT/assets/img/login.png" alt="logout">
                        <!--Finalizar sesion-->
                    </a> 
                    <?php else: ?>
                    <a href="http://localhost/PHP_PROJECT/views/Login.php">
                        <img src="../../PHP_PROJECT/assets/img/Vector.png" alt="login">
                    </a>
                    <!--<h1>Porfavor inicia o registra una sesion</h1>-->
                    <?php endif; ?>
                    <!--<a href="http://localhost/PHP_PROJECT/views/Login.php">
                        <img src="../../PHP_PROJECT/assets/img/login.png" alt="login">
                    </a>-->
                    <a href="http://localhost/PHP_PROJECT/views/inventario.php">
                        <img src="../../PHP_PROJECT/assets/img/inventory.png" alt="inventario">
                    </a>
                    <a href="http://localhost/PHP_PROJECT/">
                        <img src="../../PHP_PROJECT/assets/img/home.png" alt="casa">
                    </a>
                </div>
            </div>
        </div>
    </header>
</body>

</html>