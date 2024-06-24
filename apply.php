<?php
$servername = "localhost";
$username = "localhost";
$password = "";
$database = "rdbms";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO applications (fullname, email, phone, resume, coverletter, whyapply, salaryexp, availability, references) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $fullname, $email, $phone, $resume, $coverletter, $whyapply, $salaryexp, $availability, $references);

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $resume = basename($_FILES["resume"]["name"]);
    $coverletter = $_POST["coverletter"];
    $whyapply = $_POST["whyapply"];
    $salaryexp = $_POST["salaryexp"];
    $availability = $_POST["availability"];
    $references = $_POST["references"];

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
     
        echo '<script>';
        echo 'alert("Form submitted successfully!");';
        echo 'window.location.href = "oppertunity.html";';
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
    }
}
?>
