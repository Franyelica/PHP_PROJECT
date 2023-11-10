<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'escuelamusicadb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
} catch (PDOException $e) {
    throw new Exception('Error al conectar con la base de datos: ' . $e->getMessage());
}
?>
