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
$student_id = $_POST['id'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
$mother_name = mysqli_real_escape_string($conn,$_POST['mother_name']);
$contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
$parents_contact_no = mysqli_real_escape_string($conn,$_POST['parents_contact_no']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$parents_email = mysqli_real_escape_string($conn,$_POST['parents_email']);
$usn = mysqli_real_escape_string($conn,$_POST['usn']);
$department = mysqli_real_escape_string($conn,$_POST['department']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$type = mysqli_real_escape_string($conn,$_POST['type']);
$batch = mysqli_real_escape_string($conn,$_POST['batch']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
// Add more fields as needed

$sql = "UPDATE students SET 
        name='$name', 
        gender='$gender',
        father_name='$father_name',
        mother_name='$mother_name',
        contact_no='$contact_no',
        parents_contact_no='$parents_contact_no',
        email='$email',
        parents_email='$parents_email',
        usn='$usn',
        department='$department',
        address='$address',
        type='$type',
        batch='$batch',
        password='$password'
        WHERE id=$student_id";

if (mysqli_query($conn, $sql)) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}

// Update student details in the database
//$sql = "UPDATE students SET name='$name', gender='$gender' , father_name='$father_name' , mother_name='$mother_name' ,  contact_no='$contact_no', parents_contact_no='$parents_contact_no' , email='$email' , parents_email='$parents_email' ,  usn='$usn' ,  department='$department' address='$address' , type='$type' , batch='$batch' , password='$password' WHERE id=$student_id";

//if (mysqli_query($conn, $sql)) {
//   echo "Profile updated successfully!";
//    
//} else {
//    echo "Error updating profile: " . mysqli_error($conn);
//}

// Close the database connection
mysqli_close($conn);
?>
