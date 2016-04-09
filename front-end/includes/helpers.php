<?php

$debug = true;

# Inserts a suggestion into foxTalkDB
function insert_item($date) {
    global $dbc;
	
	#Assign variables to insert into database from user input in $_POST
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$cwid = $_POST['cwid'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$dept = $_POST['department'];
	
    $query = "INSERT INTO submissions(cwid, submit_date, title, description, submitter_fname, submitter_lname, department, status)"
		   . " VALUES($cwid, \"$date\", \"$title\", \"$description\", \"$fname\", \"$lname\", \"$dept\", \"Submitted\")";
	#Show query if debugging is enabled (at the top of this file)
    show_query($query);

	#Get results of SQL query
    $results = mysqli_query($dbc,$query);
    
	#Output SQL errors, if any
	check_results($results);
	
	unset($_POST);
	
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

function show_records($dbc) {
    #$locations = get_locations();
    
	# Create a query to get title, date, and status, sorted by date
    $query = 'SELECT * FROM submissions ORDER BY submit_date DESC LIMIT 10';

    # Execute the query
    $results = mysqli_query( $dbc , $query );
    
    # Output SQL errors, if any
    check_results($results);

    # Show results, if query succeeded
    if($results && mysqli_num_rows($results) > 0)
    {	
		echo '<ul class="collapsible" data-collapsible="accordion">';
			while ( $row = mysqli_fetch_array($results , MYSQLI_ASSOC )){
				$date = format_date($row['submit_date'], "m/d/Y");
				echo '<li>';
					echo '<div style="text-align:left;vertical-align:top" class="collapsible-header"><b>' . $row['title'] .'</b></div>';
					echo '<div style="text-align:left;vertical-align:top" class="collapsible-body card-panel grey">';
					echo '<div><span><b>Suggestion: </b></span>' . $row['description'] . '</div></br>';
					echo '<div><span><b>Department: </b></span>' . $row['department'] . '</div></br>';
					echo '<div><span><b>Status: </b></span>' . $row['status'] . '</div></br>';
					echo '<div style="text-align:right;vertical-align:top"><a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">thumb_up</i></a></div>';
					echo '</div>';
				echo '</li>';
			}
		echo '</ul>';
        /*echo "<table class=\"striped\">";
		echo '<thead>';
        echo '<tr>';
        echo '<th>Title</th>';
        echo '<th>Date</th>';
		echo '</tr>';
		echo '</th	ead>';
		echo '<tbody>';

        # For each row result, generate a table row
        while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
        {
            $date = format_date($row['submit_date'], "m/d/Y");
            $title = $row['title'];
            
            echo '<tr>';
            echo '<td>' . '<a class="modal-trigger" href=index.php?sid=' . $row['sid'] . '>' . $title . '</a>' . '</td>';
            #echo '<td>' . $title . '</td>';
            echo '<td>' . $date . '</td>';
            #echo '<td>' . $category . '</td>';
            #echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }
		
		echo '</tbody>';
        # End the table
        echo '</table>';*/
    }
    
    else if(mysqli_num_rows($results) === 0)
        echo '<script>$(document).ready(function() {$("#error").html("No results");});</script>';
    
    # Free up the results in memory
    mysqli_free_result($results);
}

# Shows a single record
function show_record($sid) {
	global $dbc;
    
    if(is_numeric($sid))
        $query = 'SELECT * FROM submissions WHERE sid=' . $sid;
    else
        return false;
    
    $results = mysqli_query($dbc, $query);
    check_results($results);
    
    if($results) {
		echo '<div class="row">';
			echo '<div class="col s6">';
				echo '<table>';
					while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
						echo '<tr>';
							echo '<td style="text-align:left;vertical-align:top"><b>Title:</b></td>';
							echo '<td style="text-align:left;vertical-align:top">' . $row['title'] . '</td>';
						echo '</tr>';
						
						echo '<tr>';
							echo '<td style="text-align:left;vertical-align:top"><b>Description:</b></td>';
							echo '<td style="text-align:left;vertical-align:top">' . $row['description'] . '</td>';
						echo '</tr>';
						
						echo '<tr>';
							echo '<td style="text-align:left;vertical-align:top"><b>Department:</b></td>';
							echo '<td style="text-align:left;vertical-align:top">' . $row['department'] . '</td>';
						echo '</tr>';
						
						echo '<tr>';
							echo '<td style="text-align:left;vertical-align:top"><b>Status:</b></td>';
							echo '<td style="text-align:left;vertical-align:top">' . $row['status'] . '</td>';
						echo '</tr>';
					}
				echo '</table>';
			echo '</div>';
		echo '</div>';
	}
	
	mysqli_free_result($results);
}

function format_date($date, $format) {
    $date = strtotime($date);
    $dateForView = date($format, $date);
    
    return $dateForView;
}