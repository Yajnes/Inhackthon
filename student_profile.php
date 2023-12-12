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
$sql = "SELECT * FROM students WHERE id = $student_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Student not found.";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="att.css">
    <style>
        input {
            cursor:none;
        }
    </style>
</head>
<body>

    <h2>Hello, <?php echo $row['name']; ?>!</h2>

    <form action="save_profile.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <table border ="1">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?php echo $row['name']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('name')">Edit</button></td>
            </tr>
            <!-- Add other details in a similar way -->
            <tr>
                <td>Gender:</td>
                <td><input type="text" name="gender" value="<?php echo $row['gender']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('gender')">Edit</button></td>
            </tr>

            <tr>
                <td>Father's Name:</td>
                <td><input type="text" name="father_name" value="<?php echo $row['father_name']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('father_name')">Edit</button></td>
            </tr>
           
            <tr>
                <td>Mother's Name</td>
                <td><input type="text" name="mother_name" value="<?php echo $row['mother_name']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('mother_name')">Edit</button></td>
            </tr>

            <tr>
                <td>Contact No.:</td>
                <td><input type="text" name="contact_no" value="<?php echo $row['contact_no']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('contact_no')">Edit</button></td>
            </tr>
            
            <tr>
                <td>Parents Contact No.:</td>
                <td><input type="text" name="parents_contact_no" value="<?php echo $row['parents_contact_no']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('parents_contact_no')">Edit</button></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('email')">Edit</button></td>
            </tr>
         
            <tr>
                <td>Parents Email:</td>
                <td><input type="email" name="parents_email" value="<?php echo $row['parents_email']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('parents_email')">Edit</button></td>
            </tr>

            <tr>
                <td>USN:</td>
                <td><input type="text" name="usn" value="<?php echo $row['usn']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('usn')">Edit</button></td>
            </tr>
            
            <tr>
                <td>Department:</td>
                <td><input type="text" name="department" value="<?php echo $row['department']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('department')">Edit</button></td>
            </tr>

            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value="<?php echo $row['address']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('address')">Edit</button></td>
            </tr>
            
            <tr>
                <td>Type:</td>
                <td><input type="text" name="type" value="<?php echo $row['type']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('type')">Edit</button></td>
            </tr>

            <tr>
                <td>Batch:</td>
                <td><input type="text" name="batch" value="<?php echo $row['batch']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('batch')">Edit</button></td>
            </tr>
           
            
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $row['password']; ?>" readonly></td>
                <td><button type="button" onclick="enableEdit('password')">Edit</button></td>
            </tr>

            <tr>
                <td colspan="3"><input type="submit" value="Save"></td>
            </tr>
        </table>
    </form>
       <!-- <button><a href=academic_details.php>result</a></button> -->
       <a href="academic_details.php?id=<?php echo $student_id; ?>"><button>Academic Details</button></a>
       <a href="view_attendance.php?id=<?php echo $student_id; ?>"><button>View Attendance</button></a>


       
    <script>
        function enableEdit(field) {
            document.getElementsByName(field)[0].readOnly = false;
            inputField.style.cursor = 'text';
        }
    </script>

</body>
</html>