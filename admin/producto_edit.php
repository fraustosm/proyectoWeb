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
$stmt = $conn->prepare("SELECT * FROM productos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    update_product($id, $_POST);
    header("Location: productos.php");
    exit;
}
?>
<h1>Editar producto</h1>
<form method="POST">
  <label>Producto</label>
  <input type="text" name="producto" value="<?= htmlspecialchars($product['producto']) ?>"><br>

  <label>Descripción</label>
  <textarea name="descripcion"><?= htmlspecialchars($product['descripcion']) ?></textarea><br>

  <label>Precio</label>
  <input type="text" name="precio" value="<?= $product['precio'] ?>"><br>

  <label>Imagen</label>
  <input type="text" name="imagen" value="<?= htmlspecialchars($product['imagen']) ?>"><br>

  <label>Fecha de lanzamiento</label>
  <input type="date" name="fecha_lanzamiento" value="<?= $product['fecha_lanzamiento'] ?>"><br>

  <label>Destacado</label>
  <input type="checkbox" name="destacado" value="1" <?= $product['destacado'] ? 'checked' : '' ?>><br>

  <button type="submit">Actualizar</button>
</form>
<?php include '../includes/footer.php'; ?>
