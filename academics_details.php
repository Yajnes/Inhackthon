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

// Handle adding exam result
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_result'])) {
        $exam_name = mysqli_real_escape_string($conn, $_POST['exam_name']);
        $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
        $marks = (int)$_POST['marks'];

        $sql = "INSERT INTO exam_results (student_id, exam_name, subject_name, marks) VALUES ($student_id, '$exam_name', '$subject_name', $marks)";
        mysqli_query($conn, $sql);
    }
}*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_result'])) {
        $exam_name = mysqli_real_escape_string($conn, $_POST['exam_name']);
        $subject_namei = mysqli_real_escape_string($conn, $_POST['subject_namei']);
        $marksi = (int)$_POST['marksi'];
        $subject_nameii = mysqli_real_escape_string($conn, $_POST['subject_nameii']);
        $marksii = (int)$_POST['marksii'];
        $subject_nameiii = mysqli_real_escape_string($conn, $_POST['subject_nameiii']);
        $marksiii = (int)$_POST['marksiii'];
        $subject_nameiv = mysqli_real_escape_string($conn, $_POST['subject_nameiv']);
        $marksiv = (int)$_POST['marksiv'];
        $subject_namev = mysqli_real_escape_string($conn, $_POST['subject_namev']);
        $marksv = (int)$_POST['marksv'];
        $subject_namevi = mysqli_real_escape_string($conn, $_POST['subject_namevi']);
        $marksvi = (int)$_POST['marksvi'];
        $subject_namevii = mysqli_real_escape_string($conn, $_POST['subject_namevii']);
        $marksvii = (int)$_POST['marksvii'];
        $subject_nameviii = mysqli_real_escape_string($conn, $_POST['subject_nameviii']);
        $marksviii = (int)$_POST['marksviii'];

        $sql = "INSERT INTO exam_results (student_id, exam_name, subject_namei, marksi, subject_nameii, marksii, subject_nameiii, marksiii, subject_nameiv, marksiv, subject_namev, marksv, subject_namevi, marksvi, subject_namevii, marksvii, subject_nameviii, marksviii) VALUES ($student_id, '$exam_name', '$subject_namei', $marksi, '$subject_nameii', $marksii, '$subject_nameiii', $marksiii, '$subject_nameiv', $marksiv, '$subject_namev', $marksv, '$subject_namevi', $marksvi, '$subject_namevii', $marksvii, '$subject_nameviii', $marksviii)";
        mysqli_query($conn, $sql);
    }
}

// Fetch saved exam results
$sql = "SELECT * FROM exam_results WHERE student_id = $student_id";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .tab{
            cursor:none;
        }
    </style>
</head>
<body>
    <h2>Student Results</h2>
    
<h3>Saved Mark Sheets</h3>
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='tab'>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th colspan='2'>Exam name: {$row['exam_name']}</th></tr>";
            echo "<tr><th>Subject Name</th><th>Marks</th></tr>";
            echo "<tr><td>{$row['subject_namei']}</td><td>{$row['marksi']}</td><tr>";
            echo "<tr><td>{$row['subject_nameii']}</td><td>{$row['marksii']}</td><tr>";
            echo "<tr><td>{$row['subject_nameiii']}</td><td>{$row['marksiii']}</td><tr>";
            echo "<tr><td>{$row['subject_nameiv']}</td><td>{$row['marksiv']}</td><tr>";
            echo "<tr><td>{$row['subject_namev']}</td><td>{$row['marksv']}</td><tr>";
            echo "<tr><td>{$row['subject_namevi']}</td><td>{$row['marksvi']}</td><tr>";
            echo "<tr><td>{$row['subject_namevii']}</td><td>{$row['marksvii']}</td><tr>";
            echo "<tr><td>{$row['subject_nameviii']}</td><td>{$row['marksviii']}</td><tr>";
            echo "<tr><td colspan='2'; >&nbsp</td></tr>";
            echo "<tr><td colspan='2'; >&nbsp</td></tr>";
        }
       
        echo "</table>";
        
    } else {
        echo "No exam results found.";
    }
    ?>

   
</body>
</html>
<?php
// Close the database connection
mysqli_close($conn);
?>

