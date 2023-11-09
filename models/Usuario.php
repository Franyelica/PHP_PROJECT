<?php
require_once 'Persona.php';
class Usuario extends Persona{
    private $email;
    private $password;
    private $rol;
    private $db;

    public function __construct(){
        //$this->db=Database::connect();
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
        $this->password = $password;
    }



    public function save(){
        $sql="INSERT INTO usuarios VALUES(null,'
            {$this->getNombre()}','
            {$this->getEmail()}','
            {$this->getPassword()}','
            user');";
        $save=$this->db->query($sql);
        $result = false;
        if($save){
            $result=true;
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