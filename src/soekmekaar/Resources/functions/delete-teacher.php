<?php
    require("../../config.php");

    if(isset($_GET['search']) && isset($_GET['chosen'])){
        $search = $_GET['search'];
        $chosen = $_GET['chosen'];

        $sql = "DELETE FROM `teachers` WHERE $chosen = '$search'";

        global $con;
        $retval = mysqli_query($con, $sql);

        if($retval){
            header("Location: ../../admin.php?search=$search&chosen=$chosen&message=You successfully deleted the teacher");
        }
        else {
            header("Location: ../../admin.php?search=$search&chosen=$chosen&message=You unsuccessfully deleted the teacher");
        }
    }
?>