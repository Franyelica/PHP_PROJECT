<?php
require_once 'Persona.php';
class Usuario extends Persona{
    private $email;
    private $password;
    private $rol;
    private $db;

    private $error;

    public function __construct(){
        $this->db = Database::connect();
        if ($this->db->connect_error) {
            throw new Exception("Error de conexión en Usuario: " . $this->db->connect_error);
        }
    }

    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

    public function getError() {
        return $this->error;
    }



    public function save() {
        $hashedPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);

        // Establecer el rol por defecto como 'admin'
        $rol = 'admin';

        $sql = "INSERT INTO usuarios 
                VALUES (null, '{$this->getNombre()}', '{$this->getEmail()}', '{$hashedPassword}', '{$rol}')";
                
        try {
            $save = $this->db->query($sql);

            if (!$save) {
                throw new Exception($this->db->error);
            }

            $result = true;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            $result = false;
        }

        return $result;
    }

    public function login(){
        $resultado=false;
        $email=$this->email;
        $password=$this->password;

        $sql="SELECT * FROM usuarios WHERE email='$email'";
        $login=$this->db->query($sql);
        if($login && $login->num_rows==1){
            //identifica la contraseña
            $usuario= $login->fetch_object();
            //verifica la contraseña
            $verify=password_verify($password,$usuario->password);
            if($verify){
                $resultado=$usuario;
            }
        }
        return $resultado;
    }

    public function update(){
        $sql= "UPDATE usuarios
        SET nombre = '{$this->getNombre()}'
        WHERE id=2";
    $saveupdate=$this->db->query($sql);
    return $saveupdate;
    }

}
?>