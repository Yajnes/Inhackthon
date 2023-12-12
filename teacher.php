<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $teacher_id = $_POST["teacher_id"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $contact_no = $_POST["contact_no"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

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

    // Query to insert data into the teachers table
    $sql = "INSERT INTO teachers (name, teacher_id, dob, gender, address, contact_no, email, password) 
            VALUES ('$name', '$teacher_id', '$dob', '$gender', '$address', '$contact_no', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Registration Successful</h2>";
    } else {
        echo "<h2>Error: " . $sql . "<br>" . $conn->error . "</h2>";
    }

    $conn->close();
}
?>