<?php
//conexion de la base de datos
$host = 'localhost';
$dbSchool = 'dbSchool';

try{
    $pdo = new PDO("mysql:host=$host;dbShool=$dbShool");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error de conexion: ". $e->getMessage());
}

//CREATE
function crearCategoria($nombre){
    global $pdo;
    $stmt= $pdo->prepare("INSERT INTO Categoria(nombre) VALUES (:nombre)");
    $stmt->bindParam(':nombre', $nombre);
    return $stmt->execute();
}

function obtenerCategorias(){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM Categoria");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>