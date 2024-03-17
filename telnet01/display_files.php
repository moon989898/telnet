<?php
// แสดงไฟล์ที่อัพโหลด
$conn = new mysqli("localhost", "username", "password", "database");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM files";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// ตรวจสอบว่ามีแถวในผลลัพธ์หรือไม่
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Filename</th>
                <th>Uploader Name</th>
                <th>Date Uploaded</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['filename'] . "</td>";
        echo "<td>" . $row['uploader_name'] . "</td>";
        echo "<td>" . $row['date_uploaded'] . "</td>";
        echo "<td><a href='downloads/" . $row['filename'] . "' download>Download</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No files found.";
}

$conn->close();
?>
