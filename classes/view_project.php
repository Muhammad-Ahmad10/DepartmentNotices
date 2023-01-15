<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ahah";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pro_id = $_POST["pro_id"];

$sql = "SELECT * FROM project WHERE pro_id = $pro_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Project ID: " . $row["pro_id"]. "<br>";
        echo "Student Name: " . $row["pro_std_name"]. "<br>";
        echo "Project Name: " . $row["pro_name"]. "<br>";
        echo "Review Date: " . $row["pro_review_date"]. "<br>";
        echo "Project Description: " . $row["project_description"]. "<br>";
    }
} else {
    echo "No project found with the given ID";
}
$conn->close();
?>
