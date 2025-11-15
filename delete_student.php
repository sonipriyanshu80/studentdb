<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])) header("Location: index.php");
$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE student_id=$id");
header("Location: dashboard.php");
?>