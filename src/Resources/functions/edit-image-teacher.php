<?php
    require("../../config.php");
    session_start();
    if(isset($_GET['img'])){
        $init = $_SESSION['initials'];
        $img = $_GET['img'];
        
        $sql = "
            UPDATE teachers
            SET img = '$img'
            WHERE initials = '$init'
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        echo "$sql";
        if($retval){
            header("location: ../../admin.php?search=$init&chosen=initials&message=You successfully changed the image of the teacher");
        }
        else {
            header("location: ../../admin.php?search=$init&chosen=initials&message=You unsuccessfully changed the image of the teacher");
        }
    }
?>