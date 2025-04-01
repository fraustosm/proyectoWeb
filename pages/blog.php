<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English 2learn - Blog</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../db/connection.php'; ?>

    <main>
        <section>
            <h2>Noticias</h2>
            <p>Entérate de las novedades!</p>
        </section>
        
        <section>
            <h3>Últimas publicaciones</h3>
            <ul>
                <?php
                // Ejecutar la consulta para obtener los posts más recientes
                $sql = "SELECT id, titulo, contenido, fecha_publicacion, imagen FROM blog_posts ORDER BY fecha_publicacion DESC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>";
                        // Mostrar la miniatura de la imagen si existe
                        if (!empty($row["imagen"])) {
                            echo "<img src='../" . htmlspecialchars($row["imagen"]) . "' alt='Miniatura' style='width:150px; height:auto;'>";
                        }
                        // Mostrar el título y contenido del post
                        echo "<h4><a href='post.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["titulo"]) . "</a></h4>";
                        echo "<p>" . nl2br(htmlspecialchars($row["contenido"])) . "</p>"; 
                        echo "<small>Publicado el: " . date("d-m-Y H:i", strtotime($row["fecha_publicacion"])) . "</small>";
                        echo "</li>";
                    }
                } else {
                    echo "<li>No hay publicaciones aún.</li>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </ul>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>