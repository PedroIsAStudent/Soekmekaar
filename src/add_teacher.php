<?php
    session_start();
    require("config.php");
    require("function.php");

    if(auth_admin()){
        
    }
    else {
        header("location: Resources/php/login.php");
    }
    $message = "";
    if(isset($_GET['message'])){
        $message = $_GET['message'];
    }
    
    if(isset($_GET['add_teacher'])){
        $_SESSION['image_link_1'] = $_GET['img'];
    }

?>

<script>
    const message = "<?php echo $message; ?>";
    if(message != ""){
        window.alert(message);
    }
</script>

<style>
    .show-admin-sidebar {
        display: block;
    }
    .hide-admin-sidebar {
        display: none;
    }
</style>
<!DOCTYPE html>
<html data-wf-page="645e74d4cb54f08bbe2f2bc6" data-wf-site="645e74d4cb54f08bbe2f2bbe">
<head>
    <meta charset="utf-8">
    <title>Admin - School.Help</title>
    <meta content="Admin" property="og:title">
    <meta content="Admin" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="Resources/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/lostandfound-front-3f7d171e0b531a9da6b8.webflow.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/admin-sidebar.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            max-width: 400px;
            width: 80%;
            margin: 0 auto;
            margin-bottom: 20px;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        #imageContainer {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            border: 2px dashed #ccc;
            border-radius: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
        }
        .save {
            background: #007bff;
            margin-top: 30px;
            color: white;
        }
        .hidden-input {
            display:none;
        }
    
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 50px;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    
        .modal-content {
            background-color: #fff;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            position: relative;
        }
    
        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        /* File Explorer Table styles */
        .file-explorer {
            width: 100%;
            border-collapse: collapse;
        }
    
        .file-explorer th, .file-explorer td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
    
        .file-explorer th {
            background-color: #f2f2f2;
        }
    
        .file-explorer tr:hover {
            background-color: #f5f5f5;
        }
    
        .file-explorer a {
            text-decoration: none;
            margin-right: 10px;
            color: #007bff;
        }
    
        .file-explorer button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    
        .file-explorer button:hover {
            background-color: #0056b3;
        }
        
        .action-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none; /* Remove underlines from links */
            display: inline-block; /* Display buttons on the same line */
            margin-right: 10px; /* Add spacing between buttons */
        }
    
        .action-button:hover {
            background-color: #0056b3;
        }
        
        #floorplanModal>div {
            width: 70%;
            max-width: 100%;
            margin-left: 25%;
        }
        
        .col-3 {
            display: flex;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .file_name {
            border: none;
        }
        
        @media (max-width: 1000px){
            #floorplanModal>div {
                width: 80%;
                margin-left: 10%;
            }
        }
        @media (max-width: 500px){
            .modal-content {
                width: 80%;
                margin-left: 15%;
            }
        }
        @media (max-width: 450px){
            #floorplanModal>div {
                width: 80%;
                margin-left: 15%;
            }
            .container {
                margin-left: 15%;
            }
        }
        
        
    </style>
    <link href="Resources/css/file_explorer.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["PT Serif:400,400italic,700,700italic","Varela:400","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Bitter:400,700,400italic"]  }});</script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="body-3">
    <div class="navbar-logo-center wf-section">
    <div class="nav-menu-three"><img src="images/Helpmekaar-logo.jpg" loading="lazy" width="31" alt="" class="image-3">
        <p class="paragraph">Soekmekaar</p>
        <div data-animation="over-right" class="navbar-2 w-nav" data-easing2="ease" data-easing="ease" data-collapse="all" role="banner" data-no-scroll="1" data-duration="400" data-doc-height="1">
            <div class="container-7 w-container">
            <nav role="navigation" class="nav-menu w-nav-menu">
                <h1 class="bussiness-navbar">SchoolHelp</h1>
                <div class="div-block-8"></div>
                <div data-hover="false" data-delay="0" class="dropdown-2 w-dropdown">
                <div class="dropdown-link w-dropdown-toggle">
                    <div class="text-block-11">Helpmekaar hulpmiddels</div>
                    <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                </div>
                <nav class="dropdown-list-3 w-dropdown-list">
                    <a href="https://adam.helpmekaar.co.za/" target="_blank" class="dropdown-link-4 a w-dropdown-link">Adam</a>
                    <a href="https://e-skool.helpmekaar.co.za/login/index.php" target="_blank" class="dropdown-link-4 a w-dropdown-link">E-Skool</a>
                    <a href="https://www.helpmekaar.co.za/wp/" target="_blank" class="dropdown-link-4 a w-dropdown-link">Tuisblad</a>
                </nav>
                </div>
                <div data-hover="false" data-delay="0" class="dropdown products w-dropdown">
                <div class="dropdown-link a w-dropdown-toggle">
                    <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                    <div class="text-block-12">Ander produkte</div>
                </div>
                <nav class="dropdown-list-4 w-dropdown-list">
                    <a href="http://schoolhelp.co.za/helpmekaar/soekmekaar/" class="dropdown-link-2 w-dropdown-link">Soekmekaar</a>
                    <a href="https://helpmekaar24.co.za/lockers/" class="dropdown-link-3 w-dropdown-link">Sluitkassies</a>
                </nav>
                </div>
                <div data-hover="false" data-delay="0" class="dropdown-2 w-dropdown">
                <div class="dropdown-link b w-dropdown-toggle">
                    <div class="text-block-13">Admin</div>
                    <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                </div>
                <nav class="dropdown-list-3 a w-dropdown-list">
                    <a href="admin.php" class="dropdown-link-4 w-dropdown-link">Admin</a>
                    
                </nav>
                </div>
                <a href="#" class="links a w-nav-link">Kontank ons</a>
                <a href="#" class="links b w-nav-link">Meer oor ons</a>
                <a href="index.php" aria-current="page" class="links home w-nav-link w--current">Home</a>
                <div class="links d">
                <div><?php getTotalViews(); ?> viewed</div>
                </div>
            </nav>
            <div class="menu-button-2 w-nav-button">
                <div class="icon w-icon-nav-menu"></div>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <form class="container" action="Resources/functions/upload.php" method="POST" enctype="multipart/form-data">
        <h2>Create a Profile</h2>
        <div id="imageContainer" onclick="openFilePicker()">
            <!-- Drag & Drop or Click to Upload Profile Image -->
            <input type="file" id="imageInput" name="fileToUpload" accept="image/*" style="display: none;" onchange="displayImage()">
        </div>
        <input type="text" placeholder="Name" name="teacher-name">
        <input type="text" placeholder="Initials" name="teacher-init">
        <input type="text" placeholder="Location" name="teacher-location">
        <input type="text" class="hidden-input teacher-subject" name="teacher-subject">
        <input type="text" class="hidden-input teacher-plan" name="teacher-plan">
        <button type="button" id="subjectButton" onclick="openModal('subjectModal')">Select Subjects</button>
        <button type="button" id="floorplanButton" onclick="openModal('floorplanModal')">Select Floorplan</button>
        
        <button class="save" name="create-profile">Create Profile</button>
    </form>

    <script>
        function openFilePicker() {
            document.getElementById('imageInput').click();
        }

        function displayImage() {
            const imageInput = document.getElementById('imageInput');
            const imageContainer = document.getElementById('imageContainer');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imageContainer.style.backgroundImage = `url(${e.target.result})`;
                    imageContainer.style.border = 'none';
                };

                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
    
    <!-- Subjects Modal -->
    <div id="subjectModal" class="modal">
        <div class="modal-content">
            <span class="close-icon" onclick="closeModal('subjectModal')">✖</span>
            <h3>Select Subjects</h3>
            <input type="text" id="subjectDisplay" readonly value="None">
            <select id="subjectDropdown">
                <option value="Maths">Maths</option>
                <?php 
                    $sql = "SELECT subject_name FROM subjects";
                    global $con;
                    $retval = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                        $subject = $row['subject_name'];
                        
                        echo '
                            <option value="' . $subject . '">' . $subject . '</option>
                        ';
                    }
                ?>
            </select>
            <button onclick="addSubject()">Add</button>
            <button onclick="removeSubject()">Remove</button>
        </div>
    </div>
    

    <div id="floorplanModal" class="">
        <div class="modal-content">
            <span class="close-icon" onclick="closeModal('floorplanModal')">✖</span>
            <h3>Select Floorplan</h3>
            <table class="file_table">
                <style>
                    .file_table {
                        background: white;
                    }
                </style>
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Teacher</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        show_floorplans();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        closeModal("floorplanModal");

        // Function to open the modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'block';
            
            if(modalId == "floorplanModal"){
                closePlan();
            }
        }
        function openPlan(){
            const plan = document.querySelector(".container");
            plan.style.display = 'block';
            window.scrollTo(0, 0);
        }
        function closePlan(){
            const plan = document.querySelector(".container");
            plan.style.display = 'none';
            window.scrollTo(0, 0);
        }

        // Function to close the modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'none';
            
            if(modalId == "floorplanModal"){
                openPlan();
            }
        }

        // Function to add a subject to the readonly input
        function addSubject() {
            const subjectDropdown = document.getElementById('subjectDropdown');
            const subjectDisplay = document.getElementById('subjectDisplay');
            const selectedSubject = subjectDropdown.value;
            
            if (subjectDisplay.value === 'None') {
                subjectDisplay.value = selectedSubject;
            } else {
                subjectDisplay.value += ', ' + selectedSubject;
            }
            document.querySelector(".teacher-subject").value = subjectDisplay.value;
        }

        // Function to remove a subject from the readonly input
        function removeSubject() {
            const subjectDropdown = document.getElementById('subjectDropdown');
            const subjectDisplay = document.getElementById('subjectDisplay');
            const selectedSubject = subjectDropdown.value;
            
            if (subjectDisplay.value.includes(selectedSubject)) {
                subjectDisplay.value = subjectDisplay.value
                    .replace(selectedSubject, '')
                    .replace(/,\s*,/, ',') // Remove extra commas
                    .replace(/^,|,$/g, '') // Remove leading and trailing commas
                    .trim(); // Remove extra spaces
                if (subjectDisplay.value === '') {
                    subjectDisplay.value = 'None';
                }
            }
            document.querySelector(".teacher-subject").value = subjectDisplay.value;
        }
        function chooseFloorplan(floorplanName) {
            // You can add logic here to handle the chosen floor plan
            alert('You chose: ' + floorplanName);
            closeModal('floorplanModal');
        }
    </script>
    
    
    <section class="footer-dark-2 wf-section">
        <div class="container-10">
        <div class="footer-wrapper-2">
            <a href="#" class="footer-brand-2 w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a332512aaee_placeholder-1.svg" loading="lazy" alt=""></a>
            <div class="footer-content-2">
            <div id="w-node-_88e4450c-155c-f2f5-4f88-efdbaedecd6d-be2f2bc6" class="footer-block-2">
                <div class="title-small-2">Company</div>
                <a href="#" class="footer-link-2">How it works</a>
                <a href="#" class="footer-link-2">Pricing</a>
                <a href="#" class="footer-link-2">Docs</a>
            </div>
            <div id="w-node-_88e4450c-155c-f2f5-4f88-efdbaedecd76-be2f2bc6" class="footer-block-2">
                <div class="title-small-2">Resources</div>
                <a href="#" class="footer-link-2">Blog post name list goes here</a>
                <a href="#" class="footer-link-2">Blog post name list goes here</a>
                <a href="#" class="footer-link-2">Blog post name list goes here</a>
                <a href="#" class="footer-link-2">See all resources &gt;</a>
            </div>
            <div id="w-node-_88e4450c-155c-f2f5-4f88-efdbaedecd81-be2f2bc6" class="footer-block-2">
                <div class="title-small-2">About</div>
                <a href="#" class="footer-link-2">Terms &amp; Conditions</a>
                <a href="#" class="footer-link-2">Privacy policy</a>
                <div class="footer-social-block-2">
                <a href="#" class="footer-social-link-2 w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124ac15112aad5_twitter%20small.svg" loading="lazy" alt=""></a>
                <a href="#" class="footer-social-link-2 w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a389912aad8_linkedin%20small.svg" loading="lazy" alt=""></a>
                <a href="#" class="footer-social-link-2 w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a51bf12aae9_facebook%20small.svg" loading="lazy" alt=""></a>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="footer-divider-2"></div>
        <div class="footer-copyright-center-2">Copyright © 2021 Company name</div>
    </section>

    <section class="admin-sidebar">
        
        <div class="admin-container">
            <h2>Admin</h2>
            <button class="personal-btn admin-sidebar-btn">
                <span class="material-symbols-outlined">
                    person_filled
                </span>
                <div>Personal details</div>
            </button>
            <button class="edit-btn admin-sidebar-btn">
                <span class="material-symbols-outlined">
                    group
                </span>
                <div>Edit users</div>
            </button>
        </div><br><br>
        <div class="admin-container admin-sidebar-btn">
            <h2>Database</h2>
            <button class="add-item">
                <span class="material-symbols-outlined">
                    Edit
                </span>
                <div>Edit post</div>
            </button>
            <button class="category-btn admin-sidebar-btn">
                <span class="material-symbols-outlined">
                    category
                </span>
                <div>Edit subjects</div>
            </button>
            <!-- <button class="responses-btn admin-sidebar-btn">
                <span class="material-symbols-outlined">
                    location_on
                </span>
                <div>Check Responses</div>
            </button> -->
            <button class="add-teacher">
                <span class="material-symbols-outlined">
                    add_a_photo
                </span>
                <div>Add Teacher</div>
            </button>
        </div>
    </section> 

    
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e74d4cb54f08bbe2f2bbe" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/webflow.js" type="text/javascript"></script>
    <!-- <script src="js/admin.js" type="text/javascript"></script> -->
    <script>

const user_btn = document.querySelector(".edit-btn");
const category_btn = document.querySelector(".category-btn");
const post_btn = document.querySelector(".add-item");
const personal_btn = document.querySelector(".personal-btn");
const edit_btn = document.querySelector(".add-teacher");

user_btn.addEventListener("click", function(){
    window.location.href = "admin.php?switch=0";
});
category_btn.addEventListener("click", function(){
    window.location.href = "admin.php?switch=1";
});
post_btn.addEventListener("click", function(){
    window.location.href = "admin.php?switch=2";
});
edit_btn.addEventListener("click", function(){
    window.location.href = "admin.php?switch=3";
});
personal_btn.addEventListener("click", function(){
    window.location.href = "admin.php?switch=4";
});

function view(plan){
    let url = 'floor-plan/' + plan;
    
    window.open(url, '_blank');
}

function choose(name, plan){
    document.querySelector(".teacher-plan").value = plan;
    //window.alert("Hello + " + plan);
    openPlan();
    closeModal("floorplanModal");
}

    </script>
</body>
</html>