<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Download</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>File Upload and Download</h1>

        <!--แบบฟอร์มการอัพโหลดไฟล์-->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="text" name="uploader_name" placeholder="Your Name">
            <button type="submit">Upload</button>
        </form>

        <hr>

        <!-- ไฟล์ที่อัปโหลด -->
        <h2>Uploaded Files</h2>
        <table>
            <tr>
                <th>Filename</th>
                <th>Uploader</th>
                <th>Date Uploaded</th>
                <th>Download</th>
            </tr>
            <?php include 'display_files.php'; ?>
        </table>

        <hr>

        <!-- แบบฟอร์มค้นหาไฟล์ -->
        <form action="search.php" method="get">
            <input type="text" name="query" placeholder="Enter filename to search">
            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>