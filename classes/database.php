<?php
class Database {
  private $host;
  private $dbname;
  private $username;
  private $password;
  private $conn;

  public function __construct($host, $dbname, $username, $password) {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->username = $username;
    $this->password = $password;
  }

  public function connect() {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection Error: " . $e->getMessage();
    }
    return $this->conn;
  }
}

class QueryDAO {
  private $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function addQuery($que_std_name, $que_std_email, $que_std_degree, $que_description) {
    try {
        $que_id = uniqid();
      $stmt = $this->conn->prepare("INSERT INTO query (que_id, que_std_name, que_std_email, que_std_degree, que_description)
                                    VALUES (:que_id, :que_std_name, :que_std_email, :que_std_degree, :que_description)");
      $stmt->bindParam(':que_id', $que_id);
      $stmt->bindParam(':que_std_name', $que_std_name);
      $stmt->bindParam(':que_std_email', $que_std_email);
      $stmt->bindParam(':que_std_degree', $que_std_degree);
      $stmt->bindParam(':que_description', $que_description);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }
}

?>