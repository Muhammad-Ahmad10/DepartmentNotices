<?php
require_once 'database.php';
$db = new Database('localhost', 'ahah', 'root', '');
$conn = $db->connect();
$queryDAO = new QueryDAO($conn);
if (isset($_POST['que_std_name']) && isset($_POST['que_std_email']) && isset($_POST['que_std_degree']) && isset($_POST['que_description'])) {
  $que_std_name = $_POST['que_std_name'];
  $que_std_email = $_POST['que_std_email'];
  $que_std_degree = $_POST['que_std_degree'];
  $que_description = $_POST['que_description'];
  if ($queryDAO->addQuery($que_std_name,$que_std_email,$que_std_degree,$que_description)) {
    echo "Query submitted successfully!";
  } else {
    echo "Error Adding Query!";
  }
} else {
  echo "Please fill out all fields!";
}

?>