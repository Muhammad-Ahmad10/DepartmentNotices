    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ahah";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


    $sql = "SELECT * FROM query";
    $result = $conn->query($sql);


    $queries = array();
    while($row = $result->fetch_assoc()) {
        $queries[] = $row;
    }
?>