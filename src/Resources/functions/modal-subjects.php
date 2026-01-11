<?php
    
    require("../../config.php");
    
    if(isset($_GET['input'])){
        $input = $_GET['input'];
        
        $sql = "
            SELECT * FROM teachers WHERE initials = '$input'
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        
        echo '
            <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <input type="text" value="' . subject_list($row['id']) . '" class="modal-input" readonly>
            <div class="modal-section">
                <div class="left-section">
                    <select class="add-subject-select">
                        <option value="">Choose Subject</option>
                        ' . add_subjects() . '
                    </select><br><br>
                    <button class="add-subjects" onclick="change_subjects(`' . $row['initials'] . '`)">Add</button>
                </div>
                <div class="right-section">
                    <select class="remove-subject-select">
                        <option value="">Choose Subject</option>
                        ' . remove_subjects($row['id']) . '
                    </select><br><br>
                    <button class="remove-subjects" onclick="change_subjects(`' . $row['initials'] . '`)">Remove</button>
                </div>
            </div>
            <!-- <button class="save-changes">Save Changes</button> -->
        </div>
        ';
    }
    
    
    function subject_list($id){
        $sql = "
            SELECT subjects.subject_name 
            FROM subjects, teacher_subjects
            WHERE teacher_id = " . $id . " AND
            teacher_subjects.subject_id = subjects.subject_id
        ";
        
        $subjects = "";
        $subject_array = array();
        global $con;
        $Retval = mysqli_query($con, $sql);
        
        while ($subject1 = mysqli_fetch_array($Retval, MYSQLI_ASSOC)){
            $subjects .= $subject1['subject_name'] . ", ";
            array_push($subject_array, $subject1['subject_name']);
        }
        
        return $subject_list = substr($subjects, 0, (strlen($subjects)-2));
    }
    
    function remove_subjects($id){
        $sql = "
            SELECT subjects.subject_name 
            FROM subjects, teacher_subjects
            WHERE teacher_id = " . $id . " AND
            teacher_subjects.subject_id = subjects.subject_id
        ";
        
        global $con;
        $Retval = mysqli_query($con, $sql);
        
        $string = "";
        while ($row = mysqli_fetch_array($Retval, MYSQLI_ASSOC)){
            $subjects = $row['subject_name'];
            $string .= '
                <option value="' . $subjects . '">' . $subjects . '</option>
            ';
        }
        
        return $string;
    }
    
    function add_subjects(){
        $sql = "SELECT subject_name FROM subjects";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $string = "";
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            $string .= '
                <option value="' . $row['subject_name'] . '">' . $row['subject_name'] . '</option>
            ';
        }
        return $string;
    }
?>