<?php 
    require("../../config.php");
    if(isset($_GET['name']) && isset($_GET['init']) && isset($_GET['location']) && isset($_GET['id']) && isset($_GET['id2'])){
        $name = $_GET['name'];
        $init = $_GET['init'];
        $location = $_GET['location'];
        $id1 = $_GET['id'];
        $id2 = $_GET['id2'];
        
        $sql = "
            UPDATE teachers
            SET name = '$name', initials = '$init', location = '$location'
            WHERE name = '$id1' AND initials = '$id2'
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        if($retval){
            echo "
                <script>
                    const result = window.confirm('You successfully edited: $name');
                    
                    if(result === true){
                        window.location.href = '../../edit_teacher.php';
                        
                    }
                    else {
                        window.location.href = '../../edit_teacher.php';
                    }
                </script>
            ";
        }
        else {
            echo "
                <script>
                    const result = window.confirm('You unsuccessfully edited: $name');
                    
                    if(result === true){
                        window.location.href = '../../edit_teacher.php';
                    }
                    else {
                        window.location.href = '../../edit_teacher.php';
                    }
                </script>
            ";
        }
    }
    
    if(isset($_GET['floorplan']) && isset($_GET['id'])){
        $id = $_GET['id'];
        $plan = $_GET['floorplan'];
        
        $sql = "
            UPDATE teachers
            SET floorplan = '$plan'
            WHERE name = '$id'
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        if($retval){
            echo "
                <script>
                    const result = window.confirm('You successfully edited: $id floorplan to $plan');
                    
                    if(result === true){
                        window.location.href = '../../edit_teacher.php';
                        
                    }
                    else {
                        window.location.href = '../../edit_teacher.php';
                    }
                </script>
            ";
        }
        else {
            echo "
                <script>
                    const result = window.confirm('You unsuccessfully edited: $id floorplan to $plan');
                    
                    if(result === true){
                        window.location.href = '../../edit_teacher.php';
                    }
                    else {
                        window.location.href = '../../edit_teacher.php';
                    }
                </script>
            ";
        }
    }
    if(isset($_GET['remove']) && isset($_GET['name'])){
        $name = $_GET['name'];
        
        $isTrue = false;
        
        $sql = "
            DELETE FROM teachers
            WHERE name = '$name';
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        if($retval){
            $isTrue = true;
        }
        else {
            $isTrue = false;
        }
        $sql = "
            DELETE FROM teacher_subjects
            WHERE teacher_id = (SELECT id FROM teachers WHERE name = '$name');
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        if($retval){
            $isTrue = true;
        }
        else {
            $isTrue = false;
        }
    }
    
?>

















