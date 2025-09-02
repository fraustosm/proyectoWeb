<?php
session_start();
if ($_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }
include '../db/connection.php';
include '../includes/header.php';
?>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/admin.css">
<?php

$result = $conn->query("SELECT * FROM productos ORDER BY fecha_lanzamiento DESC");
?>
<h1>Productos</h1>
<a href="producto_add.php">➕ Añadir producto</a>
<table>
<tr><th>ID</th><th>Producto</th><th>Precio</th><th>Acciones</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['producto']) ?></td>
  <td>$<?= number_format($row['precio'], 2) ?></td>
  <td>
    <a href="producto_edit.php?id=<?= $row['id'] ?>">✏️ Editar</a> | 
    <a href="producto_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">🗑 Eliminar</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
<?php include '../includes/footer.php'; ?>
