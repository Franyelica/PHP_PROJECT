<?php
require_once 'Db.php';
require_once 'Persona.php';

class Categoria extends Persona {
    private $fechaCreacion;
    private $fechaModificacion;

    public function __construct($id, $nombre, $fechaCreacion, $fechaModificacion) {
        parent::__construct($id, $nombre);
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaModificacion = $fechaModificacion;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function getFechaModificacion() {
        return $this->fechaModificacion;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function setFechaModificacion($fechaModificacion) {
        $this->fechaModificacion = $fechaModificacion;
    }

    public function createCategoria() {
        global $conn;
    
        try {
            $nombre = $this->getNombre(); // Almacenar el valor en una variable temporal
            $sql = "INSERT INTO categoria (nombre_categoria, fecha_creacion, fecha_modificacion) VALUES (?, NOW(), NOW())";
            $stmt = $conn->prepare($sql);
            
            // Usar la variable temporal en bindParam
            $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                mensaje("Categoría creada exitosamente.");
            } else {
                mensaje("Error al crear la categoría.");
            }
        } catch (PDOException $e) {
            mensaje("Error: " . $e->getMessage());
        }
    }
    
    public function readCategorias() {
        global $conn;

        try {
            $sql = "SELECT * FROM categoria";
            $stmt = $conn->query($sql);

            if ($stmt) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                mensaje("Error al recuperar las categorías.");
            }
        } catch (PDOException $e) {
            mensaje("Error: " . $e->getMessage());
        }
    }

    public function updateCategoria($id)
{
    global $conn;

    try {
        $sql = "UPDATE categoria SET nombre_categoria = ?, fecha_modificacion = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Almacena el valor de $this->getNombre() en una variable
        $nombre = $this->getNombre();

        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            mensaje("Categoría actualizada exitosamente.");
        } else {
            mensaje("Error al actualizar la categoría.");
        }
    } catch (PDOException $e) {
        mensaje("Error: " . $e->getMessage());
    }
}


    public function deleteCategoria($id)
{
    global $conn;

    try {
        $sql = "DELETE FROM categoria WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT); // Asegúrate de indicar que es un parámetro entero

        if ($stmt->execute()) {
            mensaje("Categoría eliminada exitosamente.");
        } else {
            mensaje("Error al eliminar la categoría.");
        }
    } catch (PDOException $e) {
        mensaje("Error: " . $e->getMessage());
    }
}


}
?>