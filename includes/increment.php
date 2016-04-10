<?php
require('helpers.php');
require('connect_db.php');

if (isset($_GET['id'])){
	$sid = $_GET['id'];
	up_vote($sid);
	header('Location: ../index.php');
}
?>