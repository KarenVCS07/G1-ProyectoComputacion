<?php
// db_connect.php: Conexión a la base de datos
$host = 'localhost';
$db = 'tienda_tecnologica';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
