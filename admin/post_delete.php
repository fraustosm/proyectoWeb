<?php
session_start();
if ($_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }
include '../db/connection.php';
include '../includes/functions.php';

$id = $_GET['id'];
delete_post($id);

header("Location: posts.php");
exit;
