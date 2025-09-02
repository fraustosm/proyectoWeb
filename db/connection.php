<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = ""; 
$database = "english2learn"; 

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
