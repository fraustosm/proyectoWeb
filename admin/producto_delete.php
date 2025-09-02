<?php
session_start();
if ($_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }
include '../db/connection.php';
include '../includes/functions.php';

$id = $_GET['id'];
delete_product($id);

header("Location: productos.php");
exit;
