<?php
// Verifica si el usuario ya ha iniciado sesión, si es así, redirige a la página de inicio
if (isset($_SESSION['usuario'])) {
    header("Location: inicio.php");
    exit();
}

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Realiza la autenticación utilizando la clase Usuario (esto es solo un ejemplo, en la práctica, consulta una base de datos)
    //$usuarioAutenticado = Usuario::autenticar($email, $password);

    if ($usuarioAutenticado) {
        // Inicio de sesión exitoso, crea una sesión
        $_SESSION['usuario'] = $usuarioAutenticado;
        header("Location: inicio.php");
        exit();
    } else {
        $mensajeError = "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
}

?>