<?php
    class Database {
        public static function connect() {
            $conexion = new mysqli("localhost", "root", "", "escuelamusicadb");
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
        }
    }

?>
