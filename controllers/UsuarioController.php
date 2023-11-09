<?php
namespace PHP_PROJECT\Controllers;

use Exception;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Asegúrate de iniciar la sesión

require_once '../models/Usuario.php';

class UsuarioController {

    public function registro() {
        require_once '../views/registrarse.php';
    }

    public function save() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;

                if ($nombre && $email && $password) {
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
                    $save = $usuario->save();

                    if ($save) {
                        // Respuesta JSON en caso de éxito
                        echo json_encode(['success' => true, 'redirect' => 'http://localhost/PHP_PROJECT/views/Login.php']);
                        exit();
                    } else {
                        throw new Exception($usuario->getError());
                    }
                } else {
                    throw new Exception("Por favor, complete todos los campos.");
                }
            } else {
                throw new Exception("Método de solicitud no permitido.");
            }
        } catch (Exception $e) {
            // Respuesta JSON en caso de error
            echo json_encode(['success' => false, 'error_message' => $e->getMessage()]);
            exit();
        }
    }

    public function login() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identificacion = $usuario->login();

            if ($identificacion && is_object($identificacion)) {
                $_SESSION['$identificacion'] = $identificacion;

                if ($identificacion->rol == 'admin') {
                    $_SESSION['admin'] = true;
                } else {
                    $_SESSION['error_login'] = "Identificación no válida";
                }
            }
        }
    }
}
?>
