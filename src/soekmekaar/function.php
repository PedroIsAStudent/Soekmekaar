<?php

    totalViewers();
    function totalViewers(){
        /*$fileName = "Resources/txt/viewers.txt";
        $file = file($fileName);
        
        $count = (int)$file[0];
        $count++;
        
        file_put_contents($fileName, $count);*/
        $sql = "
            UPDATE counter
            SET count = count + 1
            WHERE product = 'soekmekaar' AND reason = 'viewers'
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        if($retval){
            
        }
    }

    function getTotalViews(){
        /*$fileName = "Resources/txt/viewers.txt";
        $file = file($fileName);
        
        $count = (int)$file[0];
        echo $count;*/
        $sql = "
            SELECT count
            FROM counter
            WHERE product = 'soekmekaar' AND reason = 'viewers'
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        echo $row['count'];
    }

    // Function to check password for login
    function auth_admin(){
        global $con;
        if (isset($_SESSION['email'])) {
    
            $x = $_SESSION['email'];
            $sql = "SELECT `is_admin` FROM `members` WHERE `email`='$x'";
            $retval = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
            $check = $row['is_admin'];
            
            
            if ($check == 1) {
    
                return true;
            } else {
    
                return false;
            }
        } else {
            return false;
        }
    }
    
    // function to add or delete a user
    function alter_user(){
        if(isset($_POST['Add-user'])){
            $email = $_POST['user_name'];
            $sql = "UPDATE members SET is_admin=1 WHERE email='$email'";

            global $con;
            $retval = mysqli_query($con, $sql);

            if($retval){
                header("Location: ../../admin.php?message=You succesfully added a user");
            }
            else {
                header("Location: ../../admin.php?message=You unsuccesfully added a user");
            }
        }

        if(isset($_POST['Delete-user'])){
            $email = $_POST['user_name'];
            $sql = "DELETE FROM members WHERE email='$email'";

            global $con;
            $retval = mysqli_query($con, $sql);

            if($retval){
                header("Location: ../../admin.php?message=You succesfully removed a user");
            }
            else {
                header("Location: ../../admin.php?message=You unsuccesfully removed a user");
            }
        }
    }
    
    // function to add or delete a subject
    function alter_subjects(){
        if(isset($_POST['add-subject'])){
            $subject = $_POST['subject_name'];
            $sql = "INSERT INTO subjects(subject_name) VALUES('$subject')";

            global $con;
            $retval = mysqli_query($con, $sql);

            if($retval){
                header("Location: ../../admin.php?message=You succesfully added a subject");
            }
            else {
                header("Location: ../../admin.php?message=You unsuccesfully added a subject");
            }
        }

        if(isset($_POST['remove-subject'])){
            $subject_name = $_POST['subject_name'];
            $sql = "DELETE FROM `subjects` WHERE `subjects`.`subject_name` = '$subject_name'";

            global $con;
            $retval = mysqli_query($con, $sql);

            if($retval){
                header("Location: ../../admin.php?message=You successfully deleted a subject");
            }
            else {
                header("Location: ../../admin.php?message=You unsuccessfully deleted a subject");
            }
        }

        if(isset($_POST['replace_subject'])){
            $subject = $_POST['subject_name'];
            $new = $_POST['new-subject'];
            $sql = "UPDATE subjects SET subject_name = '$new' WHERE subject_name='$subject'";

            
            global $con;
            $retval = mysqli_query($con, $sql);

            if($retval){
                header("Location: ../../admin.php?message=You successfully altered a subject");
            }
            else {
                header("Location: ../../admin.php?message=You unsuccessfully altered a subject");
            }
        }
    }

    // Function to show all the users that wants to access admin page
    function show_users(){
        $sql = "
            SELECT * FROM members;
        ";
        global $con;
        
        $retval = mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            $class = "";
            $Email = $row['email'];
            $Name = $row['first_name'] . " " . $row['last_name'];
            
            if($row['is_admin'] == 1){
                $class = "Add";
            }
            else {
                $class = "Delete";
            }
            
            echo '
                <div id="w-node-b4dd6ec2-3f82-797c-8d4d-aaf3382ab1d7-ebf14826" class="block-spreadsheet">
                        <div class="text-spreadsheet">' . $Name . '</div>
                </div>
                <div id="w-node-_5dd39411-12df-a245-3836-dedddebfb055-ebf14826" class="block-spreadsheet">
                    <input class="text-spreadsheet email-input" value="' . $Email . '" readonly name="user_name">
                </div>
                <div id="w-node-_5fd22bef-fe14-493f-2a55-4620771fce45-ebf14826" class="block-spreadsheet">
                    <input class="button-4 w-button" type="submit" name="' . $class . '-user" value="' . $class . '">
                </div>
                <div style="display: none"><input value="' . $Email . '" name="id"></div>
            ';
        }
    }
    
    function show_suggestions($a, $input){
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
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        while($row = myslqi_fetch_array($retval, MYSQLI_ASSOC)){
            $content = $row[$a];
            
            echo "
                <li><button class='chosen'>$content</button></li>
            ";
        }
    }
    
    function show_teachers(){
        $search = $_GET['search'];
        $subject = $_GET['subject'] ?? null;
        $a = $_GET['chosen'];
        
        $sql = "";
        
        if($a == "name"){
            $sql = "
                SELECT *
                FROM `teachers` 
                WHERE name = '$search'
            ";
        }
        else if($a == "initials"){
            $sql = "
                SELECT *
                FROM `teachers` 
                WHERE initials = '$search'
            ";
        }
        else if($a == "subjects"){
            $sql = "
                SELECT * 
                FROM teachers, teacher_subjects, subjects
                WHERE teachers.id = teacher_subjects.teacher_id AND
                subjects.subject_id = teacher_subjects.subject_id AND
                subjects.subject_name = '$search'
            ";
        }
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        // echo "$sql";
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            //echo "Hello";
            
            $name = $row['name'];
            $init = $row['initials'];
            
            
            
            $sql = "
                SELECT subjects.subject_name 
                FROM subjects, teacher_subjects
                WHERE teacher_id = " . $row['id'] . " AND
                teacher_subjects.subject_id = subjects.subject_id
            ";
            
            $subjects = "";
            global $con;
            $Retval = mysqli_query($con, $sql);
            
            while ($subject1 = mysqli_fetch_array($Retval, MYSQLI_ASSOC)){
                $subjects .= $subject1['subject_name'] . ", ";
            }
            
            $subject_list = substr($subjects, 0, (strlen($subjects)-2));
            
            
            $loca = $row['location'];
            $img = $row['img'];
            $floor = $row['floorplan'];
            
            echo '
                <style>
                    .img-' . $init . ' {
                        background-image: url("Onnies/' . $img . '");
                        background-position: 50%;
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                    .img-' . $init . ' {
                        background-image: url("Onnies/' . $img . '");
                        background-position: 50%;
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                </style>
                
                    <div class="teacher-block edit-teacher" id="output">
                    <div class="teacher-name-block">
                        <h1 class="heading-13">' . $name . '</h1>
                    </div>
                    <div class="teacher-heading-line"></div>
                    <div class="teacher-id-block">
                        <div data-delay="4000" data-animation="slide" class="slider-3 w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="true" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                            <div class="mask-2 w-slider-mask">
                                <div class="photo-1 w-slide img-' . $init . '"></div>
                                <div class="photo-2 w-slide img-' . $init . '"></div>
                            </div>
                            <div class="left-arrow w-slider-arrow-left">
                                <div class="icon-10 w-icon-slider-left"></div>
                            </div>
                            <div class="w-slider-arrow-right">
                                <div class="icon-9 w-icon-slider-right"></div>
                            </div>
                            <div class="slide-nav-3 w-slider-nav w-round"></div>
                        </div>
                        <div class="teacher-details-1">
                            <p class="paragraph-6"><strong>Voorletters:</strong>' . $init . '<br>‍<strong>Vakke:</strong>' . $subject_list . '
                            <br>‍<strong>Ligging:</strong>' . $loca . '</p>
                            <a href="floor-plan/' . $floor . '" target="_blank" class="button-8 w-button">Sien klaskamer op vloerplan</a>
                        </div>
                    </div>
                </div>
            ';
        }
    }
    
    /*function show_teachers_edit(){
        $search = $_GET['search'];
        $a = $_GET['chosen'];
        
        $sql = "";
        
        if($a == "name"){
            $sql = "
                SELECT *
                FROM `teachers` 
                WHERE name = '$search'
            ";
        }
        else if($a == "initials"){
            $sql = "
                SELECT *
                FROM `teachers` 
                WHERE initials = '$search'
            ";
        }
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            //echo "Hello";
            
            $name = $row['name'];
            $init = $row['initials'];
            
            
            
            $sql = "
                SELECT subjects.subject_name 
                FROM subjects, teacher_subjects
                WHERE teacher_id = " . $row['id'] . " AND
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
            
            $subject_list = substr($subjects, 0, (strlen($subjects)-2));
            
            
            $loca = $row['location'];
            $img = $row['img'];
            $floor = $row['floorplan'];
            
            $sql = "SELECT subject_name FROM subjects";
            global $con;
            $retval = mysqli_query($con, $sql);
            
            $subject_object = "";
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                $subject_object .= '<option value="' . $row['subject_name'] . '">' . $row['subject_name'] . '</option>';
            }
            
            
            
            echo '
                <style>
                    .photo-1 {
                        background-image: url("Onnies/' . $img . '");
                        background-position: 50%;
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                    .photo-2 {
                        background-image: url("Onnies/' . $img . '");
                        background-position: 50%;
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                </style>
                <form class="teacher-block edit-teacher" method="post" action="Resources/functions/edit-teachers.php">
              <div class="teacher-name-block">
                <h1 class="heading-13"><input type="text" value="' . $name . '" name="change-name"></h1>
              </div>
              <div class="teacher-heading-line"></div>
              <div class="teacher-id-block">
                <div data-delay="4000" data-animation="slide" class="slider-3 w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="true" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                  <div class="mask-2 w-slider-mask">
                    <div class="photo-1 w-slide" onclick="change_photo(`photo1`, `' . $init . '`)"></div>
                    <div class="photo-2 w-slide" onclick="change_photo(`photo2`)"></div>
                  </div>
                  <div class="left-arrow w-slider-arrow-left">
                    <div class="icon-10 w-icon-slider-left"></div>
                  </div>
                  <div class="w-slider-arrow-right">
                    <div class="icon-9 w-icon-slider-right"></div>
                  </div>
                  <div class="slide-nav-3 w-slider-nav w-round"></div>
                </div>
                <div class="teacher-details-1">
                  <div class="teacher-text">
                    <div class="text-block-16"><strong>Voorletters:</strong><br><input type="text" value="' . $init . '" name="change-init"></div>
                    <!-- <div class="text-block-16"><strong>Vakke: </strong><br><input type="text" value="' . $subject_list . '"></div> -->
                    <div class="form-block-6 w-form">
                      <div id="email-form-3" name="email-form-3" data-name="Email Form 3" method="get" class="form-6 a" data-wf-page-id="645e74d4cb54f08bbe2f2bc2" data-wf-element-id="aee7ae5f-f0c1-3745-2b67-145d9b0022b9">
                      <select id="field" name="change-subject" data-name="Field" class="select-field-3 w-select choose-subject">
                        
                          <option value="">Select one...</option>
                          ' . $subject_object . '
                        </select>
                        <div class="div-block-7">
                            <input type="button"value="Add" data-wait="Please wait..." class="add-subject a w-button" onclick="change_subjects(`' . $init . '`)">
                            <input type="button" class="remove-subject w-button" onclick="change_subjects(`' . $init . '`)" value="Remove">
                            <!-- <a href="Resources/functions/edit-teacher-subjects.php?search=' . $init . '&chosen=add" class="add-subject a w-button">Add</a> -->
                            <!-- <a href="Resources/functions/edit-teacher-subjects.php?search=' . $init . '&chosen=remove" class="remove-subject w-button" >Delete</a> -->
                        </div><input type="text" class="form-fill-in a w-input subject-list" maxlength="256" name="name-2" data-name="Name 2" value="' . $subject_list . '" id="name-2" readonly>
                      </div>
                      
                    </div>
                    <div class="text-block-16"><strong>Ligging:</strong><br><textarea name="change-location">' . $loca . '</textarea></div>
                  </div>
                  <div class="edit-flooplans">
                    <button type="submit" class="button-8 w-button" name="edit-teacher">Save Changes</a>
                  </div>
                </div>
              </div>
            </form>
            ';
        }
    }*/
    
    function update_teacher(){
        
        // Updating
        $name = $_POST['change-name'];
        $init = $_POST['change-init'];
        $loca = $_POST['change-location'];
        
        $sql = "
            UPDATE teachers
            SET name = '$name', initials = '$init', location = '$loca'
            WHERE name = '$name'
        ";
        
        global $con;
        $retval = mysqli_query($con, $sql);
        
        if($retval){
            
        }
        else {
            
        }
        
        
        // Deleting a subject
        $subject = $_POST['change-subject'];
        
        $sql = "
            DELETE FROM teacher_subjects WHERE subject_id = (SELECT subject_id FROM subjects WHERE subject_name = '$subject');
        ";
        
        
        // Adding a subject
        $subject = $_POST['change-subject'];
        $sql = "
            INSERT INTO teacher_subject
            VALUES ((), )
        ";
        
    }
    
    function add_teacher(){
        if(isset($_POST['add-teacher-btn'])){
            $name = $_POST['name-teacher-add'];
            $init = $_POST['initials-teacher-add'];
            $location = $_POST['location-teacher-add'];
            $subjects = $_POST['subject-teacher-add'];
            $img = $_POST['image-link-1'];
            // $floorplan = $_POST['name-teacher-add'];
            
            $sql = "
                INSERT INTO `teachers` (`id`, `name`, `initials`, `location`, `img`, `floorplan`) VALUES (NULL, '$name', '$init', '$location', '', '');
            ";
            echo "$sql<br><br>";
            
            global $con;
            $retval = mysqli_query($con, $sql);
            
            if($retval){
                echo "Hello";
            }
            else {
                echo "$sql";
            }
            
            $sql = "SELECT id FROM teachers WHERE name = '$name'";
            echo "$sql<br><br>";
            global $con;
            $retval = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
            $teacher_id = $row['id'];
            echo "HEllo" . $teacher_id;
            
            $subject_list = array("");
            $count = 0;
            for($i = 0; $i < strlen($subjects); $i++){
                if($subjects[$i] == ","){
                    array_push($subject_list, "");
                    $count++;
                    $i++;
                }
                else {
                    $subject_list[$count] .= $subjects[$i];
                }
            }
            for($i = 0; $i < sizeof($subject_list); $i++){
                $subject = $subject_list[$i];
                $sql = "SELECT subject_id FROM subjects WHERE subject_name = '$subject'";
                echo "$sql<br><br>";
                global $con;
                $retval = mysqli_query($con, $sql);
                $subject_id = mysqli_fetch_query($retval, MYSQLI_ASSOC)['subject_id'];
                
                $sql = "
                    INSERT INTO `teacher_subjects` (`subject_id`, `teacher_id`, `subjects`) 
                    VALUES ('$subject_id', '$teacher_id', '$subject');
                ";
                echo "$sql<br><br>Hello";
                global $con;
                $retval = mysqli_query($con, $sql);
                
                if($retval){
                    echo "Success";
                }
                else {
                    echo "Failed";
                }
            }
            
        }
        
    }
    
    function show_floorplans(){
        $files = list_files();
        $names = array();
        
        
        for($i = 0; $i < sizeof($files); $i++){
            $floorplan = $files[$i];
            
            $sql = "
                SELECT *
                FROM teachers
                WHERE floorplan = '$floorplan'
                ORDER BY name
            ";
            
            global $con;
            $retval = mysqli_query($con, $sql);
            
            $count = mysqli_num_rows($retval);
            
            if($count > 0){
                while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                    $floorplan = $row['floorplan'];
                    $name = $row['name'];
                    structure_explorer($floorplan, $name);
                    
                    array_push($names, $name);
                }
            }
            else {
                structure_explorer($floorplan, "");
            }
        }
        $diff = list_missing($names);
        
        for($i = 0; $i < sizeof($diff); $i++){
            $name = $diff[$i];
            
            $sql = "
                SELECT *
                FROM teachers
                WHERE name = '$name'
                ORDER BY name
            ";
            
            global $con;
            $retval = mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                $floorplan = $row['floorplan'];
                $name = $row['name'];
                
                structure_explorer($floorplan, $name);
            }
        }
        
        $diff_plans = list_missing_plans($files);
        /*echo sizeof($diff_plans);
        for($i = 0; $i < sizeof($diff_plans); $i++){
            $name = $diff_plans[$i];
            
            $sql = "
                SELECT *
                FROM teachers
                WHERE floorplan = '$name'
                ORDER BY name
            ";
            
            global $con;
            $retval = mysqli_query($con, $sql);
            
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                $floorplan = $row['floorplan'];
                $name = $row['name'];
                
                structure_explorer($floorplan, $name);
            }
        }*/
    }
    
    function structure_explorer($floorplan, $name){
        $class = substr($floorplan, 0, strlen($floorplan)-4);
        echo '
            <tr id="' . $class . '">
                <td><input class="file_name"  value="' . $floorplan . '" readonly></td>
                <td><div class="floor-name">' . $name . '</div></td>
                <td class="col-3">
                    <button class="view-button" onclick="view(`' . $floorplan . '`)">View</button>
                    <button class="choose-button" onclick="choose(`' . $name . '`, `' . $floorplan . '`)">Choose</button>
                </td>
            </tr>
        ';
    }
    
    function show_teachers_edit(){
        $sql = "
            SELECT *
            FROM teachers
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            $init = $row['initials'];
            $name = $row['name'];
            $subjects = subjects_toString($row['id']);
            $location = $row['location'];
            $floorplan = $row['floorplan'];
            $img = $row['img'];
            
            show_teacher_structure($name, $name, $init, $subjects, $floorplan, $location, $img);
        }

    }
    
    function list_files(){
        $folderPath = 'floor-plan'; // Replace with the path to your folder
        $fileList = [];
        if (is_dir($folderPath)) {
            $files = array_diff(scandir($folderPath), ['.', '..']); // Remove "." and ".." entries
            
        
            foreach ($files as $file) {
                if (is_file($folderPath . '/' . $file)) {
                    $fileList[] = $file;
                }
            }
        
        } else {
            echo "The specified folder does not exist.";
        }
        return $fileList;
    }
    
    function list_missing($names){
        $sql = "SELECT * FROM teachers";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $array = array();
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            array_push($array, $row['name']);
        }
        
        $lists = array_diff($array, $names);
        
        return $lists;
    }
    
    function list_missing_plans($plans){
        $sql = "SELECT * FROM teachers";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $array = array();
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            array_push($array, $row['floorplan']);
        }
        
        $lists = array_diff($array, $plans);
        
        return $lists;
    }
    
    function show_teacher_structure($name1, $name2, $init, $subjects, $floorplan, $location, $img){
        $string = "";
        for($i = 0; $i < strlen($name2); $i++){
            if($name2[$i] == " "){
                $string .= "_";
            }
            else {
                $string .= $name2[$i];
            }
        }
        echo '
            <div class="table-row" id="' . $string . '">
            <div class="visible-wrapper">
                <div class="wrapper-name">' . $name1 . '</div>
                <div class="wrapper-flex">
                    <button class="remove-button" onclick="delete_teacher(`' . $name2 . '`)">Delete</button>
                    <button class="toggle-button">Edit Info</button>
                </div>
            </div>
            
            <div class="additional-info">
                <div class="table-container">
                    <div class="teacher-info">
                        <span>Name:</span>
                        <input type="text" value="' . $name2 . '" class="teacher-input teacher-name-input">
                    </div>
                    <div class="teacher-info">
                        <span>Initials:     </span>
                        <input type="text" value="' . $init . '" class="teacher-input teacher-init-input">
                    </div>
                    <div class="teacher-info">
                        <span>Subjects:     </span>
                        <input type="button" value="' . $subjects . '" class="teacher-button" onclick="add_modal(this, `' . $init . '`)">
                    </div>
                    <div class="teacher-info">
                        <span>Floorplan:     </span>
                        <input type="button" value="' . $floorplan . '" class="teacher-button" onclick="show_floorplan(this, `' . $name2 . '`)">
                    </div>
                    <div class="teacher-info">
                        <span>Location:     </span>
                        <textarea class="teacher-area  teacher-location-input">' . $location . '</textarea>
                    </div>
                </div>
                <div class="additional-images">
                    <div class="' . $init . '-image" onclick="choose_image(`' . $init . '`)">
                        
                    </div>
                    <style>
                        .' . $init . '-image {
                            background-image: url("Onnies/' . $img . '");
                            background-repeat: no-repeat;
                            background-size: cover;
                            cursor: pointer;
                        }
                    </style>
                    <button class="save-changes" onclick="save_changes(`' . $string . '`, `' . $name2 . '`, `' . $init . '`)">Save</button>
                    
                </div>
            </div>
            </div>
        ';
    }
    
    function get_subjects($id){
        $sql = "SELECT * FROM `teacher_subjects` WHERE teacher_id = $id";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        $subjects = array();
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            $subject = $row['subjects'];
            
            array_push($subjects, $subject);
        }
        
        return $subjects;
    }
    
    function subjects_toString($id){
        $subjects = get_subjects($id);
        
        $string = $subjects[0];
        
        for($i = 1; $i < sizeof($subjects); $i++){
            $string .= ", " . $subjects[$i];
        }
        
        return $string;
    }
    
    function show_imageplans(){
        $sql = "
            SELECT *
            FROM teachers
        ";
        global $con;
        $retval = mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            $img = $row['img'];
            $name = $row['name'];
            $class = substr($floorplan, 0, strlen($floorplan)-4);
            
            $string = "";
            for($i = 0; $i < strlen($name); $i++){
                if($name[$i] == " "){
                    $string .= "_";
                }
                else {
                    $string .= $name[$i];
                }
            }
            
            
            echo '
                <tr id="' . $class . '">
                    <td><div class="' . $string . '-image"></div></td>
                    <td><div class="floor-name">' . $name . '</div></td>
                    <td>
                        <button class="view-button" onclick="view(`' . $floorplan . '`)">View</button>
                        <button class="choose-button">Choose</button>
                    </td>
                </tr>
                
                <style>
                    .' . $string . '-image {
                        background-image: url("Onnies/' . $img . '");
                        background-repeat: no-repeat;
                        background-size: cover;
                        cursor: pointer;
                    }
                </style>
            ';
        }
    }
    
    
?>