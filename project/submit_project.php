<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ahah";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pro_id = $_POST["pro_id"];
$pro_std_name = $_POST["pro_std_name"];
$pro_name = $_POST["pro_name"];
$pro_review_date = $_POST["pro_review_date"];
$project_description = $_POST["project_description"];

$sql = "INSERT INTO project (pro_id, pro_std_name, pro_name, pro_review_date, project_description)
VALUES ($pro_id, '$pro_std_name', '$pro_name', '$pro_review_date', '$project_description')";

if ($conn->query($sql) === TRUE) {
    echo "New project created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
