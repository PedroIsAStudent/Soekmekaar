<?php
    require("../../config.php");
    
    if(isset($_POST['create-profile'])){
        $name = $_POST['teacher-name'];
        $init = $_POST['teacher-init'];
        $location = $_POST['teacher-location'];
        $subjects = $_POST['teacher-subject'];
        $floorplan = $_POST['teacher-plan'];
        
        $sql = "
            INSERT INTO `teachers`(`name`, `initials`, `location`, `img`, `floorplan`) 
            VALUES ('$name','$init','$location','','$floorplan')
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $array = explode(", ", $subjects);
        
        $array = array_map('trim', $array);
        
        $is_retval = true;
        $sql2 = "
            SELECT id FROM teachers WHERE name = '$name';
        ";
        global $con;
        $RETVAL = mysqli_query($con, $sql2);
        $ID = mysqli_fetch_array($RETVAL, MYSQLI_ASSOC);
        $id = $ID['id'];
        for($i = 0; $i < sizeof($array); $i++){
            $subject_name = $array[$i];
            $sql3 = "
                SELECT subject_id FROM `subjects` WHERE subject_name = '$subject_name';
            ";
            global $con;
            $RETVAL = mysqli_query($con, $sql3);
            $sub_id = mysqli_fetch_array($RETVAL, MYSQLI_ASSOC);
            $subject_id = $sub_id['subject_id'];
            
            $sql4 = "
                INSERT INTO `teacher_subjects`(`subject_id`, `teacher_id`, `subjects`) 
                VALUES ($subject_id, $id,'$subject_name');
            ";
            global $con;
            $RETVAL = mysqli_query($con, $sql4);
            if($RETVAL){
                
            }
            else {
                $is_retval = false;
            }
        }
        if($retval && $is_retval && isset($_FILES["fileToUpload"]["name"])){
            $target_dir = "../../Onnies/"; 
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                
                $newFilename = uniqid().'.'.$imageFileType;
                $newFilePath = $target_dir . $newFilename;
    
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath)) {
                    global $con;
                    $name = $_POST['teacher-name'];
                    $sql6 = "
                        UPDATE teachers
                        SET img='$newFilename' 
                        WHERE name='$name'
                    ";
                    $retval = mysqli_query($con, $sql6);
                    if ($retval) {
                        echo "
                            <script>
                                const result = window.confirm('You successfully added a teacher');
                            
                                if(result === true){
                                    window.location.href = '../../add_teacher.php';
                                    
                                }
                                else {
                                    window.location.href = '../../add_teacher.php';
                                }
                            </script>
                        ";
                    } else {
                        echo "
                            <script>
                                const result = window.confirm('You unsuccessfully added a teacher');
                            
                                if(result === true){
                                    window.location.href = '../../add_teacher.php';
                                    
                                }
                                else {
                                    window.location.href = '../../add_teacher.php';
                                }
                            </script>
                        ";
                    }
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    echo "
                        <script>
                            const result = window.confirm('You unsuccessfully added a teacher');
                        
                            if(result === true){
                                window.location.href = '../../add_teacher.php';
                                
                            }
                            else {
                                window.location.href = '../../add_teacher.php';
                            }
                        </script>
                    ";
                }
                //}
            } else {
                echo "File is not an image.";
                echo "
                    <script>
                        const result = window.confirm('You unsuccessfully added a teacher');
                    
                        if(result === true){
                            window.location.href = '../../add_teacher.php';
                            
                        }
                        else {
                            window.location.href = '../../add_teacher.php';
                        }
                    </script>
                ";
            }
        }
    }
    else {
        if(isset($_FILES["fileToUpload"]["name"])){
            $target_dir = "../../Onnies/"; 
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                /*if ($_FILES["fileToUpload"]["size"] > 800000) {
                    echo "Sorry, your file is too large.";
                } else {*/
    
                $newFilename = uniqid().'.'.$imageFileType;
                $newFilePath = $target_dir . $newFilename;
    
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFilePath)) {
                    global $con;
                    $name = $_POST['teacher'];
                    $sql = "
                        UPDATE teachers
                        SET img='$newFilename' 
                        WHERE name='$name'
                    ";
                    $retval = mysqli_query($con, $sql);
                    if ($retval) {
                        echo "Profile picture updated successfully.";
                        echo "
                            <script>
                                const result = window.confirm('You successfully added a photo');
                            
                                if(result === true){
                                    window.location.href = '../../add_teacher.php';
                                    
                                }
                                else {
                                    window.location.href = '../../add_teacher.php';
                                }
                            </script>
                        ";
                    } else {
                        echo "Error updating profile picture: ";
                        echo "
                            <script>
                                const result = window.confirm('You unsuccessfully added a photo');
                            
                                if(result === true){
                                    window.location.href = '../../add_teacher.php';
                                    
                                }
                                else {
                                    window.location.href = '../../add_teacher.php';
                                }
                            </script>
                        ";
                    }
                    echo "$sql";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    echo "
                        <script>
                            const result = window.confirm('You unsuccessfully uploaded a photo');
                        
                            if(result === true){
                                window.location.href = '../../add_teacher.php';
                                
                            }
                            else {
                                window.location.href = '../../add_teacher.php';
                            }
                        </script>
                    ";
                }
                //}
            } else {
                echo "File is not an image.";
            }
        }
    }
    
?>
