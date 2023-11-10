<?php
require '../models/Db.php';

class InventarioController {
    private $conexion;

    public function __construct() {
        $this->conexion = Database::connect();
    }

    public function crearInventario($nombre, $cantidad, $categoriaID) {
        $nombre = $this->conexion->real_escape_string($nombre);
        $categoriaID = $this->conexion->real_escape_string($categoriaID);

        // Utiliza la función NOW() de MySQL para establecer la fecha de creación automáticamente.
        $sql = "INSERT INTO inventario (nombre, cantidad, categoriaID, fechaCreacion, fechaModificacion)
                VALUES ('$nombre', $cantidad, $categoriaID, NOW(), NOW())";

        if ($this->conexion->query($sql)) {
            return "Elemento de inventario creado exitosamente.";
        } else {
            return "Error al crear el elemento: " . $this->conexion->error;
        }
    }

    public function actualizarInventario($id, $nuevoNombre, $nuevaCantidad, $nuevoCategoriaID) {
        $nuevoNombre = $this->conexion->real_escape_string($nuevoNombre);
        $nuevoCategoriaID = $this->conexion->real_escape_string($nuevoCategoriaID);

        // Utiliza la función NOW() de MySQL para actualizar la fecha de modificación automáticamente.
        $sql = "UPDATE inventario SET nombre = '$nuevoNombre', cantidad = $nuevaCantidad, categoriaID = $nuevoCategoriaID, fechaModificacion = NOW() WHERE id = $id";

        if ($this->conexion->query($sql)) {
            return "Elemento de inventario actualizado exitosamente.";
        } else {
            return "Error al actualizar el elemento: " . $this->conexion->error;
        }
    }

    public function consultarInventario($id) {
        $id = $this->conexion->real_escape_string($id);
        $sql = "SELECT * FROM inventario WHERE id = $id";
        $result = $this->conexion->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function eliminarInventario($id) {
        $id = $this->conexion->real_escape_string($id);
        $sql = "DELETE FROM inventario WHERE id = $id";
        if ($this->conexion->query($sql)) {
            return "Elemento de inventario eliminado exitosamente.";
        } else {
            return "Error al eliminar el elemento: " . $this->conexion->error;
        }
    }
}

?>