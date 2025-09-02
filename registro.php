<?php
include 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, role) VALUES (?, ?, ?, 'client')");
    $stmt->bind_param("sss", $nombre, $email, $password);
    $stmt->execute();

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Registro</title></head>
<body>
<h1>Registro</h1>
<form method="POST">
  <label>Nombre:</label>
  <input type="text" name="nombre"><br>
  <label>Email:</label>
  <input type="email" name="email"><br>
  <label>Contraseña:</label>
  <input type="password" name="password"><br>
  <button type="submit">Registrar</button>
</form>
</body>
</html>
