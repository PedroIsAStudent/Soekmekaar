<?php
    require ("../../config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $email= mysqli_real_escape_string($con, $_POST['email-signup']);
        $fname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lname = mysqli_real_escape_string($con, $_POST['lastname']);
       // $pincode =$_POST['pincode'];
        $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $retval=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
        $count = mysqli_num_rows($retval);
    
        if($count>=1){
            header("location:unsuccess-page.php?message=Your email already exists");
        }else {
            $sql="
                INSERT INTO members
                VALUES ('$fname','$lname','$email','$password',now(),0)
            ";
             //  $sql = "INSERT INTO `user`(`email`, `fname`, `lname`,`isadmin`) VALUES ('$email','$fname','$lname','$password',0)";
            mysqli_query($con, $sql);
            mysqli_commit($con);
            session_start();
    
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['firstname'] = $fname;
            $_SESSION['lastname'] = $lname;
    
            header("location: success-page.php");
        }
    }
    else{
        header("location:unsuccessPage.php?message=There was a problem with the server");
    }
?>