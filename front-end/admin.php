<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link rel="icon" href="http://a.espncdn.com/combiner/i?img=/i/teamlogos/ncaa/500/2368.png&w=80&h=80&transparent=true" type="image/png" sizes="16x16">
        <title>FoxTalk Admin</title>
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
			require('includes/limbo_login_tools.php');
			
			session_start();
					
			# redirect to login page if there is no session open
			if(!isset($_SESSION['login_user'])){
				session_destroy();
				load('login.php');
			}	
            
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
                        <a href="#!" class="brand-logo">Fox Talk</a>
                        <!--<ul class="right hide-on-med-and-down">
                            <li><a id="button">What are we?</a></li>
                            <li><a id="button2">View Suggestions</a></li>
                            <li><a id="button3">Submit Suggestion</a></li>
                            </ul>-->
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a id="top">Top</a></li>
                            <li><a id="button">Submitted Suggestions</a></li>
                            <li><a id="button2">Approved Suggestions</a></li>
                            <li><a id="button3">Pending Suggestions</a></li>
							<li><a id="button4">Rejected Suggestions</a></li>
							<li><a id="button5" href="logout.php">Sign out</a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a id="top">Top</a></li>
                            <li><a id="button">Submitted Suggestions</a></li>
                            <li><a id="button2">Approved Suggestions</a></li>
                            <li><a id="button3">Pending Suggestions</a></li>
							<li><a id="button4">Rejected Suggestions</a></li>
							<li><a id="button5" href="logout.php">Sign out</a></li>
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
                    <h1 class="header center red-text text-darken-2">Marist Fox Talk</h1>
                    <br><br>
                </div>
            </div>
            <!--<div class="section no-pad-bot">
                <div class="container">
                    <br><br>
                    <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
                    <p class="center-align"><img id="seal" src="images/logo.png"></p>
                    <div class="row center">
                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                    </div>
                    <div class="row center">
                        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
                    </div>
                    <br><br>
                </div>
                </div>-->
            <div class="parallax"><img src="images/rotunda.jpg" alt="Unsplashed background img 1"></div>
        </div>
        <div class="container">
            <div class="section">
                <!--   Submitted Suggestions   -->
                <div id="subSug"></br></br></br></div>
                <div class="row">
                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <h4>Submitted Suggestions</h4>
                        <?php
                            show_admin_records("Submitted");
                        ?>
                    </div>
                </div>
                <!--   Approved Submissions   -->
                <div id="appSug"></br></br></br></div>
                <div class="row">
                    <div class="col s12 center">
                        <h4>Approved Suggestions</h4>
                        <?php
                            show_admin_records("Approved");
                        ?>
                    </div>
                </div>
                <!--   Pending Suggestions (Under Review)   -->
                <div id="penSug"></br></br></br></div>
                <div class="row">
                    <div class="col s12">
                        <h4 class="center-align" id="subTable">Pending Suggestions</h4>
                        <?php
                            show_admin_records("Under Review");
                        ?>
                    </div>
                </div>
				<!--   Rejected Suggestions   -->
				<div id="rejSug"></br></br></br></div>
				<div class="row">
                    <div class="col s12">
                        <h4 class="center-align" id="rejectedSuggestions">Rejected Suggestions</h4>
                        <?php
                            show_admin_records("Rejected");
                        ?>
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
			$('.tooltipped').tooltip({delay: 50});
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
            scrollTop: $("#subSug").offset().top
            }, 500);
            });
            $(".side-nav #button").click(function() {
            $('html, body').animate({
            scrollTop: $("#subSug").offset().top
            }, 500);
            });
            $("#button2").click(function() {
            $('html, body').animate({
            scrollTop: $("#appSug").offset().top
            }, 500);
            });
            $(".side-nav #button2").click(function() {
            $('html, body').animate({
            scrollTop: $("#appSug").offset().top
            }, 500);
            });
            $("#button3").click(function() {
            $('html, body').animate({
            scrollTop: $("#penSug").offset().top
            }, 500);
            });
            $(".side-nav #button3").click(function() {
            $('html, body').animate({
            scrollTop: $("#penSug").offset().top
            }, 500);
            });
            $("#button4").click(function() {
            $('html, body').animate({
            scrollTop: $("#rejSug").offset().top
            }, 500);
            });
            $(".side-nav #button4").click(function() {
            $('html, body').animate({
            scrollTop: $("#rejSug").offset().top
            }, 500);
            });
        </script>
    </body>
</html>