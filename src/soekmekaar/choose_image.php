<?php
    require("config.php");
    
    $name = "";
    $img = "";
    if(isset($_GET['teacher'])){
        $init = $_GET['teacher'];
        $sql = "
            SELECT img, name
            FROM teachers
            WHERE initials = '$init';
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        $img = $row['img'];
        $name = $row['name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #fff;
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

h1 {
    color: #333;
}

h2 {
    color: #666;
}

#profileImage {
    max-width: 300px;
    border: 2px solid #333;
    margin: 20px auto;
    display: block;
}

.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
}

.upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}

#selectedFileName {
    margin-top: 10px;
    color: #666;
}

.upload-btn {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
}

.upload-btn:hover {
    background-color: #555;
}

.hidden-input {
    display: none;
}

</style>
<body>
    <div class="container">
        <h1><?php echo $name; ?></h1>
        <img src="Onnies/<?php echo $img; ?>" alt="Profile Picture" id="profileImage">

        <!-- <h2>Upload Picture</h2> -->
        <form action="Resources/functions/upload.php" method="POST" enctype="multipart/form-data">
            <input value="<?php echo $name; ?>" class="hidden-input" type="text" name="teacher">
            <div class="upload-btn-wrapper">
                <button class="btn">Choose a file</button>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
            </div>
            <p id="selectedFileName"></p>
            <button class="upload-btn">Upload</button>
        </form>
    </div>

    <script>
        
        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById("fileToUpload");
            const selectedFileName = document.getElementById("selectedFileName");
        
            fileInput.addEventListener("change", function() {
                if (fileInput.files.length > 0) {
                    const fileName = fileInput.files[0].name;
                    selectedFileName.textContent = `Selected File: ${fileName}`;
                } else {
                    selectedFileName.textContent = "No file selected";
                }
            });
        });

    </script>
</body>
</html>
