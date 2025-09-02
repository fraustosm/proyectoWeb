<?php
// Validar producto
function validate_product($data) {
    $errors = [];
    if (empty($data['producto'])) $errors[] = "El nombre del producto es obligatorio.";
    if (empty($data['precio']) || !is_numeric($data['precio'])) $errors[] = "El precio debe ser válido.";
    if (empty($data['fecha_lanzamiento'])) $errors[] = "La fecha de lanzamiento es obligatoria.";
    return $errors;
}

// Guardar producto
function save_product($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO productos (producto, descripcion, precio, imagen, fecha_lanzamiento, destacado) VALUES (?, ?, ?, ?, ?, ?)");
    $destacado = isset($data['destacado']) ? 1 : 0;
    $stmt->bind_param("ssdssi", $data['producto'], $data['descripcion'], $data['precio'], $data['imagen'], $data['fecha_lanzamiento'], $destacado);
    $stmt->execute();
    $stmt->close();
}

// Validar post
function validate_post($data) {
    $errors = [];
    if (empty($data['titulo'])) $errors[] = "El título es obligatorio.";
    if (empty($data['contenido'])) $errors[] = "El contenido no puede estar vacío.";
    return $errors;
}

// Guardar post
function save_post($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO blog_posts (titulo, contenido, imagen) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $data['titulo'], $data['contenido'], $data['imagen']);
    $stmt->execute();
    $stmt->close();
}

// Actualizar producto
function update_product($id, $data) {
    global $conn;
    $destacado = isset($data['destacado']) ? 1 : 0;
    $stmt = $conn->prepare("UPDATE productos SET producto=?, descripcion=?, precio=?, imagen=?, fecha_lanzamiento=?, destacado=? WHERE id=?");
    $stmt->bind_param("ssdssii", $data['producto'], $data['descripcion'], $data['precio'], $data['imagen'], $data['fecha_lanzamiento'], $destacado, $id);
    $stmt->execute();
    $stmt->close();
}

// Actualizar post
function update_post($id, $data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE blog_posts SET titulo=?, contenido=?, imagen=? WHERE id=?");
    $stmt->bind_param("sssi", $data['titulo'], $data['contenido'], $data['imagen'], $id);
    $stmt->execute();
    $stmt->close();
}

// Eliminar producto
function delete_product($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM productos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Eliminar post
function delete_post($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM blog_posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>
