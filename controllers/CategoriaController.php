<?php
require_once 'Db.php';

class CategoriaController {
    private $conexion;

    public function __construct() {
        $this->conexion = Database::connect();
    }

    public function consultarTodasLasCategorias() {
        $sql = "SELECT * FROM categoria";
        $result = $this->conexion->query($sql);
        $categorias = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $categorias[] = $row;
            }
        }

        return $categorias;
    }

    public function crearCategoria($nombre) {
        try {
            $sql = "INSERT INTO categoria (nombre, fechaCreacion, fechaModificacion) VALUES (?, NOW(), NOW())";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $nombre);

            if ($stmt->execute()) {
                return "Categoría creada exitosamente.";
            } else {
                throw new Exception("Error al crear la categoría.");
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
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