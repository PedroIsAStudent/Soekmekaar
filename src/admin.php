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

    $switch = "";
    if(isset($_GET['switch'])){
        $switch = $_GET['switch'];
    }
?>

<script>
    const message = "<?php echo $message; ?>";
    if(message != ""){
        window.alert(message);
    }

    const search = "<?php echo $switch ?>";
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
    <link href="Resources/css/user.css" rel="stylesheet">
    <link href="Resources/css/Personal User.css" rel="stylesheet" type="text/css">
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
    <div class="section-8 wf-section user-pages">
        <div class="container-12 w-container">
        <h1 class="heading-13">Users</h1>
        <div class="div-block-12">
            <form class="w-layout-grid grid-user b" method="post" action="Resources/functions/alter-user.php">
                <h1 id="w-node-d962286c-ba3b-ac10-5114-ca938ed5bb69-2af23a71" class="spreadsheet-heading">Name</h1>
                <h1 id="w-node-d962286c-ba3b-ac10-5114-ca938ed5bb6b-2af23a71" class="spreadsheet-heading">E-mail</h1>
                <h1 id="w-node-d962286c-ba3b-ac10-5114-ca938ed5bb6d-2af23a71" class="spreadsheet-heading">Add or delete a user</h1>
                <!-- <div id="w-node-d962286c-ba3b-ac10-5114-ca938ed5bb6f-2af23a71" class="div-block-11"></div> -->
                
                <?php show_users(); ?>
            </form>
        </div>
        </div>
    </div>

    <div class="section-8 wf-section personal-page">
        <div class="container-11 w-container">
            <h1 class="heading-11"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h1>
            <form method="post" action="Resources/functions/edit-personal.php" class="div-block-6">
                <p class="paragraph-5">
                  <strong>Name:</strong><input class="personal_input" type="text" value="<?php echo $_SESSION['firstname']; ?>" name="edit-name"><br>
                  <strong>Surname: </strong><input class="personal_input" type="text" value="<?php echo $_SESSION['lastname']; ?>" name="edit-surname"><br>
                  <strong>E-mail:</strong><input class="personal_input" type="text" value="<?php echo $_SESSION['email']; ?>" name="edit-email"><br>
                  <strong>Password:</strong><input class="personal_input" type="text" value="<?php echo $_SESSION['password']; ?>" name="edit-password">
                </p>
                <button type="submit" class="submit-button-green w-button" name="edit-submit">Save changes</button>
            </form>
        </div>
    </div>

    <div class="section-8 wf-section subjects-page">
        <div class="container-11 w-container">
        <h1 class="heading-11">Edit subjects</h1>
        <div class="div-block-4 a">
            <div class="edit-subjects-block">
            <div class="form-block-5 w-form">
                <form id="email-form-3" name="email-form-3" data-name="Email Form 3" method="post" class="form-5" data-wf-page-id="645e74d4cb54f08bbe2f2bc7" data-wf-element-id="b3fea556-78b2-b447-387a-99b121fa1b58" action="Resources/functions/alter-subjects.php">
                    <label for="name">Enter subjects to add</label>
                    <input type="text" class="text-field-4 w-input" maxlength="256" name="subject_name" data-name="Name" placeholder="" id="name">
                    <input type="submit" value="Add" data-wait="Please wait..." class="submit-button-3 w-button" name="add-subject">
                </form>
                
            </div>
            <div class="form-block-5 w-form">
                <form id="email-form-2" name="email-form-2" data-name="Email Form 2" method="post" class="form-5" data-wf-page-id="645e74d4cb54f08bbe2f2bc7" data-wf-element-id="6e3f0d79-fe6a-af64-5223-007b582e484a">
                    <label for="field" class="field-label-3">Choose subject to delete</label>
                    <select id="field" name="subject_name" data-name="Field" class="select-field-2 w-select">
                        <option value="">Select one...</option>
                        <?php
                        
                            $sql = "SELECT subject_name FROM subjects";
                            global $con;

                            $retval = mysqli_query($con, $sql);
                            
                            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                                $a = $row['subject_name'];
                                echo '<option value="' . $a . '">' . $a . '</option>';

                            }
                        ?>
                    </select>
                    <input type="submit" value="Remove" data-wait="Please wait..." class="submit-button-5 w-button" name="remove-subject">
                </form>
                
            </div>
            </div>
            <div class="form-block-5 w-form">
            <form id="email-form-3" name="email-form-3" data-name="Email Form 3" method="post" class="form-5" data-wf-page-id="645e74d4cb54f08bbe2f2bc7" data-wf-element-id="14e06c88-a416-8203-11bc-607436dd1329" action="Resources/functions/alter-subjects.php">
                <label for="name-2">Enter subjects to replace</label>
                <select id="name-2" name="subject_name" data-name="Field" class="text-field-4 w-input">
                        <option value="">Select one...</option>
                        <?php
                        
                            $sql = "SELECT subject_name FROM subjects";
                            global $con;

                            $retval = mysqli_query($con, $sql);
                            
                            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                                $a = $row['subject_name'];
                                echo '<option value="' . $a . '">' . $a . '</option>';

                            }
                        ?>
                    </select>
                <label for="name-3">Enter new subjects to replace with</label>
                <input type="text" class="text-field-4 w-input" maxlength="256" name="new-subject" data-name="Name 2" placeholder="" id="name-2">
                <input type="submit" value="Replace" data-wait="Please wait..." class="submit-button-3 w-button" name="replace_subject">
            </form>
            
            </div>
        </div>
        </div>
    </div>


    
    <div class="section-8 wf-section post-page">
        <div class="container-11 w-container">
        <h1 class="heading-11">Edit teacher</h1>
        <div class="div-block-4 b">
            <div action="" class="search-3 w-form"><label for="search" class="field-label-11">Search teacher by:</label>
            <div class="search-teacher-block">
                <button class="search-teacher w-button Naam">Name </button>
                <button class="search-teacher w-button Voorletters">Initials</button>
            </div>
            
            <div class="search-container"></div>
            <div id="auto-box"></div>
            
            <!-- <form method="post" action=""><input type="text" name="search"></form> -->
            
            </div>
            <div class="teacher-name-block a">
                <button class="button-14 w-button delete-teachers">Delete Teacher</button>
                <script>

                    document.querySelector(".delete-teachers").addEventListener("click", function(){
                        if($search != "" && $chosen != ""){
                            window.location.href = "Resources/functions/delete-teacher.php?search=" + search + "&chosen=" + chosen;
                        }
                        else {
                            window.alert("You need to choose a teacher first");
                        }
                    });
                </script>
                <!-- <button class="button-13 w-button">Edit teacher</button> -->
            <!-- <form class="edit-teacher-block"><div class="form-block-6 w-form"></div></form> -->
            </div>
            <script>
                
                const nameBtn = document.querySelector(".Naam");
                const initBtn = document.querySelector(".Voorletters");
                
                nameBtn.addEventListener('click', function(){
                    show_search();
                    input_bar("name");
                });
                initBtn.addEventListener('click', function(){
                    show_search();
                    input_bar("initials");
                });
                
                function show_search(){
                    document.querySelector(".search-container").innerHTML = '<input class="search-input-3 w-input search" maxlength="256" name="query" placeholder="Search…" id="search">';
                }
                
                function input_bar (a) {
                    $(document).ready(function() {
                        $('.search').keyup(function() {
                            var inputValue = $(this).val(); // Get the value from the input field
                            var chosen = a;
                
                            $.ajax({
                                url: 'Resources/functions/show_suggestions.php',
                                type: 'GET',
                                dataType: 'text',
                                data: { input: inputValue, chosen: chosen }, // Pass the input value as a parameter
                                success: function(response) {
                                    // Handle the response from the PHP script
                                    
                                    document.querySelector('#auto-box').innerHTML = response;
                                    
                                },
                                error: function(xhr, status, error) {
                                    // Handle errors
                                    console.log('Error:', error);
                                }
                            });
                        });
                    });
                }
                
                function show_teachers(element, a){
                    // window.alert("Hello - " + element.textContent + " : " + a);
                    window.location.href = "admin.php?search=" + element.textContent + "&chosen=" + a; 
                }
                
            </script>
            <?php
                // show_teachers_edit();
                    
                if(isset($_GET['search']) && isset($_GET['chosen'])){
                    show_teachers_edit();
                }
            
            ?>
        </div>
        </div>
    </div>

    <script>
        function change_subjects(e){
            let subject_text = document.querySelector(".subject-list");
            let addBtn = document.querySelector(".add-subject");
            let removeBtn = document.querySelector(".remove-subject");
            
            addBtn.addEventListener("click", function(){
                const subject = document.querySelector(".choose-subject").value;
                
                if(subject != ""){
                    window.location.href = "Resources/functions/edit-teacher-subjects.php?search=" + e + "&chosen=" + subject + "&add=";
                }
                else {
                    window.alert("No subject was chosen");
                }
            });
            removeBtn.addEventListener("click", function(){
                const subject = document.querySelector(".choose-subject").value;
                
                if(subject != ""){
                    window.location.href = "Resources/functions/edit-teacher-subjects.php?search=" + e + "&chosen=" + subject + "&remove=";
                }
                else {
                    window.alert("No subject was chosen");
                }
            });
            // window.alert("hello" + subject_text.value);
            
        }
    </script>

    <div class="section-8 wf-section edit-page">
        <!-- <div class="container-11 w-container">
        <h1 class="heading-11">Edit places</h1>
        <div class="div-block-4 b">
            <div class="w-layout-grid grid-5">
            <div id="w-node-_74ffb9c8-6e42-7ddc-ac91-38dc62a67046-a3c3354f" class="edit-places-block">
                <h3 id="w-node-_5a7cb671-64f6-03e0-1ca5-53d944c9c59b-a3c3354f" class="edit-places-heading">Aula</h3>
                <div data-delay="4000" data-animation="slide" class="edit-places-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="w-slider-mask">
                    <div class="slide w-slide"></div>
                    <div class="w-slide"></div>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="icon-8 w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="icon-7 w-icon-slider-right"></div>
                </div>
                <div class="slide-nav-2 w-slider-nav w-round"></div>
                </div>
                <div class="edit-places-photos"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"></div>
                <a href="#" class="button-15 w-button">Save changes</a>
            </div>
            <div id="w-node-_3f98dfdf-8190-ee4b-6b6f-fe0a71845209-a3c3354f" class="edit-places-block">
                <h3 id="w-node-_3f98dfdf-8190-ee4b-6b6f-fe0a7184520a-a3c3354f" class="edit-places-heading">Saal</h3>
                <div data-delay="4000" data-animation="slide" class="edit-places-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="w-slider-mask">
                    <div class="w-slide"></div>
                    <div class="w-slide"></div>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="icon-8 w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="icon-7 w-icon-slider-right"></div>
                </div>
                <div class="slide-nav-2 w-slider-nav w-round"></div>
                </div>
                <div class="edit-places-photos"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"></div>
                <a href="#" class="button-15 w-button">Save changes</a>
            </div>
            <div id="w-node-_6032a6c4-2b2c-3be5-42b8-a859e3425789-a3c3354f" class="edit-places-block">
                <h3 id="w-node-_6032a6c4-2b2c-3be5-42b8-a859e342578a-a3c3354f" class="edit-places-heading">Forum</h3>
                <div data-delay="4000" data-animation="slide" class="edit-places-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="w-slider-mask">
                    <div class="w-slide"></div>
                    <div class="w-slide"></div>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="icon-8 w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="icon-7 w-icon-slider-right"></div>
                </div>
                <div class="slide-nav-2 w-slider-nav w-round"></div>
                </div>
                <div class="edit-places-photos"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"></div>
                <a href="#" class="button-15 w-button">Save changes</a>
            </div>
            <div id="w-node-_2c85ac1b-2330-c53e-121e-6ba45d0b6c82-a3c3354f" class="edit-places-block">
                <h3 id="w-node-_2c85ac1b-2330-c53e-121e-6ba45d0b6c83-a3c3354f" class="edit-places-heading">E-sentrum</h3>
                <div data-delay="4000" data-animation="slide" class="edit-places-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="w-slider-mask">
                    <div class="w-slide"></div>
                    <div class="w-slide"></div>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="icon-8 w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="icon-7 w-icon-slider-right"></div>
                </div>
                <div class="slide-nav-2 w-slider-nav w-round"></div>
                </div>
                <div class="edit-places-photos"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"></div>
                <a href="#" class="button-15 w-button">Save changes</a>
            </div>
            <div id="w-node-_8a27e3a9-99b1-ec77-5589-cfa9f26cb0c5-a3c3354f" class="edit-places-block">
                <h3 id="w-node-_8a27e3a9-99b1-ec77-5589-cfa9f26cb0c6-a3c3354f" class="edit-places-heading">Di HUB</h3>
                <div data-delay="4000" data-animation="slide" class="edit-places-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="w-slider-mask">
                    <div class="w-slide"></div>
                    <div class="w-slide"></div>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="icon-8 w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="icon-7 w-icon-slider-right"></div>
                </div>
                <div class="slide-nav-2 w-slider-nav w-round"></div>
                </div>
                <div class="edit-places-photos"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"></div>
                <a href="#" class="button-15 w-button">Save changes</a>
            </div>
            <div id="w-node-fc87939f-dd49-0ff8-71e7-18896a479109-a3c3354f" class="edit-places-block">
                <h3 id="w-node-fc87939f-dd49-0ff8-71e7-18896a47910a-a3c3354f" class="edit-places-heading">D Hoek</h3>
                <div data-delay="4000" data-animation="slide" class="edit-places-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                <div class="w-slider-mask">
                    <div class="w-slide"></div>
                    <div class="w-slide"></div>
                </div>
                <div class="w-slider-arrow-left">
                    <div class="icon-8 w-icon-slider-left"></div>
                </div>
                <div class="w-slider-arrow-right">
                    <div class="icon-7 w-icon-slider-right"></div>
                </div>
                <div class="slide-nav-2 w-slider-nav w-round"></div>
                </div>
                <div class="edit-places-photos"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"><img src="images/upload_FILL0_wght400_GRAD0_opsz48.png" loading="lazy" alt="" class="image-9"></div>
                <a href="#" class="button-15 w-button">Save changes</a>
            </div>
            </div>
        </div> -->
        </div>
    </div>




    <div class="section-8 wf-section add-page">
        <div class="container-11 w-container">
        <h1 class="heading-11">Add teacher</h1>
        <form class="div-block-4" method="post" action="Resources/functions/insert_teacher.php">
            <div class="add-teacher-block">
                <div class="form-block-6 w-form">
                    <div id="email-form-3" name="email-form-3" data-name="Email Form 3" method="get" class="form-6" data-wf-page-id="645e74d4cb54f08bbe2f2bc8" data-wf-element-id="2cca9f93-caf1-1acd-5c3a-479d5b6bed83">
                        <label for="name">Name</label>
                        <input type="text" class="form-fill-in w-input" maxlength="256" name="name-teacher-add" data-name="Name 3" placeholder="" id="name-3">
                        <label for="email" class="form-description">Initials</label>
                        <input class="form-fill-in w-input" maxlength="256" name="initials-teacher-add" data-name="Email"  id="email">
                        <label for="field" class="field-label-3">Subjects</label>
                        <div class="div-block-7">
                            <select id="field" name="field" data-name="Field" class="select-field-3 w-select chosenSubject">
                                <option value="">Select one...</option>
                                <?php
                                
                                    $sql = "SELECT subject_name FROM subjects";
                                    global $con;
            
                                    $retval = mysqli_query($con, $sql);
                                    
                                    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
                                        $a = $row['subject_name'];
                                        echo '<option value="' . $a . '">' . $a . '</option>';
            
                                    }
                                ?>
                            </select>
                            <input value="Add" data-wait="Please wait..." class="add-subject w-button add-category-teacher" type="button"></div>
                            <input type="text" class="form-fill-in w-input subject_add_container" maxlength="256" name="subject-teacher-add" data-name="Name 2" placeholder="" id="name-2" readonly>
                        </div>
                    </div>
                    <div class="form-block-6 w-form">
                        <div id="email-form-2" name="email-form-2" data-name="Email Form 2" method="get" class="form-6" data-wf-page-id="645e74d4cb54f08bbe2f2bc8" data-wf-element-id="6e3f0d79-fe6a-af64-5223-007b582e484a">
                            <label for="email-2" class="field-label-4">Photo</label>
                            <div class="add-teacher-photo">
                            <img src="images/Download.png" loading="lazy" height="40" alt="" class="image-5" onclick="window.location.href = 'Resources/functions/upload_photo.php';">
                            <input value="<?php echo $_SESSION['image_link_1']; ?>" name="image-link-1"><br>
                            <img src="images/Download.png" loading="lazy" height="40" alt="" class="image-5"></div>
                            <label for="email-2" class="field-label-4">Floorplan</label>
                            <img src="images/Download.png" loading="lazy" width="40" alt="" class="image-5">
                            <label for="field-2" class="form-description a">Description of location</label>
                            <textarea required="" placeholder="" maxlength="5000" id="field-2" name="location-teacher-add" data-name="Field 2" class="textarea w-input"></textarea>
                        </div>
                    </div>
                </div>
                <button class="submit-button-green a w-button" name="add-teacher-btn">Submit</button>
            </form>
        </div>
    </div>
    <script>
        // Add Teacher Section
        const add_subject = document.querySelector(".add-category-teacher");
        const subject_container = document.querySelector(".subject_add_container");
        const chosen_subject = document.querySelector(".chosenSubject");
        
        // window.alert("Hello");
        
        let subject_count = 0;
        add_subject.addEventListener("click", function(){
            var temp = subject_container.value;
            
            if(subject_count == 0){
                subject_container.value = temp + chosen_subject.value;
            }
            else if(subject_count > 0){
                subject_container.value = temp + ", " + chosen_subject.value;
            }
            
            subject_count++;
        });
        
        
        
        function change_photo(a, init){
            window.location.href = "Resources/functions/edit-image.php?search=" + init;
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

const user_page = document.querySelector(".user-pages");
const subjects_page = document.querySelector(".subjects-page");
const post_page = document.querySelector(".post-page");
const personal_page = document.querySelector(".personal-page");
const add_page = document.querySelector(".add-page");


const user_btn = document.querySelector(".edit-btn");
const category_btn = document.querySelector(".category-btn");
const post_btn = document.querySelector(".add-item");
const personal_btn = document.querySelector(".personal-btn");
const edit_btn = document.querySelector(".add-teacher");

user_btn.addEventListener("click", function(){
    Switch(0);
});
category_btn.addEventListener("click", function(){
    Switch(1);
});
post_btn.addEventListener("click", function(){
    // Switch(2);
    window.location.href = "edit_teacher.php";
});
edit_btn.addEventListener("click", function(){
    window.location.href = "add_teacher.php";
});
personal_btn.addEventListener("click", function(){
    Switch(4);
});

function Switch(n){
    pages = [user_page, subjects_page, post_page, add_page, personal_page];

    for (let i = 0; i < pages.length; i++) {
        const element = pages[i];
        if(i == n){
            element.classList.add("show-admin-sidebar");
            element.classList.remove("hide-admin-sidebar");
        }
        else {
            element.classList.remove("show-admin-sidebar");
            element.classList.add("hide-admin-sidebar");
        }
    }

}

if(search == 0){
    Switch(0);
}
else if(search == "1"){
    Switch(1);
}
else if(search == "2"){
    window.location.href = "edit_teacher.php";
}
else if(search == "3"){
    window.location.href = "add_teacher.php";
}
else if(search == "4"){
    Switch(4);
}

    </script>
</body>
</html>