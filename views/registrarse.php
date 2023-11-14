<?php
require '../models/Db.php';

$message = '';

if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $rol = 'user';

    $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':rol', $rol);

    if ($stmt->execute()) {
        $message = 'Nuevo usuario creado satisfactoriamente';
    } else {
        $message = 'Lo sentimos, hay un error en el formulario';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/registrarse.css">
    <link rel="icon" href="../../PHP_PROJECT/assets/img/REMM.jpg" type="image/png">
    <script src="Scrypts/registrarse.js"></script>
</head>

<body>
    <!-- HEADER -->
    <?php 
    require('../layout/header.html');
    ?>
    
    <div class="login-container">
        <h3>Crear Cuenta</h3>
        <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" placeholder="Nombre" name="nombre"><br>
            <input type="text" placeholder="Correo Electronico" name="email"><br>
            <input type="password" placeholder="Contraseña" name="password"><br>
            <!-- Cambia el tipo de botón a "submit" -->
            <button class="btnRegistrarse" type="submit">Registrarse</button>
        </form>
        <!-- Falta conectar registrarse con la página del inventario -->
    </div>
    
    <!-- FOOTER -->
    <?php require('../layout/footer.html')?>
</body>

</html>
