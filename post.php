<?php
include './../proyectoWeb/includes/header.php'; 
include './db/connection.php';

// Verificar si hay un ID de post en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Consultar el post
    $sql = "SELECT titulo, contenido, fecha_publicacion, imagen FROM blog_posts WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $post = $result->fetch_assoc();
    } else {
        echo "<p style='padding:2rem;'>Publicación no encontrada.</p>";
        include 'includes/footer.php';
        exit;
    }
} else {
    echo "<p style='padding:2rem;'>ID inválido.</p>";
    include 'includes/footer.php';
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['titulo']) ?> - English 2learn</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        main {
            max-width: 800px;
            margin: auto;
            padding: 2rem;
            font-family: "winky sans", sans-serif;
            font-optical-sizing: auto;
            line-height: 1.6;
        }

        h2 {
            color: #003366;
            margin-bottom: 1rem;
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 1rem 0;
        }

        .fecha {
            font-size: 0.9rem;
            color: #888;
        }

        .contenido {
            white-space: pre-wrap;
        }

        a.back {
            display: inline-block;
            margin-top: 2rem;
            text-decoration: none;
            color: #0056b3;
        }

        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<main>
    <h2><?= htmlspecialchars($post['titulo']) ?></h2>
    <p class="fecha">Publicado el: <?= date("d-m-Y H:i", strtotime($post['fecha_publicacion'])) ?></p>

    <?php if (!empty($post["imagen"])): ?>
        <img src="../<?= htmlspecialchars($post["imagen"]) ?>" alt="Imagen destacada">
    <?php endif; ?>

    <div class="contenido">
        <?= nl2br(htmlspecialchars($post['contenido'])) ?>
    </div>

    <a href="/noticias.php" class="back">← Volver a la sección de noticias</a>
</main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
