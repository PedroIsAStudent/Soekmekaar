<?php
    session_start();
    if(isset($_GET['search'])){
        $_SESSION['initials'] = $_GET['search'];
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory where you want to save the uploaded files
    $targetDirectory = '../../img/';

    // Check if the directory exists and create it if necessary
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // File information
    $fileName = $_FILES['file']['name'];
    $fileTmpPath = $_FILES['file']['tmp_name'];

    // Generate a unique filename to avoid overwriting existing files
    $uniqueFilename = uniqid('file_', true) . '_' . $fileName;
    $targetFilePath = $targetDirectory . $uniqueFilename;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
        echo "File uploaded successfully.";
        header("Location: edit-image-teacher.php?img=$uniqueFilename");
    } else {
        echo "Failed to upload the file.";
    }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>
    
</body>
</html>