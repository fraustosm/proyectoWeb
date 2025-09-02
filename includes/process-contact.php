<?php
// Configuración de correo
$to = "info@english2learn.com";
$subject = "Nuevo mensaje de contacto - English 2learn";

// Obtener datos del formulario
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validar campos requeridos
if (!$name || !$email || !$subject || !$message) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos requeridos.']);
    exit;
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor, ingresa un email válido.']);
    exit;
}

// Construir el mensaje
$body = "Mensaje de contacto de English 2learn\n\n";
$body .= "Nombre: " . $name . "\n";
$body .= "Email: " . $email . "\n";
if ($phone) {
    $body .= "Teléfono: " . $phone . "\n";
}
$body .= "Asunto: " . $subject . "\n";
$body .= "Mensaje: " . $message;

// Configurar encabezados
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar correo
if (mail($to, $subject, $body, $headers)) {
    echo json_encode(['success' => true, 'message' => 'Mensaje enviado con éxito.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al enviar el mensaje.']);
}
?>
