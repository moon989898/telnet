<?php
// ตรวจสอบว่ามีการอัพโหลดไฟล์หรือไม่
if (isset($_FILES['file'])) {
    $uploadDirectory = 'uploads/';
    $uploadedFile = $uploadDirectory . basename($_FILES['file']['name']);
    $uploaderName = isset($_POST['uploader_name']) ? $_POST['uploader_name'] : '';

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile)) {
        // อัพโหลดไฟล์สำเร็จ
        $filename = basename($_FILES['file']['name']);
        $dateUploaded = date("Y-m-d H:i:s");
        // แทรกข้อมูลไฟล์ลงในฐานข้อมูล (คุณต้องสร้างการเชื่อมต่อ MySQL ที่นี่)
        $conn = new mysqli("localhost", "username", "password", "database");
        $sql = "INSERT INTO files (filename, uploader_name, date_uploaded) VALUES ('$filename', '$uploaderName', '$dateUploaded')";
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");
    } else {
        echo 'Failed to upload file.';
    }
}
?>
