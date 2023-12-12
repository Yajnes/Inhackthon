<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // You should perform validation and sanitation here

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

    // Query to check if the provided email and password match a record in the database
    $sql = "SELECT * FROM teachers WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email; // Store email in session for future use
        $_SESSION['teacher_id'] = $row['teacher_id']; // Store teacher_id in session for future use
        header("Location: teacher_profile.php"); // Redirect to profile page
        exit();
    } else {
        // Login failed
        echo "<h2>Login Failed</h2>";
    }

    $conn->close();
}
?>

