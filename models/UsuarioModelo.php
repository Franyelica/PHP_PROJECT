<?php
require_once 'Db.php';
require_once 'Persona.php';

class UsuarioModelo extends Persona {
    private $correo;
    private $mensaje;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function guardarContactenos() {
        $sql = "INSERT INTO tblContacto (nombre, correo, mensaje) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $this->getNombre(), $this->getCorreo(), $this->getMensaje());

        if ($stmt->execute()) {
            $result = true;
        } else {
            $result = false;
        }

        $stmt->close();

        return $result;
    }
}
?>
