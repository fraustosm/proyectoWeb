<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../includes/header.php';
include '../db/connection.php';
?>

<!-- Importar estilos -->
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/admin.css">

<section class="products-hero">
    <h2>Gestión de Publicaciones</h2>
    <p>Administra el contenido de tu blog o noticias</p>
</section>

<div class="admin-container">
    <div class="admin-header">
        <a href="post_add.php" class="btn glow-on-hover">➕ Crear publicación</a>
        <a href="dashboard.php" class="btn">⬅ Volver</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM blog_posts ORDER BY fecha_publicacion DESC");
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['titulo']); ?></td>
                    <td><?= $row['fecha_publicacion']; ?></td>
                    <td>
                        <a href="post_edit.php?id=<?= $row['id']; ?>" class="btn">✏ Editar</a>
                        <a href="post_delete.php?id=<?= $row['id']; ?>" class="btn" onclick="return confirm('¿Eliminar esta publicación?')">🗑 Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
