<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/registrarse.css">
    <script src="Scrypts/registrarse.js"></script>
</head>

<body>
    <!-- HEADER -->
    <?php 
    require('../layout/header.html');
    if (file_exists('../controllers/UsuarioController.php')) {
        require_once '../controllers/UsuarioController.php'; 
    } else {
        echo "Error: El controlador no está disponible.";
        exit();
    }
    ?>

    <div class="login-container">
        <h3>Crear Cuenta</h3>
        <form method="post">
            <input type="text" placeholder="Nombre" name="nombre"><br>
            <input type="text" placeholder="Correo Electronico" name="email"><br>
            <input type="password" placeholder="Contraseña" name="password"><br>
            <button class="btnRegistrarse" type="button" onclick="registrarUsuario()">Registrarse</button>
        </form>
        <!-- Falta conectar registrarse con la pagina del inventario -->
    </div>
    
    <!-- FOOTER -->
    <?php require('../layout/footer.html')?>
</body>

</html>
