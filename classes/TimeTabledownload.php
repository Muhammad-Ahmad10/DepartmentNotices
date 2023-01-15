<?php
require_once 'database.php';

$conn = new Database();
$conn = $conn->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT tt_file FROM timetable WHERE tt_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $file = $stmt->fetch(PDO::FETCH_ASSOC);
    $file = $file['tt_file'];

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="timetable.pdf"');
    echo $file;
}
?>