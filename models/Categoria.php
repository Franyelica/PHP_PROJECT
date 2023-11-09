<?php
require_once 'Persona.php';
class Categoria extends Persona{
    private $fechaCreacion;
    private $fechaModificacion;

    public function __construct($id, $nombre, $fechaCreacion, $fechaModificacion){
        parent::__construct($id,$nombre);
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaModificacion = $fechaModificacion;
    }

    public function getFechaCreacion(){
        return $this->fechaCreacion;
    }
    public function getFechaModificacion(){
        return $this->fechaModificacion;
    }

    public function setFechaCreacion($fechaCreacion){
        $this->fechaCreacion = $fechaCreacion;
    }
    public function setFechaModificacion($fechaModificacion){
        $this->fechaModificacion = $fechaModificacion;
    }

}
?>