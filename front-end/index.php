<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link rel="icon" href="http://a.espncdn.com/combiner/i?img=/i/teamlogos/ncaa/500/2368.png&w=80&h=80&transparent=true" type="image/png" sizes="16x16">
        <title>Fox Talk</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
            #seal {
            user-drag: none; 
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            }
        </style>
        <?php
            require('includes/helpers.php');
            require('includes/connect_db.php');
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
				//insert
				insert_item(date('Y-m-d H:i:s'));
				//echo '<script>$(document).ready(function () {$("#success").html("Success! Your suggestion has been submitted.");});</script>';
				
				//reset $_POST variable
				$_POST = array();
			}
        ?>
    </head>
    <body id="topPage" >
        <nav class="navbar-fixed white" role="navigation">
            <div class="navbar-fixed white">
                <nav>
                    <div class="nav-wrapper container">
                        <a href="#!" class="brand-logo">Fox Talk</a>
                        <!--<ul class="right hide-on-med-and-down">
                            <li><a id="button">What are we?</a></li>
                            <li><a id="button2">View Suggestions</a></li>
                            <li><a id="button3">Submit Suggestion</a></li>
                            </ul>-->
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a id="top">Top</a></li>
                            <li><a id="button">What are we?</a></li>
                            <li><a id="button2">View Suggestions</a></li>
                            <li><a id="button3">Submit Suggestion</a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a id="top">Top</a></li>
                            <li><a id="button">What are we?</a></li>
                            <li><a id="button2">View Suggestions</a></li>
                            <li><a id="button3">Submit Suggestion</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </nav>
        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
                <div class="container">
                    <br><br>
                    <!--<h1 class="header center teal-text text-lighten-2">Parallax Template</h1>-->
                    <p class="center-align"><img id="seal" src="images/logo.png"></p>
                    <div class="row center">
                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                    </div>
                    <div class="row center">
                        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="parallax"><img src="images/rotunda.jpg" alt="Unsplashed background img 1"></div>
        </div>
        <div class="container">
            <div class="section">
                <!--   Description   -->
                <div id="aboutUs"></br></br></br></div>
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                            <h5 class="center">Speeds up development</h5>
                            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">User Experience Focused</h5>
                            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center">Easy to work with</h5>
                            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                        </div>
                    </div>
                </div>
                <!--   View Submissions   -->
                <div id="subTable"></br></br></br></div>
                <div class="row">
                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <h4 id="subTable">Top Suggestions</h4>
                        <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                    </div>
                </div>
                <!--   Submitt Suggestions   -->
                <div id="subForm"></br></br></br>
					<?php
                        foreach($_POST as $key => $value)
                            echo "<p>$key: $value</p>";
					?>
				</div>
                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align" id="subTable">Talk To Us</h4>
                        <hr>
                        <div class="row">
                            <form class="col s12" action="index.php" method="POST">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: John/Jane" required name="first_name" type="text" class="validate">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: Doe" required name="last_name" type="text" class="validate">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: 200XXXXX" required name="cwid" type="number" minlength="8" maxlength="8" class="validate">
                                        <label for="cwid">CWID</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea required name="description" class="materialize-textarea"></textarea>
                                        <label for="description">Suggestion</label>
										
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select required name="department">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="Dining">Dining</option>
                                            <option value="Housing">Housing</option>
                                            <option value="Registration">Registration</option>
                                            <option value="Information Technology">Information Technology</option>
                                            <option value="Parking">Parking</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label>Designated Department</label>
                                    </div>
                                    <div class="input-field col s6 right-align">
                                        <button class="btn waves-effect red accent-4 waves-light" type="submit">Submit
                                        <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">
                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
            </div>
            <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <h4>Contact Us</h4>
                        <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                    </div>
                </div>
            </div>
            </div>-->
        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">
                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="images/riverView.jpg" alt="Unsplashed background img 3"></div>
        </div>
        <footer class="page-footer teal">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Settings</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script>
            $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();
            });
            $("#top").click(function() {
            $('html, body').animate({
            scrollTop: $("#topPage").offset().top
            }, 500);
            });
            $(".side-nav #top").click(function() {
            $('html, body').animate({
            scrollTop: $("#topPage").offset().top
            }, 500);
            });
            $("#button").click(function() {
            $('html, body').animate({
            scrollTop: $("#aboutUs").offset().top
            }, 500);
            });
            $(".side-nav #button").click(function() {
            $('html, body').animate({
            scrollTop: $("#aboutUs").offset().top
            }, 500);
            });
            $("#button2").click(function() {
            $('html, body').animate({
            scrollTop: $("#subTable").offset().top
            }, 500);
            });
            $(".side-nav #button2").click(function() {
            $('html, body').animate({
            scrollTop: $("#subTable").offset().top
            }, 500);
            });
            $("#button3").click(function() {
            $('html, body').animate({
            scrollTop: $("#subForm").offset().top
            }, 500);
            });
            $(".side-nav #button3").click(function() {
            $('html, body').animate({
            scrollTop: $("#subForm").offset().top
            }, 500);
            });
        </script>
    </body>
</html>