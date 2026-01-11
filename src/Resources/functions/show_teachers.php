<?php
    require("../../config.php");
    require("../../function.php");
    
    $a = $_GET['chosen'];
    $input = $_GET['input'];

    $sql = "";
        
    if($a == "name"){
        $sql = "
            SELECT *
            FROM `teachers` 
            WHERE name LIKE '%$input%'
        ";
    }
    else if($a == "initials"){
        $sql = "
            SELECT *
            FROM `teachers` 
            WHERE initials LIKE '$input%'
        ";
    }
    
    global $con;
    $retval = mysqli_query($con, $sql);
    
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
        $init = $row['initials'];
        $name = $row['name'];
        $subjects = subjects_toString($row['id']);
        $location = $row['location'];
        $floorplan = $row['floorplan'];
        $img = $row['img'];
        
        $highlightedData = preg_replace('/' . preg_quote($input, '/') . '/i', '<b>$0</b>', $name);
        
        show_teacher_structure($highlightedData, $name, $init, $subjects, $floorplan, $location, $img);
    }

    
?>