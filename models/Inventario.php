<?php
require_once 'Db.php';
require_once 'Persona.php';
require_once 'Categoria.php';
class Inventario extends Persona{
    private $cantidad;
    private $categoriaID;
    private $fechaCreacion;
    private $fechaModificacion;

    public function __construct($id,$nombre,$cantidad,Categoria $categoriaID = null,$fechaCreacion,$fechaModificacion){
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
    public function setCategoria(Categoria $categoriaID){
        $this->categoriaID = $categoriaID;
    }
    public function setFechaCreacion($fechaCreacion){
        $this->fechaCreacion = $fechaCreacion;
    }
    public function setFechaModificacion($fechaModificacion){
        $this->fechaModificacion = $fechaModificacion;
    }

    public function getCategoriaNombre($categoriaID) {
        $categoria = new Categoria($categoriaID, null, null, null);
        $nombreCategoria = $categoria->getNombreCategoriaById($categoriaID);
    
        return $nombreCategoria;
    }

    public function readInventario() {
        global $conn;

        try {
            $sql = "SELECT * FROM inventario";
            $stmt = $conn->query($sql);

            if ($stmt) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                mensaje("Error al recuperar el inventario.");
            }
        } catch (PDOException $e) {
            mensaje("Error: " . $e->getMessage());
        }
    }

    public function createInventario() {
        global $conn;
    
        try {
            $nombre = $this->getNombre();
            $categoriaID = $this->getCategoria()->getId(); // Obtener el ID de la categoría
            $cantidad = $this->getcantidad();
    
            // Obtener la fecha actual
            $fechaActual = date("Y-m-d H:i:s");
    
            $sql = "INSERT INTO inventario (nombre, categoria_id, cantidad, fecha_creacion, fecha_modificacion) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $categoriaID);
            $stmt->bindParam(3, $cantidad);
            $stmt->bindParam(4, $fechaActual);
            $stmt->bindParam(5, $fechaActual);
    
            if ($stmt->execute()) {
                mensaje("Producto agregado al inventario exitosamente.");
            } else {
                mensaje("Error al agregar el producto al inventario.");
            }
        } catch (PDOException $e) {
            mensaje("Error: " . $e->getMessage());
        }
    }
    public function updateInventario($id, $nombre, $categoriaID, $cantidad) {
        global $conn;
    
        try {
            // Obtener la fecha actual
            $fechaModificacion = date("Y-m-d H:i:s");
    
            $sql = "UPDATE inventario SET nombre = ?, categoria_id = ?, cantidad = ?, fecha_modificacion = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $categoriaID);
            $stmt->bindParam(3, $cantidad);
            $stmt->bindParam(4, $fechaModificacion);
            $stmt->bindParam(5, $id);
    
            if ($stmt->execute()) {
                mensaje("Producto actualizado exitosamente.");
            } else {
                mensaje("Error al actualizar el producto.");
            }
        } catch (PDOException $e) {
            mensaje("Error: " . $e->getMessage());
        }
    }
    
    
    public function deleteInventario($id) {
        global $conn;
    
        try {
            mensaje("Intentando eliminar el producto con ID: $id");
    
            $sql = "DELETE FROM inventario WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id);
    
            if ($stmt->execute()) {
                mensaje("Producto eliminado exitosamente.");
            } else {
                mensaje("Error al eliminar el producto.");
            }
        } catch (PDOException $e) {
            mensaje("Error: " . $e->getMessage());
        }
    }

    
}
?>