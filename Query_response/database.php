<?php

    require_once 'query_res.php';
    if(isset($_POST['response']) && isset($_POST['query_id'])) {
        $response = $_POST['response']; 
        $query_id = $_POST['query_id']; 
    }
    
    $response = $_POST['response'];
    $query_id = $_POST['query_id'];

    $sql = "UPDATE query SET que_response='$response' WHERE que_id='$query_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Response added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>