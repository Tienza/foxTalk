<?php
require('../helpers.php');
require('../connect_db.php');

if (isset($_GET['sid'])){
	$sid = $_GET['sid'];
	
	if(is_numeric($sid) && $sid > 0)
		update_status("Rejected", $sid);
	
	header('Location: ../../admin.php');
}
?>