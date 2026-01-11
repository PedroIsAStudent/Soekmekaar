<?php
    require("../../config.php");
    
    $chosen = $_GET['chosen'];
    $search = $_GET['search'];
    if(isset($_GET['add'])){
        $sql = "SELECT id FROM `teachers` WHERE initials='$search'";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $teacher_id = mysqli_fetch_array($retval, MYSQLI_ASSOC)['id'];
        
        $sql = "SELECT subject_id FROM subjects WHERE subject_name = '$chosen'";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $subject_id = mysqli_fetch_array($retval, MYSQLI_ASSOC)['subject_id'];
        
        $sql = "SELECT * FROM teacher_subjects WHERE subject_id = $subject_id AND teacher_id = $teacher_id";
        global $con;
        $retval = mysqli_query($con, $sql);
        $count = mysqli_num_rows($retval);
        
        if($count < 1){
            $sql = "
                INSERT INTO `teacher_subjects` (`subject_id`, `teacher_id`, `subjects`) 
                VALUES ($subject_id, $teacher_id, '$chosen')
            ";
            global $con;
            $retval = mysqli_query($con, $sql);
            
            if($retval){
                header("location: ../../admin.php?search=$search&chosen=initials&message='You successfully added a subject'");
            }
            else {
                header("location: ../../admin.php?search=$search&chosen=initials&message='You unsuccessfully added a subject'");
            }
        }
        else {
            header("location: ../../admin.php?search=$search&chosen=initials&message='You already have this subject for the teacher'");
        }
    }
    
    if(isset($_GET['remove'])){
        $sql = "SELECT id FROM `teachers` WHERE initials='$search'";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $teacher_id = mysqli_fetch_array($retval, MYSQLI_ASSOC)['id'];
        
        $sql = "SELECT subject_id FROM subjects WHERE subject_name = '$chosen'";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $subject_id = mysqli_fetch_array($retval, MYSQLI_ASSOC)['subject_id'];
        
        $sql = "SELECT * FROM teacher_subjects WHERE subject_id = $subject_id AND teacher_id = $teacher_id";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $count = mysqli_num_rows($retval);
        
        if($count > 0){
            $sql = "
                DELETE FROM teacher_subjects
                WHERE subject_id = $subject_id 
                AND teacher_id = $teacher_id
            ";
            global $con;
            $retval = mysqli_query($con, $sql);
            
            if($retval){
                header("location: ../../admin.php?search=$search&chosen=initials&message='You successfully removed a subject'");
            }
            else {
                // echo "$sql";
                header("location: ../../admin.php?search=$search&chosen=initials&message='You unsuccessfully removed a subject'");
            }
        }
        else {
            header("location: ../../admin.php?search=$search&chosen=initials&message='You didn't pick an existing subject for this teacher");
        }
        
        
    }
    
    
?>