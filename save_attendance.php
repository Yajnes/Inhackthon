<?php
// save_attendance.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Initialize variables for attendance data
    $attendanceData = isset($_POST['attendance']) ? $_POST['attendance'] : [];

    // Date for attendance (current date)
    $attendanceDate = date('Y-m-d');

    // Insert attendance data into the database
    foreach ($attendanceData as $studentId => $status) {
        $status = mysqli_real_escape_string($conn, $status);
        $sql = "INSERT INTO attendance (student_id, attendance_date, status) VALUES ('$studentId', '$attendanceDate', '$status')";
        mysqli_query($conn, $sql);
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the view_students.php page after saving attendance
    //header("Location: student_dashboard.html");
    echo"Attendence updated";
    exit();
} else {
    // If someone tries to access this page directly without submitting the form, redirect to view_students.php
    header("Location: view_attendance.php");
    exit();
}
?>
