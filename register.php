<?php
include 'db.php';
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($password !== $confirm_password){
        echo "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users(username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        if($stmt->execute()){
            echo "<p style='color:green;'>Registered successfully! <a href='index.php'>Login</a></p>";
        } else {
            echo "<p style='color:red;'>Error: username exists!</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title><link rel="stylesheet" href="styles.css"></head>
<body>
<?php include 'header.php'; ?>
<div class="form-container">
<h2>Register</h2>
<form method="POST" id="registerForm" onsubmit="return validatePassword()">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" id="password" placeholder="Password" required><br>
<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required><br>
<span id="passwordError" style="color:red; font-size:12px; display:none;">Passwords do not match!</span><br>
<button type="submit" name="register">Register</button>
</form>
</div>

<script>
function validatePassword() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var errorMsg = document.getElementById('passwordError');
    
    if(password !== confirmPassword) {
        errorMsg.style.display = 'block';
        return false;
    } else {
        errorMsg.style.display = 'none';
        return true;
    }
}

document.getElementById('confirm_password').addEventListener('input', function() {
    var password = document.getElementById('password').value;
    var confirmPassword = this.value;
    var errorMsg = document.getElementById('passwordError');
    
    if(confirmPassword && password !== confirmPassword) {
        errorMsg.style.display = 'block';
    } else {
        errorMsg.style.display = 'none';
    }
});
</script>
<?php include 'footer.php'; ?>
</body>
</html>