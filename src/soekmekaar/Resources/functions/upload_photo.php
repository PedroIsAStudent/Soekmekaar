<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Directory where you want to save the uploaded files
        $targetDirectory = '../../Onnies/';
    
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
            header("Location: ../../admin.php?add_teacher=true&img=$uniqueFilename");
        } else {
            echo "Failed to upload the file.";
        }
        
        echo "<br>" . $targetDirectory;
        echo "<br>" . $fileName;
    }

?>
<!DOCTYPE html>
<html data-wf-page="64a33606bce2bf33ed329f24" data-wf-site="645e74d4cb54f08bbe2f2bbe">
<head>
    <meta charset="utf-8">
    <title>School Help</title>
    <meta content="Upload photo" property="og:title">
    <meta content="Upload photo" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    
    <link href="../css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/lostandfound-front-3f7d171e0b531a9da6b8.webflow.css" rel="stylesheet" type="text/css">
    
<body class="body-4">
    <div class="div-block-11">
        <div class="text-block-17">Upload photo</div>
        <div class="form-block-7 w-form">
            <form method="post" enctype="multipart/form-data">
            <!-- <form enctype="multipart/form-data" id="email-form" name="email-form" data-name="Email Form" method="post" class="form-7" data-wf-page-id="64a33606bce2bf33ed329f24" data-wf-element-id="704046d7-b7d5-f1ff-d822-d406e7705d62" action=""> -->
                <input class="button-20 w-button" value="Choose file" type="file" name="file">
                <!-- <input type="text" class="text-field-5 w-input" maxlength="256" name="name" data-name="Name" placeholder="" id="name"> -->
                <input type="submit" value="Upload" class="submit-button-green c w-button">
            </form>
        </div>
        <!-- <a href="#" class="submit-button-green c w-button">Upload</a> -->
    </div>
    
    <!-- <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e74d4cb54f08bbe2f2bbe" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- <script src="../../js/webflow.js" type="text/javascript"></script> -->
</body>
</html>