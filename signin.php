<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rdbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check if user exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, verify password
    $row = $result->fetch_assoc();
    $hashed_password = $row['password']; // Assuming password is stored as hashed in the database

    if (password_verify($password, $hashed_password)) {
        // Password is correct, log the user in
        $_SESSION['email'] = $email; // Store email in session for future use
        header("Location: oppertunity.html "); // Redirect to dashboard or any other page
        exit();
    } else {
        // Password is incorrect
        echo "Incorrect password";
    }
} else {
    // User does not exist
    echo "User not found";
}

$conn->close();
?>
