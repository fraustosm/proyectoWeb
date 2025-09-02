<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../includes/header.php';
?>

<!-- Importar estilos -->
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/admin.css">

<section class="admin-hero">
    <div class="container-hero">
        <h1 class="admin-title">Panel de Administración</h1>
        <p>Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?> 👋</p>
    </div>
</section>

<section class="services">
    <div class="services-container">
        <div class="service-card">
            <h4>📦 Productos</h4>
            <p>Gestiona todos los productos de la tienda.</p>
            <a href="productos.php" class="btn glow-on-hover">🔍 Ver lista</a>
            <a href="producto_add.php" class="btn glow-on-hover">➕ Añadir nuevo</a>
        </div>
        <div class="service-card">
            <h4>📝 Publicaciones</h4>
            <p>Administra las entradas del blog.</p>
            <a href="posts.php" class="btn glow-on-hover">🔍 Ver lista</a>
            <a href="post_add.php" class="btn glow-on-hover">➕ Crear nueva</a>
        </div>
    </div>
</section>

<div style="text-align:center; margin: 2rem;">
    <a href="logout.php" class="btn glow-on-hover">🚪 Cerrar sesión</a>
</div>

<?php include '../includes/footer.php'; ?>
