<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English 2learn - Blog</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 2rem;
            max-width: 1200px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 1rem;
        }

        p {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .post-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s;
        }

        .post-card:hover {
            transform: translateY(-5px);
        }

        .post-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .post-content {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .post-content h4 {
            margin: 0 0 0.5rem;
            color: #003366;
        }

        .post-content h4 a {
            color: inherit;
            text-decoration: none;
        }

        .post-content h4 a:hover {
            color: #0073e6;
        }

        .post-content p {
            flex: 1;
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 0.8rem;
        }

        .post-content small {
            color: #888;
            font-size: 0.85rem;
            text-align: right;
        }

        @media (max-width: 768px) {
            .post-card img {
                height: 160px;
            }
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../db/connection.php'; ?>

    <main>
        <section>
            <h2>Noticias</h2>
            <p>¡Entérate de las novedades!</p>
        </section>
        
        <section>
            <h3 style="text-align:center;">Últimas publicaciones</h3>
            <div class="posts-grid">
                <?php
                $sql = "SELECT id, titulo, contenido, fecha_publicacion, imagen FROM blog_posts ORDER BY fecha_publicacion DESC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='post-card'>";
                        
                        if (!empty($row["imagen"])) {
                            echo "<img src='../" . htmlspecialchars($row["imagen"]) . "' alt='Miniatura'>";
                        }

                        echo "<div class='post-content'>";
                        echo "<h4><a href='post.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["titulo"]) . "</a></h4>";
                        // Mostrar solo los primeros 200 caracteres
                        $contenido_preview = mb_substr(strip_tags($row["contenido"]), 0, 200) . '...';
                        echo "<p>" . htmlspecialchars($contenido_preview) . "</p>";
                        echo "<small>Publicado el: " . date("d-m-Y H:i", strtotime($row["fecha_publicacion"])) . "</small>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p style='text-align:center;'>No hay publicaciones aún.</p>";
                }

                $conn->close();
                ?>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
