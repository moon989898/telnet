<!DOCTYPE html>
<html>
<head>
<title>SSH</title>
</head>
<body>
<h2>SSH</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label for="hostname">Hostname:</label>
    <input type="text" name="hostname" id="hostname" required><br><br>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    <label for="file">Choose a file:</label>
    <input type="file" name="file" id="file" required><br><br>
    <label for="remote_path">Remote Path:</label>
    <input type="text" name="remote_path" id="remote_path" required><br><br>
    <input type="submit" name="submit" value="Upload">
</form>

<?php
if (isset($_POST['submit'])) {
    $hostname = $_POST['hostname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remotePath = $_POST['remote_path'];

    $localFile = $_FILES['file']['tmp_name'];
    $remoteFile = $remotePath . '/' . $_FILES['file']['name'];

    // ใช้ SSH เพื่ออัปโหลดไฟล์
    $scpCommand = "scp -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -P 22 -i /path/to/private/key {$localFile} {$username}@{$hostname}:{$remoteFile}";

    // ดำเนินการคำสั่ง SSH
    exec($scpCommand, $output, $returnCode);

    if ($returnCode === 0) {
        echo "File uploaded successfully.<br>";

        // ใช้ SSH เพื่อดาวน์โหลดไฟล์
        $downloadedFile = 'downloaded_file.txt';
        $scpDownloadCommand = "scp -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -P 22 -i /path/to/private/key {$username}@{$hostname}:{$remoteFile} {$downloadedFile}";

        // ดำเนินการคำสั่งดาวน์โหลด SSH
        exec($scpDownloadCommand, $output, $returnCode);

        if ($returnCode === 0) {
            echo "File downloaded successfully.<br>";
            echo "Content of the downloaded file:<br>";
            echo "<pre>" . file_get_contents($downloadedFile) . "</pre>";
        } else {
            die("File download failed.");
        }
    } else {
        die("File upload failed.");
    }
}
?>
</body>
</html>