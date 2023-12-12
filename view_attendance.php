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

// Get student ID from the URL
$student_id = $_GET['id'];

// Fetch student details from the database
$sqlStudent = "SELECT name FROM students WHERE id = $student_id";
$resultStudent = mysqli_query($conn, $sqlStudent);

if (mysqli_num_rows($resultStudent) > 0) {
    $rowStudent = mysqli_fetch_assoc($resultStudent);
    $studentName = $rowStudent['name'];
} else {
    echo "Student not found.";
    exit();
}

// Fetch attendance data for the student
$sqlAttendance = "SELECT attendance_date, status FROM attendance WHERE student_id = $student_id";
$resultAttendance = mysqli_query($conn, $sqlAttendance);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Attendance of <?php echo $studentName; ?></h2>

    <?php
    if (mysqli_num_rows($resultAttendance) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Date</th><th>Status</th></tr>";
        while ($rowAttendance = mysqli_fetch_assoc($resultAttendance)) {
            echo "<tr>";
            echo "<td>{$rowAttendance['attendance_date']}</td>";
            echo "<td>{$rowAttendance['status']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No attendance records found.";
    }
    ?>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
