<?php
    session_start();
    require("config.php");
    require("function.php");
    
?>
<!DOCTYPE html>
<html data-wf-page="645e74d4cb54f08bbe2f2bc2" data-wf-site="645e74d4cb54f08bbe2f2bbe">
<head>
    <meta charset="utf-8">
    <title>School.Help</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="Resources/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/lostandfound-front-3f7d171e0b531a9da6b8.webflow.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Resources/css/file_explorer.css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["PT Serif:400,400italic,700,700italic","Varela:400","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Bitter:400,700,400italic"]  }});</script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-2">
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
        <table class="file_table">
            <style>
                .file_table {
                    background: white;
                }
            </style>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Teacher</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    show_imageplans();
                ?>
            </tbody>
        </table>
    </main>
    
    <style>
        .file_table image {
            width: 150px;
            height: 200px;
            border: 1px solid;
        }
    </style>
    
    <?php
        /*if(isset($_GET['floorplan'])){
            $floorplan = $_GET['floorplan'];
            
            $style = substr($floorplan, 0, strlen($floorplan)-4);
            
            echo "
                <style>
                    #$style td {
                        background: #ddd;
                    }
                    #$style input {
                        background: #ddd;
                    }
                </style>
            ";
            
            $scrollTo = $style;
            $name = $_GET['name'];
        }
        else {
            $scrollTo = "";
        }*/
    ?>
    
    <script>
        function view(e){
            window.location.href = "floor-plan/" + e;
        }
        
        /*document.addEventListener("DOMContentLoaded", function() {
            var scrollTo = "<?php echo $scrollTo; ?>";
            var nameTo = "<?php echo $name; ?>";
            
            const container = document.querySelectorAll("#" + scrollTo + " .choose-button");
            const name_choice = document.querySelectorAll("#" + scrollTo + " .floor-name");
            
            let n = 0;
            
            for(var i = 0; i < container.length; i++){
                if(name_choice[i].textContent == nameTo){
                    container[i].textContent = "Go Back";
                    n = i;
                }
            }
            
            
            
            if (scrollTo) {
                // var target = document.getElementById(scrollTo);
                var target = document.querySelectorAll("#" + scrollTo)[n];
                if (target) {
                    var windowHeight = window.innerHeight;
                    var targetOffset = target.getBoundingClientRect().top;
                    var scrollPosition = window.scrollY + targetOffset - (windowHeight / 2);

                    window.scrollTo({
                        top: scrollPosition,
                        behavior: 'smooth'
                    });
                }
                
                const btn = document.querySelectorAll("#" + scrollTo + " .choose-button")[n];
                
                btn.addEventListener('click', function(){
                    var string = "";
                    
                    for(var i = 0; i < nameTo.length; i++){
                        if(nameTo[i] == " "){
                            string += "_";
                        }
                        else {
                            string += nameTo[i];
                        }
                    }
                    
                    window.location.href = "edit_teacher.php?teacher=" + string;
                });
            }
            
            
        });*/
    </script>
    
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e74d4cb54f08bbe2f2bbe" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/webflow.js" type="text/javascript"></script>
    
</body>
</html>