<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link rel="icon" href="http://a.espncdn.com/combiner/i?img=/i/teamlogos/ncaa/500/2368.png&w=80&h=80&transparent=true" type="image/png" sizes="16x16">
        <title>FoxTalk</title>
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
				header("location: bounce.php");

			}
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				//reset $_POST variable
				$_POST = array();
			}
        ?>
    </head>
    <body id="topPage">
        <nav class="navbar-fixed white" role="navigation">
            <div class="navbar-fixed white">
                <nav>
                    <div class="nav-wrapper container">
                        <a href="#!" class="brand-logo">FoxTalk</a>
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
				    <div class="center-align"><img id="seal" src="images/logo.png"></div>
					<h1 class="header center red-text text-darken-2">Marist FoxTalk</h1>
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
                            <h2 class="center brown-text"><i class="material-icons">add</i></h2>
                            <h5 class="center">Submission</h5>
                            <p class="light">Help make your school a better place! Submit any suggestions you have for Marist College, and they will be made visible to both the student body and the school administrators.</p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="material-icons">assignment</i></h2>
                            <h5 class="center">Review</h5>
                            <p class="light">View suggestions made by other students and vote on the best ideas.</p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="material-icons">done</i></h2>
                            <h5 class="center">Implementation</h5>
                            <p class="light">Get feedback from school administrators on the status of your suggestions.</p>
                        </div>
                    </div>
                </div>
                <!--   View Submissions   -->
                <div id="subTable"></br></br></br></div>
                <div class="row">
                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <h4 id="subTable">Top Suggestions</h4>
                        <?php
							show_records($dbc);
						?>
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
                        <div class="row">
                            <form class="col s12" action="index.php" method="POST">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: John/Jane" required name="first_name" type="text" class="validate" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: Doe" required name="last_name" type="text" class="validate" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: 200XXXXX" required name="cwid" type="number" pattern=".{8,8}" class="validate" value="<?php if(isset($_POST['cwid'])) echo $_POST['cwid']; ?>">
                                        <label for="cwid">CWID</label>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="input-field col s6">
                                        <input placeholder="Ex: Please wash cups properly" required name="title" type="text" class="validate" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>">
                                        <label for="cwid">Title</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea required name="description" class="materialize-textarea" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>"></textarea>
                                        <label for="description">Suggestion</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select required name="department" value="<?php if(isset($_POST['department'])) echo $_POST['department']; ?>">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="Dining">Dining</option>
                                            <option value="Housing">Housing</option>
                                            <option value="Registration">Registration</option>
                                            <option value="IT">Information Technology</option>
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
        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">
                        <h5 class="header col s12 light"></h5>
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
        </footer>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script>
            $(document).ready(function() {
            $('select').material_select();
            $(".button-collapse").sideNav();
			$('.modal-trigger').leanModal();
            });
			// Display suggestion detail modal if window contains "sid?=" and an sid number
            var str = window.location.href;
                
            /*if(str.indexOf("?sid=") > -1)
                $('#modal1').openModal();*/
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
			$(".modal-action modal-close waves-effect waves-green btn-flat #modalClose").click(function() {
            $('html, body').animate({
            scrollTop: $("#subTable").offset().top
            }, 500);
            });
        </script>
    </body>
</html>