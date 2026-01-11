<?php
    session_start();
    require("config.php");
    require("function.php");
    
    function show_subjects(){
        $sql = "SELECT subject_name FROM subjects";
        global $con;

        $retval = mysqli_query($con, $sql);
        $size = mysqli_num_rows($retval);
        $count = 0;
        echo "<div class='places-block'><div class='left-side'>";
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
            $a = $row['subject_name'];
            
            if($count == round(($size/2))){
                echo "</div><div class='right-side'>";
            }
            echo "<button class='name' onclick='show_teachers(this, `subjects`)'>$a</button>";
            
            $count++;
        }
        echo "</div></div>";
    }
    
    function show_lokale(){
        
        $string = '';
        $string .= '    <div class="places-block">';
        $string .= '        <div class="left-side">';
        $string .= '            <div class="name"><a href="floor-plan/Alua.pdf" target="_blank" >Aula</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Odeon.pdf" target="_blank">Odeon</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Saal.pdf" target="_blank">Saal</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Mnr Klaus kantoor.pdf" target="_blank">Mnr Klause se Kantoor</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Kinderleiding.pdf" target="_blank">Kinderleiding</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Klerebank.pdf" target="_blank">Klerebank</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Biblioteek.pdf" target="_blank">Biblioteek</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/E-sentrum.pdf" target="_blank">E-sentrum</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Forum.pdf" target="_blank">Forum</a></div>';
        $string .= '        </div>';
        $string .= '        <div class="right-side">';
        $string .= '            <div class="name"><a href="floor-plan/Logistiek bestuurder kantoor.pdf" target="_blank">Logistieke Bestuurder</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Personeelkamer.pdf" target="_blank">Personeelkamer</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Verlore Goedere.pdf" target="_blank">Verlore Goedere</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/D Hoek.pdf" target="_blank">D-Hoek</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Om die Hoek.pdf" target="_blank">Om die Hoek</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Mnr Eugene kantoor.pdf" target="_blank">Mnr Eugene se kantoor</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Hennes de Wet.pdf" target="_blank">Mnr Hennes se Kantoor</a></div>';
        $string .= '            <div class="name"><a href="floor-plan/Lunette steenkamp.pdf" target="_blank">Tannie Christa Viljoen se kantoor</a></div>';
        $string .= '        </div>';
        $string .= '    </div>';
        
        $string .= '';
        
        echo $string;
    }
    function show_input(){
        /* echo '
            <input type="search" class="search-input-2 w-input inputBar" maxlength="256" name="inputBar" placeholder="Soek n onnie…" id="search" required="">
            <div class="div-block-10 auto-box">
            
            </div>
        '; */
        echo '<input type="search" class="search-input-2 w-input inputBar" maxlength="256" name="inputBar" placeholder="Soek n onnie…" id="search">';
    }
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
    <div class="section-3 wf-section">
        <h1 class="heading-2">HELPMEKAAR KOLLEGE</h1>
        <a href="#how-it-works" class="link-2">Sien hoe dit werk</a>
    </div>
    <div class="section-4 wf-section">
        <div class="container-5 w-container">
        <h1 class="heading-4">Soek n onnie volgens:</h1>
        <div class="div-block-6">
            <button name="Naam" class="teacher-search w-button Naam">NAAM</button>
            <button name="Voorletters" class="teacher-search w-button Voorletters">VOORLETTERS</button>
            <button name="Vakke" class="teacher-search w-button Vakke">VAKKE</button>
            <button name="Lokale" class="teacher-search w-button Lokale">LOKALE</button>
        </div>
        <div class="search-2 w-form search_teacher">
            
        </div>
        <div class="div-block-10" id="auto-box">
            
        </div>
        
        <script>
            
            const Naam = document.querySelector(".Naam");
            const Voorl = document.querySelector(".Voorletters");
            const Vakke = document.querySelector(".Vakke");
            const Lokale = document.querySelector(".Lokale");
            
            const input_field = document.querySelector(".search_teacher");
            const form_contents = '<?php show_input(); ?>';
            const subject_contents = "<?php show_subjects(); ?>";
            const lokale_contents = '<?php show_lokale(); ?>';
            
            
            Naam.addEventListener("click", function(){
                // window.alert("helo");
                input_field.innerHTML = form_contents;
                input_bar("name");
                
            });
            
            
            Voorl.addEventListener("click", function(){
                input_field.innerHTML = form_contents;
                input_bar("initials");
            });
               
            Vakke.addEventListener("click", function(){
                input_field.innerHTML = subject_contents;
                input_bar("subjects");
            });
            
            Lokale.addEventListener("click", function(){
                input_field.innerHTML = lokale_contents;
                
            });
            
            function input_bar (a) {
                $(document).ready(function() {
                    $('.inputBar').keyup(function() {
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
                window.location.href = "index.php?search=" + element.textContent + "&chosen=" + a; 
            }
            
        </script>
        
        

        
        </div>
    </div>
    <div class="section-5 wf-section" id="section-search">
        <div class="container-8 w-container">
        <?php
        
            if(isset($_GET['search']) && isset($_GET['chosen'])){
                show_teachers();
                /*echo '
                    <script>
                        window.onload = function() {
                            var container = document.getElementById("output");
                            if (container) {
                                container.scrollIntoView({ behavior: "smooth" });
                            }
                        }
                    </script>
                ';*/
            }
        ?>
        </div>
        
    </div>
    <script>
        
        
    </script>
    <section class="how-it-works wf-section" id="how-it-works">
        <div class="w-container">
        <h1 class="heading-12">Hoe werk dit?</h1>
        <p class="paragraph-5">Hierdie webwerf is geskep om leerders, sowel as ouers, se lewens te vergemaklik deur hulle te help om hulle pad deur die skool te vind. Dit is presies wat ons hier is om te doen.<br>‍<br><br>HIER IS HOE DIT WERK:<br>- Om &#x27;n <strong>onderwyser se naam, voorletters of ń vak</strong> te soek, kies een van die knoppies “Naam, Voorletters, Vak” sodat dit jou na die soekbalk sal neem.<br>‍<br>- Om die verskillende <strong>lokale</strong> op te spoor, druk op die knoppie “Lokale”. Dit sal vir jou al die skool se lokale gee.<br>‍<br>- Om gebruik te maak van ander hulpmiddels soos <strong>Adam, E-Skool en Helpmekaar24</strong>, klik op die drie strepies in die regterkantse, boonste hoek, wat jou hiernatoe sal lei.<br>‍<br>- Om na die <strong>Helpmekaar se tuisblad</strong> te gaan, klik op die drie strepies in die regterkantse, boonste hoek, wat jou na die knoppie “Tuisblad” toe sal lei.<br>‍</p>
        </div>
    </section>
    <section class="footer-dark wf-section">
        <div class="container-6">
        <div class="footer-wrapper">
            <a href="#" class="footer-brand w-inline-block"><img src="images/SchoolHelp-logo.png" loading="lazy" width="279" sizes="(max-width: 479px) 72vw, (max-width: 767px) 279px, 1vw" srcset="images/SchoolHelp-logo-p-500.png 500w, images/SchoolHelp-logo.png 577w" alt=""></a>
            <div class="footer-content">
            <div id="w-node-eff02ab5-9709-cc78-2aed-a71e9269ad00-be2f2bc2" class="footer-block">
                <div class="title-small">Company</div>
                <a href="#" class="footer-link">How it works</a>
                <a href="#" class="footer-link">About us</a>
                <a href="#" class="footer-link">Docs</a>
            </div>
            <div id="w-node-eff02ab5-9709-cc78-2aed-a71e9269ad09-be2f2bc2" class="footer-block">
                <div class="title-small">Products</div>
                <a href="#" class="footer-link">Vind jou onnie</a>
                <a href="#" class="footer-link">Lcoker</a>
                <a href="#" class="footer-link">Verlore Goedere</a>
            </div>
            <div id="w-node-eff02ab5-9709-cc78-2aed-a71e9269ad14-be2f2bc2" class="footer-block">
                <div class="title-small">About</div>
                <a href="#" class="footer-link">Terms &amp; Conditions</a>
                <a href="#" class="footer-link">Privacy policy</a>
                <div class="footer-social-block">
                <a href="#" class="footer-social-link w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124ac15112aad5_twitter%20small.svg" loading="lazy" alt=""></a>
                <a href="#" class="footer-social-link w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a389912aad8_linkedin%20small.svg" loading="lazy" alt=""></a>
                <a href="#" class="footer-social-link w-inline-block"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a51bf12aae9_facebook%20small.svg" loading="lazy" alt=""></a>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-copyright-center">Copyright © 2021 Company name</div>
    </section>
    
    
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e74d4cb54f08bbe2f2bbe" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/webflow.js" type="text/javascript"></script>
    
    <script>
        scrollToSearch();
        function scrollToSearch(){
            
            // Get the target container element
            const scrollTarget = document.querySelector('#section-search');
    
            // Calculate the position to scroll to (center of the container)
            const scrollPosition = scrollTarget.offsetTop - (0);
    
            // Scroll to the calculated position smoothly
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            });
        }
    </script>
    
</body>
</html>