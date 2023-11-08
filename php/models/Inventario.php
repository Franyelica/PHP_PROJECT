<?php
require_once 'Persona.php';
class Inventario extends Persona{
    private $cantidad;
    private $categoriaID;
    private $fechaCreacion;
    private $fechaModificacion;

    public function __construct($id,$nombre,$cantidad,Categoria $categoriaID,$fechaCreacion,$fechaModificacion){
        parent::__construct($id,$nombre);
        $this->cantidad = $cantidad;
        $this->categoriaID = $categoriaID;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaModificacion = $fechaModificacion;
    }


    public function getcantidad(){
        return $this->cantidad;
    }
    public function getCategoria(){
        return $this->categoriaID;
    }
    public function getFechaCreacion(){
        return $this->fechaCreacion;
    }
    public function getFechaModificacion(){
        return $this->fechaModificacion;
    }


    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    public function setcategoria(Categoria $categoriaID){
        $this->categoriaID = $categoriaID;
    }
    public function setFechaCreacion($fechaCreacion){
        $this->fechaCreacion = $fechaCreacion;
    }
    public function setFechaModificacion($fechaModificacion){
        $this->fechaModificacion = $fechaModificacion;
    }
}
?>