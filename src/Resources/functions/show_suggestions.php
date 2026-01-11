<?php
    session_start();
    require("../../config.php");
    
    $input = $_GET['input'];
    $a = $_GET['chosen'];
    $_SESSION['chosen'] = $a;
    
    $sql = "";
        
    if($a == "name"){
        $sql = "
            SELECT name
            FROM `teachers` 
            WHERE name LIKE '%$input%'
        ";
    }
    else if($a == "initials"){
        $sql = "
            SELECT initials
            FROM `teachers` 
            WHERE initials LIKE '$input%'
        ";
    }
    
    // echo "$sql";
    global $con;
    $retval = mysqli_query($con, $sql);
    
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
        $content = $row[$a];
        
        // $index = strpos($content, $input);
        $highlightedData = preg_replace('/' . preg_quote($input, '/') . '/i', '<b>$0</b>', $content);
        
        /*$content_2 = "";
        
        for($i = 0; $i < strlen($content); $i++){
            if($i == $index){
                $content_2 .= "<b>" . $input . "</b>";
                $i += strlen($input)-1;
            }
            else {
                $content_2 .= $content[$i];
            }
        }*/
        
        echo "<button class='name' onclick='show_teachers(this, \"$a\")'>" . $highlightedData . "</button>";
    }
    
?>