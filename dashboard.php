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

// --- FETCH STUDENTS DATA ---
$sql = "SELECT student_id, name, dept, email FROM students";
$result = $conn->query($sql);

// Check if query worked
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Dashboard</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Student Dashboard</h1>
    <nav>
        <a href="about.php">About</a> |
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main>
    <h2>Student Records</h2>

    <!-- Add and Search -->
    <div class="controls">
        <a href="add_student.php" class="btn">Add Student</a>
        <form method="GET" action="search.php" class="search-form">
            <input type="text" name="query" placeholder="Search student...">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Display Table -->
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['student_id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['dept']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="edit_student.php?id=<?= $row['student_id'] ?>">Edit</a> |
                <a href="delete_student.php?id=<?= $row['student_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</main>

<?php include 'footer.php'; ?>
</body>
</html>