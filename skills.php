<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rdbms";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $softSkills = $_POST['softSkills'];
    $programmingLanguages = $_POST['programmingLanguages'];
    $projects = $_POST['projects'];
    $researchPapers = $_POST['researchPapers'];
    $additionalSkill1 = $_POST['additionalSkill1'];
    $additionalSkill2 = $_POST['additionalSkill2'];
    $additionalSkill3 = $_POST['additionalSkill3'];

    $sql = "INSERT INTO skills (softSkills, programmingLanguages, projects, researchPapers, additionalSkill1, additionalSkill2, additionalSkill3)
    VALUES ('$softSkills', '$programmingLanguages', '$projects', '$researchPapers', '$additionalSkill1', '$additionalSkill2', '$additionalSkill3')";

    if ($conn->query($sql) === TRUE) {
 
        header("Location: oppertunity.html");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
