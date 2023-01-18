<?php
require_once 'database.php';

$conn = new Database();
$conn = $conn->getConnection();

$target_dir = "timetable/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual pdf or fake pdf
if(isset($_POST["submit"])) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES["fileToUpload"]["tmp_name"]);
    if($mime == 'application/pdf') {
        echo "File is a pdf - " . $mime . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a pdf.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $pdf = file_get_contents($target_file);
        $stmt = $conn->prepare("INSERT INTO timetable (tt_file) VALUES (:tt_file)");
        $stmt->bindParam(':tt_file', $pdf, PDO::PARAM_LOB);
        if($stmt->execute()){
            echo "File added to database successfully";
        }else{
            echo "Error adding file to database";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>