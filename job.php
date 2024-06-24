<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "rdbms";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$job_name = $_POST['job_name'];
$posted_by = $_POST['posted_by'];
$date_posted = $_POST['date_posted'];
$phone_number = $_POST['phone_number'];


$sql = "INSERT INTO job_listings (job_name, posted_by, date_posted, phone_number) VALUES ('$job_name', '$posted_by', '$date_posted', '$phone_number')";

if ($conn->query($sql) === TRUE) {
    echo "New job listing added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
