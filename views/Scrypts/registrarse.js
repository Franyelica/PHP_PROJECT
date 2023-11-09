function registrarUsuario() {
    const nombre = document.querySelector('input[name="nombre"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;

    fetch('../controllers/UsuarioController.php?action=save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nombre=${nombre}&email=${email}&password=${password}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirige a la página de inicio de sesión en caso de éxito
            window.location.href = data.redirect;
        } else {
            // Muestra el mensaje de error en caso de falla
            alert(data.error_message);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud fetch:', error);
    });
}