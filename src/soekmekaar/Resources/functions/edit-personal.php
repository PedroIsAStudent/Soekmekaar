<?php
    session_start();
    require("../../config.php");
    
    if(isset($_POST['edit-submit'])){
        $fname = $_POST['edit-name'];
        $lname = $_POST['edit-surname'];
        $email = $_POST['edit-email'];
        $password = $_POST['edit-password'];
        
        $original = $_SESSION['email'];
        
        $sql = "
            UPDATE members
            SET first_name = '$fname', last_name = '$lname', email = '$email', password = '$password'
            WHERE email = '$original';
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $fname;
        $_SESSION['lastname'] = $lname;
        $_SESSION['password'] = $password;
        
        if($retval){
            header("location: ../../admin.php?message=You successfully changed your personal information");
        }
        else {
            header("location: ../../admin.php?message=You unsuccessfully changed your personal information");
        }
    }
?>