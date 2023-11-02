<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="registrarse.css">
</head>

<body>

    <div class="login-container">
        <img src="../assets/img/logo_RED3-removebg-preview.png" alt="Logo_RED">
        <h3>Crear Cuenta</h3>
        <form method="post">
            <input type="text" name="nombre" placeholder="Nombre" required><br>
            <input type="text" placeholder="Correo Electronico" required><br>
            <input type="password" placeholder="Contraseña" required><br>
            <button class="btnRegistrarse" type="submit">Registrarse</button>
        </form>
        <!--Falta conectar registrarse con la pagina del inventario
        -->
    </div>

    <!---FOOTER----->
    <footer>
        <div class="footer-container">
            <div class="logos">
                <div id="alcaldia">
                    <img src="../assets/img/Alcaldia-removebg-preview.png" alt="Logo_alcaldia" width="100px">
                </div>
                <div id="udea">
                    <img src="../assets/img/UDEAprueba4-removebg-preview.png" alt="logoUDEA">
                </div>
                <div id="red">
                    <img src="../assets/img/logo_RED3-removebg-preview.png" alt="Logo_RED">
                </div>
            </div>
            <div class="informacion">
                <div class="contacto">
                    <h5>CONTACTO</h5>
                    <p>(+57) 123 555 7777</p>
                </div>
                <div class="direccion">
                    <h5>DIRECCIÓN</h5>
                    <p>Cl. 34d #91-76<br>La América-Medellín</p>
                </div>
            </div>
            <div class="derechos">
                <p>Derechos de autor © 2023. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>