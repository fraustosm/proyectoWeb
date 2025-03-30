<?php
$servername = "127.0.0.1"; // Usa 127.0.0.1 en vez de localhost si hay problemas
$username = "root"; 
$password = ""; 
$database = "english2learn"; 

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
