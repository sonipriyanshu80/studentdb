<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])) header("Location: index.php");
$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE student_id=$id")->fetch_assoc();
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE students SET name=?, dept=?, email=? WHERE student_id=?");
    $stmt->bind_param("sssi", $name, $dept, $email, $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Student</title><link rel="stylesheet" href="styles.css"></head>
<body>
<?php include 'header.php'; ?>
<h2>Edit Student</h2>
<form method="POST">
<input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>
<input type="text" name="dept" value="<?php echo $student['dept']; ?>" required><br>
<input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
<button type="submit" name="update">Update</button>
</form>
<?php include 'footer.php'; ?>
</body>
</html>