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
        <h2>Contacto</h2>
        <p>Si tienes alguna pregunta o necesitas más información sobre nuestros servicios y cursos, no dudes en ponerte en contacto con nosotros. Estamos aquí para ayudarte.</p>
    </section>
    <section>
        <h3>Formulario de Contacto</h3>
        <form action="enviar_contacto.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="servicio">Servicio de Interés:</label>
            <select id="servicio" name="servicio" required>
                <option value="cursos">Cursos</option>
                <option value="materiales">Materiales</option>
                <option value="tutorias">Talleres</option>
                <option value="otros">Otros</option>
            </select>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
</body>
</html>