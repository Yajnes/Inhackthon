<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Login</h2>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate email and password (add more validation as needed)

        // Establish a connection to the database (replace these values with your actual database credentials)
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "save";

        $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if the email and password match a user in the database
        $sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Redirect to the student's profile page if login is successful
            $row = mysqli_fetch_assoc($result);
            $student_id = $row["id"];
            header("Location: students_profile.php?id=$student_id");
            exit();
        } else {
            echo "<p style='color: red;'>Invalid email or password. Please try again.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

    <!-- Login Form -->
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>

</body>
</html>
