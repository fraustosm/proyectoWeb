<!--- Contacto --->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English 2learn</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
<main>
    <section>
        <h2>Formulario de Contacto</h2>
        <p>Contáctanos!</p>
        <form action="enviar_contacto.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="servicio">Servicio de Interés:</label>
            <select id="servicio" name="servicio" required>
                <option value="cursos">Cursos</option>
                <option value="materiales">Materiales</option>
                <option value="clases-online">Clases online</option>
                <option value="talleres">Talleres</option>
                <option value="otros">Otros</option>
            </select>
            <br>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
            <br>
            <button class="btn" type="submit">Enviar</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
</body>
</html>