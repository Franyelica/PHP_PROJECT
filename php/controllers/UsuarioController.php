<?php
require_once 'models/Usuario.php';

class UsuarioController{
    public function index(){
        echo "Controlador usuario - index";
    }
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($nombre && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save=$usuario->save();
                if($save){
                    $_SESSION['register']="complete";
                }else{
                    $_SESSION['register']="failed";
                }
            }else{
                $_SESSION['register']="failed";
            }
        }else{
            $_SESSION['register']="failed";
        }
        //header("Location:".BASE_URL.'usuario/signup');
    }

    public function login(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identificacion=$usuario->login();
            if($identificacion && is_object($identificacion)){
                $_SESSION['$identificacion']=$identificacion;
                if($identificacion->rol=='admin'){
                    $_SESSION['admin']=true;
                }else{
                    $_SESSION['error_login']="identificacion no valida";
                }
            }
        }
        //header("Location:".BASE_URL);
        //En este ejemplo, BASE_URL se define como una constante que contiene la URL base de tu sitio. 
        //Debes reemplazar 'http://localhost/tu_directorio/' con la URL real de tu sitio web.
    }
}
?>