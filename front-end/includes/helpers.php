<?php

$debug = true;

# Inserts a suggestion into foxTalkDB
function insert_item($date) {
    global $dbc;
	
	#Assign variables to insert into database from user input in $_POST
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$cwid = $_POST['cwid'];
	$description = $_POST['description'];
	$dept = $_POST['department'];
	
    $query = "INSERT INTO submissions(uid, cwid, submit_date, title, description, submitter_fname, submitter_lname, department, status)"
		   . " VALUES(1, $cwid, '$date', 'Placeholder', '$description', '$fname', '$lname', '$dept', 'Submitted')";
	#Show query if debugging is enabled (at the top of this file)
    show_query($query);

	#Get results of SQL query
    $results = mysqli_query($dbc,$query);
    
	#Output SQL errors, if any
	check_results($results);
	
    return $results;
}

# Shows query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>';
}