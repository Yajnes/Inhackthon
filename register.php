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

// Retrieve data from the form
$name = $_POST['name'];
$gender = $_POST['gender'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$contact_no = $_POST['contact_no'];
$parents_contact_no = $_POST['parents_contact_no'];
$email = $_POST['email'];
$parents_email = $_POST['parents_email'];
$usn = $_POST['usn'];
$department = $_POST['department'];
$address = $_POST['address'];
$type = $_POST['type'];
$batch = $_POST['batch'];
$password = $_POST['password'];

// SQL query to insert data into the database
$sql = "INSERT INTO students (name, gender, father_name, mother_name, contact_no, parents_contact_no, email, parents_email, usn, department, address, type, batch, password)
        VALUES ('$name', '$gender', '$father_name', '$mother_name', '$contact_no', '$parents_contact_no', '$email', '$parents_email', '$usn', '$department', '$address', '$type', '$batch', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
