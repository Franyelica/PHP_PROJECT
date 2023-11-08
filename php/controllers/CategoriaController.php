<?php
require_once 'Db.php';

class CategoriaController {
    private $conexion;

    public function __construct() {
        $this->conexion = Database::connect();
    }

    public function crearCategoria($nombre) {
        $nombre = $this->conexion->real_escape_string($nombre);

        // Utiliza la función NOW() de MySQL para establecer la fecha de creación automáticamente.
        $sql = "INSERT INTO categoria (nombre, fechaCreacion, fechaModificacion) VALUES ('$nombre', NOW(), NOW())";

        if ($this->conexion->query($sql)) {
            return "Categoría creada exitosamente.";
        } else {
            return "Error al crear la categoría: " . $this->conexion->error;
        }
    }

    public function actualizarCategoria($id, $nuevoNombre) {
        $nuevoNombre = $this->conexion->real_escape_string($nuevoNombre);

        // Utiliza la función NOW() de MySQL para actualizar la fecha de modificación automáticamente.
        $sql = "UPDATE categoria SET nombre = '$nuevoNombre', fechaModificacion = NOW() WHERE id = $id";

        if ($this->conexion->query($sql)) {
            return "Categoría actualizada exitosamente.";
        } else {
            return "Error al actualizar la categoría: " . $this->conexion->error;
        }
    }

    public function consultarCategoria($id) {
        $id = $this->conexion->real_escape_string($id);
        $sql = "SELECT * FROM categoria WHERE id = $id";
        $result = $this->conexion->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function eliminarCategoria($id) {
        $id = $this->conexion->real_escape_string($id);
        $sql = "DELETE FROM categoria WHERE id = $id";
        if ($this->conexion->query($sql)) {
            return "Categoría eliminada exitosamente.";
        } else {
            return "Error al eliminar la categoría: " . $this->conexion->error;
        }
    }
}

?>