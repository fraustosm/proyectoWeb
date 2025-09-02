<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English 2learn</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <link rel="stylesheet" href="/css/admin.css">
    <?php endif; ?>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="/img/logo.png" alt="Logo de English 2learn" class="logo">
        <h1>English 2learn</h1>
    </div>
    
    <div class="nav-bar">
        <nav>
            <ul>
                <li><a href="/index.php">Inicio</a></li>
                <li><a href="/servicios.php">Productos</a></li>
                <li><a href="/contacto.php">Contacto</a></li>
                <li><a href="/aboutus.php">Sobre nosotros</a></li>
                <li><a href="/noticias.php">Noticias</a></li>
                
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="/admin/dashboard.php">Panel Admin</a></li>
                    <li><a href="/admin/logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li><a href="/login.php">Login</a></li>
                    <li><a href="/registro.php">Registro</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<main>