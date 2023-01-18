<!DOCTYPE html>
<html>
<head>
    <title>Timetable</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Timetable ID</th>
                <th>Timetable File</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once 'database.php';
                $conn = new Database();
                $conn = $conn->getConnection();
                $stmt = $conn->prepare("SELECT tt_id, tt_file FROM timetable");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['tt_id'] . "</td>";
                    echo "<td>" . $row['tt_file'] . "</td>";
                    echo "<td><a href='download.php?id=" . $row['tt_id'] . "'>Download</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>

