<?php
session_start();
include 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, nombre, password, role FROM usuarios WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $nombre, $hash, $role);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (hash('sha256', $pass) === $hash) {
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: pages/index.php");
            }
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h1>Login</h1>
<form method="POST">
  <label>Email:</label>
  <input type="email" name="email"><br>
  <label>Contraseña:</label>
  <input type="password" name="password"><br>
  <button type="submit">Ingresar</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
