<?php
// Establish a connection to the database (replace these values with your actual database credentials)
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get student ID from the URL
$student_id = $_GET['id'];

// Handle adding exam result
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_result'])) {
        $exam_name = mysqli_real_escape_string($conn, $_POST['exam_name']);
        $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
        $marks = (int)$_POST['marks'];

        $sql = "INSERT INTO exam_results (student_id, exam_name, subject_name, marks) VALUES ($student_id, '$exam_name', '$subject_name', $marks)";
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
    <title>Academic Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Academic Details</h2>

    <!-- Add Result Form -->
    <form action="" method="post">
        <label for="exam_name">Exam Name:</label>
        <input type="text" name="exam_name" required>

        <button type="button" onclick="addResult()">Add Result</button>

        <div id="resultTable"></div>

        <input type="submit" name="add_result" value="Save">
    </form>

    <hr>

    <!-- Saved Mark Sheets -->
    <h3>Saved Mark Sheets</h3>
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Exam Name</th><th>Subject Name</th><th>Marks</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['exam_name']}</td><td>{$row['subject_name']}</td><td>{$row['marks']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No exam results found.";
    }
    ?>

    <!-- Send Button (Assuming you have a page to handle sending emails) -->
    <button onclick="sendMarkSheet()">Send</button>

    <script>
        function addResult() {
            var table = document.getElementById("resultTable");

            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);

            cell1.innerHTML = "<input type='text' name='subject_name[]' placeholder='Subject Name'>";
            cell2.innerHTML = "<input type='number' name='marks[]' placeholder='Marks'>";
        }

        function sendMarkSheet() {
            // Implement logic to send mark sheet to parents
            alert("Mark sheet sent to parents!");
        }
    </script>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
