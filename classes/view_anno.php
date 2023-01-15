<?php
class Announcement {
    private $ann_id;
    private $ann_title;
    private $ann_type;
    private $ann_date;
    private $ann_description;

    public function __construct($ann_id, $ann_title, $ann_type, $ann_date, $ann_description) {
        $this->ann_id = $ann_id;
        $this->ann_title = $ann_title;
        $this->ann_type = $ann_type;
        $this->ann_date = $ann_date;
        $this->ann_description = $ann_description;
    }

    public function getId() {
        return $this->ann_id;
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

    public function getAllAnnouncements() {
        $query = "SELECT * FROM announcement";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $announcements = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $announcement = new Announcement(
                $row['ann_id'],
                $row['ann_title'],
                $row['ann_type'],
                $row['ann_date'],
                $row['ann_description']
            );
            array_push($announcements, $announcement);
        }
        return $announcements;
    }
}
?>