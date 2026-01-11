<?php

    session_start();
    require("../../config.php");
    require("../../function.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password=mysqli_real_escape_string($con, $_POST['Password']);
    
        $sql = "SELECT * FROM members WHERE email = '$email' and password='$password' ";
        $retval=mysqli_query($con,$sql);
    
        $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
    
        $count = mysqli_num_rows($retval);
        
        if($count == 1) {
            global  $email;
            global  $password;
            
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['firstname'] = $row['first_name'];
            $_SESSION['lastname'] = $row['last_name'];
            
            
            mysqli_commit($con);
            
            if(auth_admin()){
                header("location: ../../admin.php");
            }
            else{
                header("location: unsuccessful-page.php?message=Server could not connect");
                // echo "$sql";
            }
        }else {
            header("location: unsuccessful-page.php?message=There was a problem with you email or password");
            // echo "$sql";
            
        }
    }else{
        header("location: unsuccessful-page.php?index=");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School.Help</title>
    <link rel="stylesheet" href="home/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    
</body>