<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="../assets/login.css">
</head>

<body>

    <!-----HEADER----->
    <?php require('../layout/header.html')?>

    <div class="login-container">
        <h3>Bienvenido</h3>
        <form method="post">
            <input type="text" placeholder="Correo Electronico" name="email" ><br>
            <input type="password" placeholder="Contraseña" name="password"><br>
            <a href="../inventario/inventario.html">
                <button class="btnIniciarSesion" type="submit">Iniciar Sesion</button>
            </a>
        </form>

        <div class="botonR">
            <a href="http://localhost/PHP_PROJECT/views/registrarse.php">
                <button class="btnRegistrarse">Registrarse</button>
            </a>
        </div>
    </div>

    <!---FOOTER----->
    <?php require('../layout/footer.html')?>
</body>

</html>