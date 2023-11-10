<?php

session_start();

require '../models/Db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['usuario_id'] = $results['id'];

        // Cargar más información del usuario si es necesario
        $userRecords = $conn->prepare('SELECT nombre, rol FROM usuarios WHERE id = :id');
        $userRecords->bindParam(':id', $_SESSION['usuario_id']);
        $userRecords->execute();
        $userData = $userRecords->fetch(PDO::FETCH_ASSOC);

        // Almacena información adicional en la sesión
        $_SESSION['usuario_nombre'] = $userData['nombre'];
        $_SESSION['usuario_rol'] = $userData['rol'];

        // Redirigir a la página deseada
        header('Location: ../index.php');
        exit();
    } else {
        $message = 'Lo sentimos, las credenciales no coinciden';
    }
}

?>

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
        <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
        <form method="POST">
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