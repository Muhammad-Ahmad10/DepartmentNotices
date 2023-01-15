<?php
require_once 'announcement.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ann_title = $_POST['ann_title'];
    $ann_type = $_POST['ann_type'];
    $ann_date = $_POST['ann_date'];
    $ann_description = $_POST['ann_description'];
    if (empty($ann_title) || empty($ann_type) || empty($ann_date) || empty($ann_description)) {
        // You can redirect to the form page with an error message
    } else {
        $announcement = new Announcement($ann_title, $ann_type, $ann_date, $ann_description);
        $conn = (new DBConnection())->getConnection();
        $announcementDao = new AnnouncementDAO($conn);
        if ($announcementDao->addAnnouncement($announcement->getTitle(), $announcement->getType(), $announcement->getDate(), $announcement->getDescription())) {

            $_SESSION['message'] = 'Announcement created successfully';
            header("Location: create_announcement_form.php");
        } else {
            // Redirect to form page with failure message
            $_SESSION['error'] = 'Failed to create announcement';
            header("Location: create_announcement_form.php");
        }
    }
}
?>