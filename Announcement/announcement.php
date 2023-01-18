<?php
class Announcement {
    private $ann_title;
    private $ann_type;
    private $ann_date;
    private $ann_description;
  
    public function __construct($ann_title, $ann_type, $ann_date, $ann_description) {
        $this->ann_title = $ann_title;
        $this->ann_type = $ann_type;
        $this->ann_date = $ann_date;
        $this->ann_description = $ann_description;
    }
  
    public function getTitle() {
        return $this->ann_title;
    }
  
    public function getType() {
        return $this->ann_type;
    }
  
    public function getDate() {
        return $this->ann_date;
    }
  
    public function getDescription() {
        return $this->ann_description;
    }
}

class AnnouncementDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function addAnnouncement($ann_title, $ann_type, $ann_date, $ann_description) {
        $query = "INSERT INTO announcement (ann_title, ann_type, ann_date, ann_description) VALUES (:ann_title, :ann_type, :ann_date, :ann_description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':ann_title', $ann_title);
        $stmt->bindValue(':ann_type', $ann_type);
        $stmt->bindValue(':ann_date', $ann_date);
        $stmt->bindValue(':ann_description', $ann_description);
        return $stmt->execute();
    }
}
class DBConnection {
    private $host = "localhost";
    private $db_name = "ahah";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>