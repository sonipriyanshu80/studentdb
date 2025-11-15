<?php
session_start();
include 'db.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $conn->prepare("SELECT * FROM users WHERE username=?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    $user = $result->fetch_assoc();
    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['username'];
        if(!isset($_SESSION['seen_about'])){
            header("Location: about.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        echo "<p style='color:red;'>Invalid username or password!</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="styles.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="form-container">
<h2>Login</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<button type="submit" name="login">Login</button>
</form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>