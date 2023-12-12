<?php
// Connect to the database (similar to your existing connection code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "save";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get student ID from the URL
$student_id = $_GET['id'];

// Delete the entire table for the given student ID
$delete_sql = "DELETE FROM exam_results WHERE student_id = $student_id";
mysqli_query($conn, $delete_sql);

// Close the database connection
mysqli_close($conn);

// Redirect back to the original page after deletion
header("Location: academic_details.php"); // Replace 'original_page.php' with the actual file name
exit();
?>
