<?php
    require("../../config.php");
    
    if(isset($_POST['edit-teacher'])){
        $name = $_POST['change-name'];
        $init = $_POST['change-init'];
        $loca = $_POST['change-location'];
        
        $sql = "
            UPDATE teachers
            SET name = '$name', initials = '$init', location = '$loca'
            WHERE name = '$name' AND initials = '$init'
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        if($retval){
            header("location: ../../admin.php?message=You successfully made changes to the teacher");
        }
        else {
            // header("location: ../../admin.php?message=You unsuccessfully made changes to the teacher");
        }
    }
    
?>