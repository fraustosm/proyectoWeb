<?php
session_start();
if ($_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }
include '../db/connection.php';
include '../includes/functions.php';
include '../includes/header.php';

?>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/admin.css">
<?php

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    update_post($id, $_POST);
    header("Location: posts.php");
    exit;
}
?>
<h1>Editar publicación</h1>
<form method="POST">
  <label>Título</label>
  <input type="text" name="titulo" value="<?= htmlspecialchars($post['titulo']) ?>"><br>

  <label>Contenido</label>
  <textarea name="contenido"><?= htmlspecialchars($post['contenido']) ?></textarea><br>

  <label>Imagen</label>
  <input type="text" name="imagen" value="<?= htmlspecialchars($post['imagen']) ?>"><br>

  <button type="submit">Actualizar</button>
</form>
<?php include '../includes/footer.php'; ?>
