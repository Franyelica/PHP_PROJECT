<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="http://localhost/php/InicioSesion/login.css">
</head>

<body>
    <div class="login-container">
        <a href="http://localhost/php/index.php">
        <img src="Logo_RED.png" alt="Logo_RED">
        </a>
        <h3>Bienvenido</h3>
        <form method="post">
            <input type="text" placeholder="Correo Electronico" ><br>
            <input type="password" placeholder="Contraseña" ><br>
            <a href="../inventario/inventario.html">
                <button class="btnIniciarSesion" type="submit">Iniciar Sesion</button>
            </a>
        </form>

        <div class="botonR">
            <a href="http://localhost/php/Registrarse/registrarse.php">
                <button class="btnRegistrarse">Registrarse</button>
            </a>  
        </div>
          
        <!--Falta conectar registrarse con la pagina de registrarse
        de igual forma iniciar sesion con inventario
        -->
    </div>
</body>

</html>