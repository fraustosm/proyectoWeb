<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - English 2learn</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <main>
        <section class="contact-hero">
            <div class="container">
                <h2>Contacto</h2>
                <p>¡Estamos aquí para ayudarte! Contáctanos para más información.</p>
            </div>
        </section>

        <section class="contact-info">
            <div class="container">
                <div class="contact-grid">
                    <div class="contact-details">
                        <h3>Información de Contacto</h3>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <p>+52 55 1234 5678</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <p>info@english2learn.com</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Culiacán, Sinaloa, Mx</p>
                        </div>
                        <div class="contact-social">
                            <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="contact-form">
                        <h3>Formulario de Contacto</h3>
                        <div id="form-messages"></div>
                        <form id="contact-form">
                            <div class="form-group">
                                <label for="name">Nombre completo</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Asunto</label>
                                <select id="subject" name="subject" required>
                                    <option value="">Selecciona un asunto</option>
                                    <option value="informacion">Información general</option>
                                    <option value="cursos">Información sobre cursos</option>
                                    <option value="productos">Información sobre productos</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Mensaje</label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="submit-btn">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-map">
            <div class="container">
                <h3>Ubícanos en el mapa</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.346554675208!2d-107.3881563245554!3d24.81510698695066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86b877c5fc2c039b%3A0x53d516507a5b302!2sCuliac%C3%A1n%2C%20Sinaloa!5e0!3m2!1ses-419!2smx!4v1680319800000!5m2!1ses-419!2smx" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>

    <script src="js/script.js"></script>
    <script>
        // Validación y envío del formulario de contacto
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Obtener valores del formulario
            const formData = new FormData(this);
            const name = formData.get('name').trim();
            const email = formData.get('email').trim();
            const phone = formData.get('phone').trim();
            const subject = formData.get('subject');
            const message = formData.get('message').trim();

            // Validaciones básicas
            if (!name || !email || !subject || !message) {
                showMessage('Por favor, completa todos los campos requeridos.', 'error');
                return;
            }

            // Validación de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showMessage('Por favor, ingresa un email válido.', 'error');
                return;
            }

            // Validación de teléfono si se proporciona
            if (phone && !/^[0-9\s-]+$/.test(phone)) {
                showMessage('Por favor, ingresa un número de teléfono válido.', 'error');
                return;
            }

            // Mostrar mensaje de carga
            showMessage('Enviando mensaje...', 'loading');

            // Enviar formulario con AJAX
            fetch('../includes/process-contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage(data.message, 'success');
                    this.reset();
                } else {
                    showMessage(data.message, 'error');
                }
            })
            .catch(error => {
                showMessage('Error al enviar el mensaje. Por favor, intenta de nuevo.', 'error');
                console.error('Error:', error);
            });
        });

        // Función para mostrar mensajes
        function showMessage(message, type) {
            const messagesDiv = document.getElementById('form-messages');
            messagesDiv.innerHTML = `
                <div class="message ${type}">
                    <p>${message}</p>
                </div>
            `;

            // Eliminar mensaje después de 5 segundos
            setTimeout(() => {
                messagesDiv.innerHTML = '';
            }, 5000);
        }
    </script>
</body>
</html>
