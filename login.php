<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>FoxTalk Admin | Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
        <script>
            $(".button-collapse show-on-large").sideNav();
        </script>
        <script>
            $(document).ready(function () {
                $('.modal-trigger').leanModal({
                    dismissible: false, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    in_duration: 300, // Transition in duration
                    out_duration: 200, // Transition out duration
                    ready: function () {
                        alert('Ready');
                    }, // Callback for Modal open
                    complete: function () {
                        alert('Closed');
                    } // Callback for Modal close
                });
            });

            function startTime() {
                var d = new Date();
                var n = d.toString(d.getDate());
                document.getElementById('clock').innerHTML = n;
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }
                ;  // add zero in front of numbers < 10
                return i;
            }
        </script>
		<?php
			require('includes/connect_db.php');
			require('includes/limbo_login_tools.php');
            require('includes/helpers.php');

            session_start();
            
			if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
				global $dbc;
				$pid = -1;
                
				$user = strtolower(trim($_POST['name']));
				$pass = $_POST['pass'];

				# Queries the database for salt unique to users to use in hash function
				$query = 'SELECT salt FROM admins WHERE username="' . $user . '"';
				
				show_query($query);
				
				$results = mysqli_query($dbc, $query);
				check_results($results);
				
				$results = mysqli_fetch_array($results);
				
                if(!empty($results)) {
                    $options = [
                        'cost' => 12,
                        'salt' => $results[0],
                    ];
                    
                    $pass = password_hash($pass, PASSWORD_BCRYPT, $options);

                    $pid = validate($user, $pass);
                }
                else
                    $pid = -1;

				if($pid == -1) {
					echo '<script>$(document).ready(function () {$("#error").html("Login failed, please try again.");});</script>';
				}
				else {
                    $_SESSION['login_user'] = $user;
					load('admin.php', $pid);
                }
			}
		?>

        <style>
            nav{
                background-color: #B31B1B;
            }
            .nav-wrapper{
                background-color: #B31B1B;
            }
            #title{
                padding-left: 5%;
                font-size: 50px;
            }
            #mainPage{
                font-size: 20px;
            }
            #content{
                padding-left: 5%;
            }
			#form{
				padding-left: 5%;
			}
			#error{
				padding-bottom: 1%;
			}
        </style>
	</head>	
    <body onload="startTime()">
        <header>
            <nav class="top-nav">
                <div class="container">
                    <div class="nav-wrapper">
                        <a class="page-title" id="title">FoxTalk Management Portal</a>
                    </div>
                </div>
            </nav>
            <nav>
                <div class="nav-wrapper">
                    <a id="mainPage" href="#" class="brand-logo center">Login Page</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a id="clock" href="#">Time</a></li>
                    </ul>
                </div>
            </nav>
            <div>
                <ul id="slide-out" class="side-nav fixed">
                    <p align="center"><img height="150px" width="150px" src="https://upload.wikimedia.org/wikipedia/en/thumb/4/4b/Marist_College_Seal_-_Vector.svg/1016px-Marist_College_Seal_-_Vector.svg.png"/></p>
                    <li><a href="login.php">Login Page</a></li>
                    <li><a href="index.php">Main Page</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu"></i></a>
            </div>
        </header>
        <main id="content">	
			<div class="container">
                <div class="row">
                    <div class="col s12">
						<div id="error" style="color:Red"></div>
						<div id="pass_check"></div>
                        <div id="foundItemForm" class="row">
                            <form class="col s12" action="login.php" method="POST">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input required placeholder="Username" name="name" type="text" class="validate" autofocus>
                                        <label for="title">Username</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input required placeholder="Password" name="pass" type="password" class="validate">
                                        <label for="first_name">Password</label>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="input-field col s6">
                                        <button class="btn waves-effect waves-light red darken-4" type="submit">Log in
											<i class="material-icons right">send</i>
										</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
