<?php
session_start();
if ($_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }
include '../db/connection.php';
include '../includes/functions.php';
include '../includes/header.php';

?>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/admin.css">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate_post($_POST);
    if (empty($errors)) {
        save_post($_POST);
        header("Location: posts.php");
        exit;
    } else {
        foreach ($errors as $e) echo "<p style='color:red;'>$e</p>";
    }
}
include '../includes/form_post.php';
include '../includes/footer.php';
