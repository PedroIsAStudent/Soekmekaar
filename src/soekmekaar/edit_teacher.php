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

    $search = "";
    $chosen = "";
    if(isset($_GET['search']) && isset($_GET['chosen'])){
        $search = $_GET['search'];
        $chosen = $_GET['chosen'];
    }
?>

<script>
    const message = "<?php echo $message; ?>";
    if(message != ""){
        window.alert(message);
    }

    const search = "<?php echo $search ?>";
    const chosen = "<?php echo $chosen ?>";
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
    <link rel="stylesheet" href="Resources/css/edit_teacher.css">
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
    
    <main>
        <div class="search-bar">
            <input type="text" class="teacher-input-search" placeholder="Search by name:">
            <div id="auto-box"></div>
        </div>
        <div class="table-container">
            <?php
                show_teachers_edit();
            ?>
        </div>
    </main>
    
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <input type="text" value="" class="modal-input" readonly>
            <div class="modal-section">
                <div class="left-section">
                    <select class="add-subject-select">
                        <option value="option1">Choose Subject</option>
                        <option value="option2">Afr</option>
                        <option value="option3">Eng</option>
                        <option value="option2">Wisk</option>
                        <option value="option3">IT</option>
                        <option value="option2">Rek</option>
                        <option value="option3">Geo</option>
                    </select><br><br>
                    <button class="add-subjects" onclick="change_subjects()">Add</button>
                </div>
                <div class="right-section">
                    <select class="remove-subject-select">
                        <option value="remove1">Choose Subject</option>
                        <option value="remove2">Afr</option>
                        <option value="remove3">Lees</option>
                    </select><br><br>
                    <button class="remove-subjects">Remove</button>
                </div>
            </div>
            <!-- <button class="save-changes">Save Changes</button> -->
        </div>
    </div>
    
    <style>
        .teacher-input-search {
            width: 40%;
            border: 1px solid black;
            padding: 5px 10px;
            font-size: 1rem;
            margin-bottom: 10px;
            outline: none;
        }
        
        
    </style>
    
    <?php
        if(isset($_GET['teacher'])){
            $style = $_GET['teacher'];
            
            /*$style = substr($floorplan, 0, strlen($floorplan)-4);*/
            
            echo "
                <style>
                    #$style {
                        /*background: #eee;*/
                        border: 3px solid black;
                    }
                </style>
            ";
            
            $scrollTo = $style;
            // $name = $_GET['name'];
        }
        else {
            $scrollTo = "";
        }
    ?>

    <script>
        document.querySelector(".teacher-input-search").addEventListener('keyup', function(){
           input_bar("name");
           
        });
        // input_bar("name");
        function input_bar (a) {
            console.log("hello");
            $(document).ready(function() {
                // $('.teacher-input-search').keyup(function() {
                    var inputValue = $('.teacher-input-search').val(); // Get the value from the input field
                    var chosen = a;
        
                    $.ajax({
                        url: 'Resources/functions/show_teachers.php',
                        type: 'GET',
                        dataType: 'text',
                        data: { input: inputValue, chosen: chosen }, 
                        success: function(response) {
                            document.querySelector('.table-container').innerHTML = response;
                            edit_info();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.log('Error:', error);
                        }
                    });
                //});
            });
        }
        
        function change_subjects(e){
            let subject_text = document.querySelector(".modal-input");
            let addBtn = document.querySelector(".add-subjects");
            let removeBtn = document.querySelector(".remove-subjects");
            
            addBtn.addEventListener("click", function(){
                const subject = document.querySelector(".add-subject-select").value;
                
                if(subject != ""){
                    window.location.href = "Resources/functions/edit-teacher-subjects.php?search=" + e + "&chosen=" + subject + "&add=";
                }
                else {
                    window.alert("No subject was chosen");
                }
            });
            removeBtn.addEventListener("click", function(){
                const subject = document.querySelector(".remove-subject-select").value;
                
                if(subject != ""){
                    window.location.href = "Resources/functions/edit-teacher-subjects.php?search=" + e + "&chosen=" + subject + "&remove=";
                }
                else {
                    window.alert("No subject was chosen");
                }
            });
            
        }
        
        function show_floorplan(n, e){
            // window.location.href = "file_explorer.php?floorplan=" + n.value + "&name=" + e;
            window.open("file_explorer.php?floorplan=" + n.value + "&name=" + e, "_blank");
        }
        
        document.addEventListener("DOMContentLoaded", function() {
            var scrollTo = "<?php echo $scrollTo; ?>";
            
            if (scrollTo) {
                var target = document.getElementById(scrollTo);
                
                if (target) {
                    var windowHeight = window.innerHeight;
                    var targetOffset = target.getBoundingClientRect().top;
                    var scrollPosition = window.scrollY + targetOffset - (windowHeight / 2);

                    window.scrollTo({
                        top: scrollPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
        
        function delete_teacher(name){
            window.location.href = "Resources/functions/save_changes.php?remove=&name=" + name;
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

/*const user_page = document.querySelector(".user-pages");
const subjects_page = document.querySelector(".subjects-page");
const post_page = document.querySelector(".post-page");
const personal_page = document.querySelector(".personal-page");
const add_page = document.querySelector(".add-page");
*/

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


// JavaScript for toggling additional info on button click
document.addEventListener("DOMContentLoaded", function() {
    const toggleButtons = document.querySelectorAll(".toggle-button");

    toggleButtons.forEach(button => {
        button.addEventListener("click", function() {
            const row = button.closest(".table-row");
            const additionalInfo = row.querySelector(".additional-info");

            // Toggle visibility of additional info
            // additionalInfo.style.display = "none";
            if(window.innerWidth < 500){
                additionalInfo.style.display = (additionalInfo.style.display === "block") ? "none" : "block";
            }
            else {
                additionalInfo.style.display = (additionalInfo.style.display === "flex") ? "none" : "flex";
            }
        });
    });
});

function edit_info(){
    const toggleButtons = document.querySelectorAll(".toggle-button");
    
    toggleButtons.forEach(button => {
        button.addEventListener("click", function() {
            const row = button.closest(".table-row");
            const additionalInfo = row.querySelector(".additional-info");
            
            // Toggle visibility of additional info
            if(window.innerWidth < 500){
                additionalInfo.style.display = (additionalInfo.style.display === "block") ? "none" : "block";
            }
            else {
                additionalInfo.style.display = (additionalInfo.style.display === "flex") ? "none" : "flex";
            }
            
            
        });
    });
}

// JavaScript for modal
function load_modal () {
    
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modal = document.getElementById("myModal");
    
    modal.style.display = "block";

    closeModalBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}

function add_modal(e, n){
    const modal = document.getElementById("myModal");
    
    $(document).ready(function() {
        /*$(e).click(function() {*/
            
            var initials = n;
            
            $.ajax({
                url: 'Resources/functions/modal-subjects.php',
                type: 'GET',
                dataType: 'text',
                data: { input: initials }, // Pass the input value as a parameter
                success: function(response) {
                    document.querySelector("#myModal").innerHTML = response;
                    load_modal();
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.log('Error:', error);
                }
            });
        /*});*/
    });
    
    e.addEventListener("click", function() {
        modal.style.display = "block";
    });
    
}

function choose_image(init){
    window.location.href = "choose_image.php?teacher=" + init;
}

function save_changes(e, n, n2){
    const name = document.querySelector("#" + e + "  .teacher-name-input").value;
    const init = document.querySelector("#" + e + "  .teacher-init-input").value;
    const location = document.querySelector("#" + e + "  .teacher-location-input").value;
    window.location.href = "Resources/functions/save_changes.php?name=" + name + "&init=" + init + "&location=" + location + "&id=" + n + "&id2=" + n2;
}


    </script>
</body>
</html>