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

// --- Get search query ---
$search = "";
if (isset($_GET['query'])) {
    $search = trim($_GET['query']);
}

// --- SQL to search by name, dept, or email ---
$sql = "SELECT * FROM students 
        WHERE name LIKE '%$search%' 
        OR dept LIKE '%$search%' 
        OR email LIKE '%$search%'";

$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Results</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Search Results</h1>
    <nav>
        <a href="dashboard.php">Back to Dashboard</a>
    </nav>
</header>

<main>
    <h2>Results for "<?= htmlspecialchars($search) ?>"</h2>

    <?php if ($result->num_rows > 0): ?>
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
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
