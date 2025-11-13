<?php
// --- DATABASE CONNECTION ---
$host = "localhost";
$user = "root";
$pass = "";
$db = "student_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- ADD STUDENT ---
if (isset($_POST['add'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (student_id, name, department, email)
            VALUES ('$student_id', '$name', '$department', '$email')";
    $conn->query($sql);
    header("Location: index.php");
}

// --- DELETE STUDENT ---
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header("Location: index.php");
}

// --- UPDATE STUDENT ---
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $conn->query("UPDATE students SET student_id='$student_id', name='$name', department='$department', email='$email' WHERE id=$id");
    header("Location: index.php");
}

// --- SEARCH STUDENT ---
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search_term'];
}

$result = $conn->query("SELECT * FROM students WHERE 
    name LIKE '%$search%' OR
    student_id LIKE '%$search%' OR
    department LIKE '%$search%' OR
    email LIKE '%$search%'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Dashboard</title>
<style>
    body {
        font-family: "Segoe UI", sans-serif;
        background: #f4f6f8;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 90%;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        color: #333;
    }
    form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
    }
    input[type=text], input[type=email] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type=submit], button {
        padding: 8px 14px;
        background: #0078D7;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type=submit]:hover, button:hover {
        background: #005fa3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background: #0078D7;
        color: white;
    }
    .actions a {
        margin-right: 8px;
        text-decoration: none;
        color: #0078D7;
        font-weight: bold;
    }
    .actions a:hover {
        color: #005fa3;
    }
</style>
</head>
<body>
<div class="container">
    <h2>🎓 Student Record Dashboard</h2>

    <!-- ADD STUDENT FORM -->
    <form method="POST">
        <input type="text" name="student_id" placeholder="Student ID" required>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="department" placeholder="Department" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="add" value="Add Student">
    </form>

    <!-- SEARCH FORM -->
    <form method="POST">
        <input type="text" name="search_term" placeholder="Search by name, ID, department..." value="<?= $search ?>">
        <input type="submit" name="search" value="Search">
    </form>

    <!-- STUDENT TABLE -->
    <table>
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['student_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['department'] ?></td>
            <td><?= $row['email'] ?></td>
            <td class="actions">
                <a href="?edit=<?= $row['id'] ?>">✏️ Edit</a>
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')">🗑️ Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- EDIT FORM (SHOW ONLY IF EDIT MODE) -->
    <?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $edit = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
    ?>
    <hr>
    <h3>Edit Student Record</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
        <input type="text" name="student_id" value="<?= $edit['student_id'] ?>" required>
        <input type="text" name="name" value="<?= $edit['name'] ?>" required>
        <input type="text" name="department" value="<?= $edit['department'] ?>" required>
        <input type="email" name="email" value="<?= $edit['email'] ?>" required>
        <input type="submit" name="update" value="Update Student">
    </form>
    <?php } ?>

</div>
</body>
</html>
