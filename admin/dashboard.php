<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../includes/header.php';
?>

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

<!-- Clima -->
<div id="weather-card" style="padding:1rem; border:1px solid #ccc; border-radius:8px; width:300px;">
  <h3>🌤 Clima en tu ciudad</h3>
  <input type="text" id="weather-city" placeholder="Escribe una ciudad" style="width:100%; padding:0.5rem; margin-bottom:0.5rem;">
  <button id="weather-btn" class="btn glow-on-hover" style="width:100%; margin-bottom:1rem;">Buscar</button>
  <p id="weather-temp">Cargando...</p>
  <p id="weather-desc"></p>
  <p id="weather-humid"></p>
  <img id="weather-icon" style="width:60px; height:60px;" />
</div>

<div style="text-align:center; margin: 2rem;">
    <a href="logout.php" class="btn glow-on-hover">🚪 Cerrar sesión</a>
</div>

<?php include '../includes/footer.php'; ?>

<!-- JS WebSocket -->
<script>
const wsPort = <?php echo json_encode(getenv('WS_PORT') ?: 8080); ?>;
const ws = new WebSocket(`ws://${location.hostname}:${wsPort}`);

ws.onmessage = event => {
    const d = JSON.parse(event.data);
    document.getElementById('weather-temp').innerText = `🌡 ${d.temp} °C`;
    document.getElementById('weather-desc').innerText = d.description;
    document.getElementById('weather-humid').innerText = `💧 Humedad: ${d.humidity}%`;
    document.getElementById('weather-icon').src = d.icon.startsWith('http') ? d.icon : 'https:' + d.icon;
};

// Botón para enviar nueva ciudad
document.getElementById('weather-btn').addEventListener('click', () => {
    const city = document.getElementById('weather-city').value.trim();
    if (city) ws.send(JSON.stringify({ city }));
});

// Enter en el input
document.getElementById('weather-city').addEventListener('keypress', (e) => {
    if (e.key === 'Enter') document.getElementById('weather-btn').click();
});
</script>
