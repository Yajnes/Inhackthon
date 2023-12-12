<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: teacher_login.html"); // Redirect to login page if not logged in
    exit();
}

// Retrieve teacher information based on the stored teacher_id
$teacher_id = $_SESSION['teacher_id'];

// Connect to your database (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "save";

$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve teacher information
$sql = "SELECT * FROM teachers WHERE teacher_id = $teacher_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Display teacher information on the profile page
    echo "<table>";
    echo "<tr><th colspan='2'>Teacher Profile</th><tr>";
    echo "<tr><th>Name:</th><td> " . $row['name'] . "</td></tr>";
    echo "<tr><th>Teacher ID:</th><td> " . $row['teacher_id'] . "</td></tr>";
    echo "<p><th>Date of Birth:</th><td> " . $row['dob'] . "</td></tr>";
    echo "<p><th>Address:</th><td> " . $row['address'] . "</td></tr>";
    echo "<p><th>Contact No:</th><td> " . $row['contact_no'] . "</td></tr>";
    echo "<p><th>Email ID:</th><td> " . $row['email'] . "</td></tr>";
    echo "<p><th>Gender:</th><td> " . $row['gender'] . "</td></tr>";
    echo "</table>";
} else {
    // Something went wrong
    echo "<h2>Error retrieving teacher information</h2>";
}

$conn->close();
?>