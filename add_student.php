<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])) header("Location: index.php");
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO students(name, dept, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $dept, $email);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Student</title><link rel="stylesheet" href="styles.css"></head>
<body>
<?php include 'header.php'; ?>
<h2>Add New Student</h2>
<form method="POST">
<input type="text" name="name" placeholder="Name" required><br>
<input type="text" name="dept" placeholder="Department" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<button type="submit" name="add">Add Student</button>
</form>
<?php include 'footer.php'; ?>
</body>
</html>