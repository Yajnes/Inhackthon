<?php
// Establish a connection to the database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "save";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables for search
$search = "";
$where_clause = "";

// Handle search
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where_clause = "WHERE name LIKE '%$search%'";
}

// Fetch students from the database based on the search criteria
$sql = "SELECT id, name FROM students $where_clause";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>View Students</h2>

    <!-- Search bar form -->
    <form action="view_students.php" method="get">
        <label for="search">Search by Name:</label>
        <input type="text" name="search" value="<?php echo $search; ?>">
        <input type="submit" value="Search">
    </form>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['id']}</td><td><a href='student_profile.php?id={$row['id']}'>{$row['name']}</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No students found.";
    }
    ?>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
